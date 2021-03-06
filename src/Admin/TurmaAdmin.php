<?php

namespace App\Admin;

use App\Entity\StatusTurma;
use App\Entity\TurnoTurma;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

class TurmaAdmin extends BaseAdmin
{
    /**
     * Configuração do datagrid
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'curso.nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nome')
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
                ->add('polo', ModelType::class, array('btn_add'=>false))
                ->add('curso', ModelType::class, array('btn_add'=>false))
                ->add('nome')
                ->add('turno', ChoiceFieldMaskType::class, [
                    'choices' => TurnoTurma::getTurnos(),
                    'placeholder' => 'Selecione o turno',
                    'required' => true
                ])
                ->add('status', ChoiceFieldMaskType::class, [
                    'choices' => StatusTurma::getStatus(),
                    'placeholder' => 'Selecione o status',
                    'required' => true
                ])
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
            ->addIdentifier('polo')
            ->add('curso.nome')
            ->add('nome')
            //->add('getTurnoDescricao', null,['label' => 'Turno'])
            ->add('getStatusDescricao', null,['label' => 'Status'])
            ->add('somarCargaHoraria', null,['label' => 'Horas (Total)'])
            ->add('somarHorasAulas',null, ['label'=>'Horas (Executada)'])
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
        return $object->getCurso()->getNome() . self::SEPARADOR .
                $object->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('polo', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('curso', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('status','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => StatusTurma::getStatus()])
            ->add('nome')
        ;
    }
}