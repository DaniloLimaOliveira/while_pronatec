<?php

namespace App\Admin;

use App\Entity\Banco;
use App\Entity\Estado;
use App\Entity\Frequencia;
use App\Entity\FuncaoColaborador;
use App\Entity\Sexo;
use App\Entity\StatusMatricula;
use App\Entity\StatusTurma;
use App\Entity\TurnoTurma;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;

class MatriculaAdmin extends AbstractAdmin
{
    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('aluno.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('status')
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
                ->add('turma', ModelListType::class, array('btn_add'=>false, 'btn_edit'=>false, 'btn_delete'=>false))
                ->add('aluno', ModelListType::class, array('btn_add'=>false, 'btn_edit'=>false, 'btn_delete'=>false))
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
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('aluno.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('status')
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
        //return $object->getNome();
        return 'Matrícula';
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('aluno.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('status')
        ;
    }

    public function preRemove($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Frequencia::class);

        if($repository->exist($object))
        {
            throw new \Exception("Não foi possível deletar, pois a matrícula possui frequência!");
        }
    }
}