<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class DisciplinaController extends BaseController
{
    /**
     * Impede a exclusão caso a disciplina esteja em alguma carga horária
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryCargaHoraria()->exist(['disciplina' => $object]))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois a disciplina possui carga horária!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }

    }
}