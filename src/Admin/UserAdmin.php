<?php

namespace App\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

class UserAdmin extends \Sonata\UserBundle\Admin\Model\UserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        parent::configureFormFields($formMapper);

        $formMapper
            ->tab('Colaborador')
                ->with('Colaborador', ['class' => 'col-md-6'])
                    ->add('colaborador', ModelListType::class, [
                        'btn_add'=>true, 'btn_edit'=>false, 'btn_delete'=>false,
                        'required' => false, 'label' => 'Colaborador'
                    ])

                ->end()
            ->end()
        ;

    }
}