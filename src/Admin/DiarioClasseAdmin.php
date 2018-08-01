<?php

namespace App\Admin;

use Sonata\AdminBundle\Route\RouteCollection;

class DiarioClasseAdmin extends BaseAdmin
{
    protected $baseRoutePattern = 'diarioClasse';
    protected $baseRouteName = 'diarioClasse';
    protected $classnameLabel = 'Diário de classe';


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list', 'show', 'delete', 'create']);
        $collection->add('register', $this->getRouterIdParameter().'/register');
        $collection->add('listFrequencia', 'listFrequencia');
        $collection->add('save', 'save');
    }

    //TODO: Verificar maneira para controlar o acesso
    protected function getAccess()
    {
        $access = parent::getAccess();

        $access['register'] = "REGISTER";
        $access['listFrequencia'] = "LIST_FREQUENCIA";
        $access['save'] = "SAVE";

        return $access;
    }
}