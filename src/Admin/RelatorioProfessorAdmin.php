<?php

namespace App\Admin;

use Sonata\AdminBundle\Route\RouteCollection;

class RelatorioProfessorAdmin extends BaseAdmin
{
    protected $baseRoutePattern = 'relatorioProfessor';
    protected $baseRouteName = 'relatorioProfessor';
    protected $classnameLabel = 'Relatório dos professores';


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list', 'export']);
    }
}