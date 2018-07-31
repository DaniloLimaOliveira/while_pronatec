<?php

namespace App\Admin;

use App\Entity\Frequencia;
use App\Entity\TipoAula;
use App\Entity\TipoFrequencia;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DateRangeType;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;

class FrequenciaAdmin extends BaseAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'aula.data',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('aula.cargaHoraria.turma.curso.nome')
            ->add('aula.cargaHoraria.turma.nome')
            ->add('aula.cargaHoraria.turma.turno')
            ->add('aula.cargaHoraria.disciplina.nome')
            ->add('matricula.aluno.nome')
            ->add('aula.data')
            ->add('aula.quantidadeHoras')
            ->add('tipoFrequencia')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $admin = $this;

        $formMapper
            ->with('Geral')
                ->add('aula', ModelListType::class, array('btn_add'=>true, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('matricula', ModelListType::class, array('btn_add'=>true, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('tipoFrequencia', ChoiceFieldMaskType::class, [
                    'choices' => TipoFrequencia::getTipoFrequencia(),
                    'placeholder' => 'Selecione',
                    'required' => true
                ])
            ->end()
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('aula.cargaHoraria.turma.curso.nome')
            ->add('aula.cargaHoraria.turma.nome')
            ->add('aula.cargaHoraria.turma.turno')
            ->add('aula.cargaHoraria.disciplina.nome')
            ->add('matricula.aluno.nome')
            ->add('aula.data','date',array('format' => 'd/m/Y'))
            ->add('aula.quantidadeHoras')
            ->add('tipoFrequencia', null, ['label' => 'Tipo'])
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    public function toString($object)
    {
        return $object->getAula()->getCargaHoraria()->getTurma()->getCurso()->getNome() . self::SEPARADOR .
            $object->getAula()->getCargaHoraria()->getTurma()->getNome() . self::SEPARADOR .
            $object->getAula()->getCargaHoraria()->getDisciplina() . self::SEPARADOR .
            $object->getAula()->getCargaHoraria()->getColaborador()->getNome() . self::SEPARADOR .
            $object->getAula()->getDataFormatada() . self::SEPARADOR .
            $object->getMatricula()->getAluno()->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('aula.cargaHoraria.turma.regiao', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aula.cargaHoraria.turma.curso', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aula.cargaHoraria.disciplina', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aula.cargaHoraria.colaborador', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('matricula.aluno', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aula.tipoAula','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => TipoAula::getTiposAula()])
            ->add('aula.cargaHoraria.turma.nome')
            ->add('aula.cargaHoraria.turma.turno')
            ->add('aula.quantidadeHoras')
            ->add('aula.data',
                DateRangeFilter::class,
                [
                    'field_type' => DateRangeType::class
                ],
                null,
                [
                    'field_options' =>
                        [
                            'widget' => 'single_text',
                            'html5' => true,
                            'attr' => ['data-date-format' => 'DD/MM/YYYY']
                        ]
                ])
            ->add('tipoFrequencia','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => TipoFrequencia::getTipoFrequencia()])
        ;
    }

    public function getExportFields()
    {
        return ['aula.cargaHoraria.turma.curso.nome',
                'aula.cargaHoraria.turma.nome',
                'aula.cargaHoraria.turma.turno',
                'aula.cargaHoraria.disciplina.nome',
                'matricula.aluno.nome',
                'Data' => 'aula.getDataFormatada',
                'Horas'=>'aula.quantidadeHoras',
                'Tipo' => 'tipoFrequencia',
        ];
    }

    public function prePersist($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Frequencia::class);

        if($repository->existFrequencia($object))
        {
            throw new \LogicException('Não é possível cadastrar a frenquência, pois já existe uma frequência cadastrada para o aluno na aula informada!');
        }

        if($object->getMatricula()->getTurma() != $object->getAula()->getCargaHoraria()->getTurma())
        {
            throw new \LogicException('Não é possível cadastrar a frenquência, pois o aluno não pertence a turma da aula informada!');
        }
    }

    public function preUpdate($object)
    {
        //TODO: Verificar se já existe uma frequência cadastradas com os mesmos dados

        if($object->getMatricula()->getTurma() != $object->getAula()->getCargaHoraria()->getTurma())
        {
            throw new \LogicException('Não é possível cadastrar a frenquência, pois o aluno não pertence a turma da aula informada!');
        }
    }
}