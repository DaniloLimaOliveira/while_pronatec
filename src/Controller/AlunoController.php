<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class AlunoController extends BaseController
{
    /**
     * Impede a exclusão caso o aluno esteja matriculado
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if ($this->repositoryMatricula()->exist($object)) {
                $mensagem = sprintf ("Não é possível realizar a exclusão, pois \"%s\" está matriculado(a) em uma turma!", $object->getNome());
                throw new \Exception($mensagem);
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }
    }
}