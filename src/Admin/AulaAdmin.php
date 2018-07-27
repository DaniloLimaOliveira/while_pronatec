<?php

namespace App\Admin;

use App\Entity\Aula;
use App\Entity\TipoAula;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateRangeType;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;

class AulaAdmin extends BaseAdmin
{
    public function getRepository()
    {
        return $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Aula::class);
    }

    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'data',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('cargaHoraria.turma.curso.nome')
            ->add('cargaHoraria.turma.nome')
            ->add('cargaHoraria.turma.turno')
            ->add('cargaHoraria.disciplina.nome')
            ->add('cargaHoraria.colaborador.nome')
            ->add('data')
            ->add('quantidadeHoras')
            ->add('tipoAula')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->with('Geral')
                ->add('cargaHoraria', ModelListType::class, array('btn_add'=>false, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('data', DatePickerType::class, [
                    'widget' => 'single_text',
                    'html5' => true,
                    'attr' => ['data-date-format' => 'DD/MM/YYYY', 'hour' => '00', 'minute' => '00']
                ])
                ->add('tipoAula', ChoiceFieldMaskType::class, [
                    'choices' => TipoAula::getTiposAula(),
                    'placeholder' => 'Selecione o tipo de aula',
                    'required' => true
                ])
                ->add('quantidadeHoras')
                ->add('conteudoMinistrado')
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
            ->addIdentifier('cargaHoraria.turma.curso.nome')
            ->add('cargaHoraria.turma.nome')
            ->add('cargaHoraria.turma.turno')
            ->add('cargaHoraria.disciplina.nome')
            ->add('cargaHoraria.colaborador.nome')
            ->add('data','date',array('format' => 'd/m/Y'))
            ->add('quantidadeHoras')
            ->add('tipoAula')
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
        return $object->asString();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('cargaHoraria.turma.regiao.nome')
            ->add('cargaHoraria.turma.curso.nome')
            ->add('cargaHoraria.turma.nome')
            ->add('cargaHoraria.turma.turno')
            ->add('cargaHoraria.disciplina.nome')
            ->add('cargaHoraria.colaborador.nome')
            ->add('data',
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
            ->add('quantidadeHoras')
            ->add('tipoAula')
        ;
    }

    public function getExportFields()
    {
        return ['cargaHoraria.turma.curso.nome',
                'cargaHoraria.turma.nome',
                'cargaHoraria.turma.turno',
                'cargaHoraria.disciplina.nome',
                'cargaHoraria.colaborador.nome',
                'Data' => 'getDataFormatada',
                'Horas'=>'quantidadeHoras',
                'Tipo' => 'tipoAula',
        ];
    }

    public function prePersist($object)
    {
        $aula = $this->getRepository()->findOneBy([ 'cargaHoraria' => $object->getCargaHoraria(),
                                                    'data' => $object->getData()]);
        if($aula != null)
        {
            throw new \LogicException("Não foi possível realizar o cadastro, pois já existe uma aula cadastrada nesta data!");
        }
    }

    public function preUpdate($object)
    {
        $aula = $this->getRepository()->findOneBy([ 'cargaHoraria' => $object->getCargaHoraria(),
                                                    'data' => $object->getData()]);

        if($aula != null && $aula->getId() != $object->getId())
        {
            throw new \LogicException("Não foi possível realizar o cadastro, pois já existe uma aula cadastrada nesta data!");
        }
    }
}