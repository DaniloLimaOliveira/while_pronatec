<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

class BaseAdmin extends AbstractAdmin
{
    const SEPARADOR = ' - ';

    public function getExportFormats()
    {
        return ['csv'];
    }

}