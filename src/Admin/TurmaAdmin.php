<?php

namespace App\Admin;

use App\Entity\CargaHoraria;
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
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'curso.nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
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
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Geral')
                ->add('regiao', ModelType::class, array('btn_add'=>false))
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
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('curso.nome')
            ->add('nome')
            ->add('getTurnoDescricao', null,['label' => 'Turno'])
            ->add('getStatusDescricao', null,['label' => 'Status'])
            ->add('regiao')
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
        return $object->getCurso()->getNome() . self::SEPARADOR .
                $object->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('regiao', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('status')
            ->add('nome')
        ;
    }

    public function preRemove($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(CargaHoraria::class);

        if($repository->exist(['turma' => $object]))
        {
            throw new \Exception("Não foi possível deletar, pois a turma possui carga horária!");
        }
    }
}