<?php

namespace App\Controller;


use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends CRUDController
{
    public function jsonResponseSucess($data) {
        return new JsonResponse(array('status'   => 'success', 'data' => $data));
    }

    public function jsonResponseError($data) {
        return new JsonResponse(array('status' => 'error', 'data' => $data));
    }


}