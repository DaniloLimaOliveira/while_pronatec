<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class AulaAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'aula';
    protected $baseRouteName = 'aula';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list', 'show']);
        $collection->add('register', $this->getRouterIdParameter().'/register');
        $collection->add('listFrequencia', 'listFrequencia');
        $collection->add('save', 'save');
    }
}