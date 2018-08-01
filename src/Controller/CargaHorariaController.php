<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class CargaHorariaController extends BaseController
{
    /**
     * Não permite a exclusão, caso exista aula cadastrada na carga horária
     * @param Request $request
     * @param mixed $object
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function preDelete(Request $request, $object)
    {
        try
        {
            if($this->repositoryAula()->exist($object))
            {
                throw new \Exception("Não é possível realizar a exclusão, pois existe aula(s) cadastrada(s)!");
            }
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->redirectTo($object);
        }
    }
}