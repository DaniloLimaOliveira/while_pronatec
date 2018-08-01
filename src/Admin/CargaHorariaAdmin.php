<?php

namespace App\Admin;

use App\Entity\Aula;
use App\Entity\StatusTurma;
use App\Entity\TurnoTurma;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;

class CargaHorariaAdmin extends BaseAdmin
{
    /**
     * Configuração do datagrid
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'turma.curso.nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('turma.turno')
            ->add('disciplina.nome')
            ->add('colaborador.nome')
            ->add('cargaHoraria')
            ->add('status')
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
                ->add('turma', ModelListType::class, array('btn_add'=>true, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('disciplina', ModelListType::class, array('btn_add'=>false, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('colaborador', ModelListType::class, array('btn_add'=>false, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('status', ChoiceFieldMaskType::class, [
                    'choices' => StatusTurma::getStatus(),
                    'placeholder' => 'Selecione o status',
                    'required' => true
                ])
                ->add('cargaHoraria')

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
            ->addIdentifier('turma.curso.nome')
            ->add('turma.nome')
            ->add('turma.turno')
            ->add('disciplina.nome')
            ->add('colaborador.nome')
            ->add('cargaHoraria')
            ->add('getStatusDescricao', null,['label' => 'Status'])
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
        return $object->getTurma()->getCurso()->getNome() . self::SEPARADOR .
                $object->getTurma()->getNome() . self::SEPARADOR .
                $object->getDisciplina() . self::SEPARADOR .
                $object->getColaborador()->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('turma.regiao', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('turma.curso', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('disciplina', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('colaborador', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('status','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => StatusTurma::getStatus()])
            ->add('turma.turno','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => TurnoTurma::getTurnos()])
            ->add('turma.nome')
            ->add('cargaHoraria')
        ;
    }

    /**
     * Não permite a exclusão, caso exista aula cadastrada na carga horária
     * @param $object
     * @throws \Exception
     */
    public function preRemove($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Aula::class);

        if($repository->exist($object))
        {
            throw new \Exception("Não foi possível deletar, pois existe aula(s) cadastrada(s)!");
        }
    }
}