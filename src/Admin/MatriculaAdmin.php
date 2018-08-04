<?php

namespace App\Admin;

use App\Entity\StatusMatricula;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;

class MatriculaAdmin extends BaseAdmin
{
    /**
     * Configuração do datagrid
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'aluno.nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('aluno.cpf')
            ->add('aluno.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
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
                ->add('turma', ModelListType::class, array('btn_add'=>false, 'btn_delete'=>false))
                ->add('aluno', ModelListType::class, array('btn_add'=>true, 'btn_delete'=>false))
                ->add('status', ChoiceFieldMaskType::class, [
                    'choices' => StatusMatricula::getStatus(),
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
            ->addIdentifier('aluno.cpf')
            ->add('aluno.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('getStatusDescricao', null,['label' => 'Situação'])
            ->add('turma.polo.nome')
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
        return $object->getAluno()->getCpf();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('turma.polo', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('turma.curso', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aluno', null, [], null, ['expanded' => false, 'multiple' => true])
            ->add('aluno.cpf')
            ->add('status','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => StatusMatricula::getStatus()])
            ->add('turma.nome')
        ;
    }

    public function getExportFields()
    {
        return [
                'aluno.cpf',
                'aluno.nome',
                'turma.curso.nome',
                'turma.nome',
                'Situação' => 'getStatusDescricao',
                'turma.polo.nome',
                'Aulas' => 'getAulasExport',
                'Qtd Aulas/Mês' => 'getAulasPorMesExport'
        ];
    }

}