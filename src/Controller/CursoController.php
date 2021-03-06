<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class CursoController extends BaseController
{
    /**
     * Impede a exclusão caso o curso tenha relacionamento com alguma turma
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryTurma()->exist(['curso' => $object]))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois o curso possui turma(s)!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }
    }
}