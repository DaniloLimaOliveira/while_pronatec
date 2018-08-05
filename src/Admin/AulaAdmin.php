<?php

namespace App\Admin;

use App\Entity\Aula;
use App\Entity\TipoAula;
use App\Entity\TurnoTurma;
use App\Repository\AulaRepository;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateRangeType;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;

class AulaAdmin extends BaseAdmin
{
    /**
     * Get AulaRepository
     * @return AulaRepository
     */
    public function getRepository()
    {
        return $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Aula::class);
    }

    /**
     * Configuração do datagrid
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'data',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
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
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('cargaHoraria.turma.polo.nome')
            ->add('cargaHoraria.turma.curso.nome')
            ->add('cargaHoraria.turma.nome')
            ->add('cargaHoraria.disciplina.nome')
            ->add('cargaHoraria.colaborador.nome')
            ->add('data','date',array('format' => 'd/m/Y'))
            ->add('quantidadeHoras')
            ->add('getTipoAulaDescricao', null,['label' => 'Tipo'])
            ->add('totalPresencas', null,['label' => 'Total (P)'])
            ->add('totalFaltas', null,['label' => 'Total (F)'])
            ->add('totalFaltasJustificadas', null,['label' => 'Total (FJ)'])
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * To string
     * @param $object
     * @return string
     */
    public function toString($object)
    {
        return $object->asString();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('cargaHoraria.turma.polo', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('cargaHoraria.turma.curso', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('cargaHoraria.disciplina', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('cargaHoraria.turma.nome')
            ->add('tipoAula','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => TipoAula::getTiposAula()])
            ->add('cargaHoraria.turma.turno','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => TurnoTurma::getTurnos()])
            ->add('cargaHoraria.colaborador', null, [], null, ['expanded' => false, 'multiple' => true])
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
        ;
    }

    public function getExportFields()
    {
        return ['cargaHoraria.turma.polo.nome',
                'cargaHoraria.turma.curso.nome',
                'cargaHoraria.turma.nome',
                'cargaHoraria.turma.turno',
                'cargaHoraria.disciplina.nome',
                'CPF' => 'cargaHoraria.colaborador.cpf',
                'cargaHoraria.colaborador.nome',
                'Data' => 'getDataFormatada',
                'Horas'=>'quantidadeHoras',
                'Tipo' => 'tipoAula',
                'conteudoMinistrado',
                'Total (P)' => 'totalPresencas',
                'Total (F)' => 'totalFaltas',
                'Total (FJ)' => 'totalFaltasJustificadas',
        ];
    }

    /**
     * Verifica se já existe uma aula cadastrada na data informada
     * @param ErrorElement $errorElement
     * @param $object
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $aula = $this->getRepository()->findOneBy([ 'cargaHoraria' => $object->getCargaHoraria(),
                                                    'data' => $object->getData()]);

        if($aula != null && $aula->getId() != $object->getId())
        {
            $errorElement->with('data')->addViolation('Já existe uma aula cadastrada nesta data!');
        }
    }
}