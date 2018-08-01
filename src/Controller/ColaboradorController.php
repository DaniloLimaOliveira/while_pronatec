<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class ColaboradorController extends BaseController
{
    /**
     * Impede a exclusão, caso o colaborador tenha relacionamento com a carga horária
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryCargaHoraria()->exist(['colaborador' => $object]))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois o colaborador possui carga horária!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }

    }
}