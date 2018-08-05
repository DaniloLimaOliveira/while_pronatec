<?php

namespace App\Admin;

use Sonata\AdminBundle\Route\RouteCollection;

class RelatorioAlunoAdmin extends BaseAdmin
{
    protected $baseRoutePattern = 'relatorioAluno';
    protected $baseRouteName = 'relatorioAluno';
    protected $classnameLabel = 'Relatório dos alunos';


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list', 'export']);
    }
}