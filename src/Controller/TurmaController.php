<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class TurmaController extends BaseController
{
    /**
     * Impede a exclusão, caso a turma esteja em alguma carga horária
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryCargaHoraria()->exist(['turma' => $object]))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois a turma possui carga horária!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }
    }
}