<?php

namespace App\Admin;

use App\Entity\Aula;
use App\Entity\Banco;
use App\Entity\Estado;
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

class CargaHorariaAdmin extends BaseAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'turma.curso.nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
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
     *
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
     *
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
        return $object->getTurma()->getCurso()->getNome() . self::SEPARADOR .
                $object->getTurma()->getNome() . self::SEPARADOR .
                $object->getDisciplina() . self::SEPARADOR .
                $object->getColaborador()->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('turma.regiao.nome')
            ->add('turma.curso.nome')
            ->add('turma.nome')
            ->add('turma.turno')
            ->add('disciplina.nome')
            ->add('colaborador.nome')
            ->add('cargaHoraria')
            ->add('status')
        ;
    }

    public function preRemove($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Aula::class);

        if($repository->exist($object))
        {
            throw new \Exception("Não foi possível deletar, pois existe aula(s) cadastrada(s)!");
        }
    }
}