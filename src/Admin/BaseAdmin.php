<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

class BaseAdmin extends AbstractAdmin
{
    /**
     * Separado toString Admin
     */
    const SEPARADOR = ' - ';

    /**
     * Habilita apenas o download do datagrid em .csv
     * @return array
     */
    public function getExportFormats()
    {
        return ['csv'];
    }

}