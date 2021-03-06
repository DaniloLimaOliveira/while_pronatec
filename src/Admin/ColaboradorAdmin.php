<?php

namespace App\Admin;

use App\Entity\CargaHoraria;
use App\Entity\Estado;
use App\Entity\FuncaoColaborador;
use App\Entity\Sexo;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

class ColaboradorAdmin extends BaseAdmin
{
    /**
     * Configuração do datagrid
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'nome',
    ];

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('cpf')
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
            ->add('funcao', ChoiceFieldMaskType::class, [
                'choices' => FuncaoColaborador::getFuncoes(),
                'placeholder' => 'Selecione a função',
                'required' => true
            ])
            ->add('polo', ModelType::class, array('btn_add'=>false))
            ->end()
            ->with('Dados Pessoais')
                ->add('nome')
                ->add('cpf')
                ->add('rg')
                ->add('orgaoExpedidor')
                ->add('dataNascimento', null, array(
                    'years' => range(1950, date('Y')),
                    'format' => 'dMy'
                ))
                ->add('sexo', ChoiceFieldMaskType::class, [
                    'choices' => Sexo::getGeneros(),
                    'placeholder' => 'Selecione o sexo',
                    'required' => false
                ])
                ->add('nomeMae')
                ->add('nomePai')
                ->add('naturalidade')
                ->add('raca')
            ->end()
                ->with('Dados para Contato')
                ->add('telefone')
                ->add('telefoneRecado')
                ->add('email')
            ->end()
                ->with('Informações Bancárias')
                ->add('banco.nome')
                ->add('banco.agencia')
                ->add('banco.conta')
            ->end()
                ->with('Endereço')
                ->add('endereco.cep')
                ->add('endereco.endereco')
                ->add('endereco.bairro')
                ->add('endereco.uf', ChoiceFieldMaskType::class, [
                    'choices' => Estado::getEstadosBrasileiros(),
                    'placeholder' => 'Selecione o estado',
                    'required' => false
                ])
               ->add('endereco.cidade')
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
            ->addIdentifier('cpf')
            ->add('nome')
            ->add('getFuncaoDescricao')
            ->add('telefone')
            ->add('email')
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
        return $object->getNome();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('polo.nome')
            ->add('funcao','doctrine_orm_string', [],ChoiceFieldMaskType::class, ['choices' => FuncaoColaborador::getFuncoes()])
            ->add('nome')
            ->add('cpf')
        ;
    }
}