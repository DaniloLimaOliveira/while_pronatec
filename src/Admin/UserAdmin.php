<?php

namespace App\Admin;

use App\Application\Sonata\UserBundle\Entity\User;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\CoreBundle\Validator\ErrorElement;

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

    public function prePersist($object)
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(User::class);

        $user = $repository->findOneBy([ 'colaborador' => $object->getColaborador()]);

        if($user != null && $user->getId() != $object->getId())
        {
            throw new \LogicException('Não foi possível realizar o cadastro, pois o colaborador já possui usuário cadastrado!');
        }
    }
}