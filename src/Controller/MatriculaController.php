<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class MatriculaController extends BaseController
{
    /**
     * Impede a exclusão, caso a matrícula tenha registrado alguma frequência
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryFrequencia()->exist($object))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois a matrícula possui frequência!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }

    }
}