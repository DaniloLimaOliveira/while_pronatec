<?php

namespace App\Controller;


use App\Entity\Aula;
use App\Entity\CargaHoraria;
use App\Entity\Frequencia;
use App\Entity\Matricula;
use App\Entity\Turma;
use App\Util\Util;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends CRUDController
{

    /**
     * GET Repositório
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function repositoryMatricula()
    {
        return $this->getDoctrine()->getRepository(Matricula::class);
    }

    /**
     * GET Repositório
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function repositoryAula()
    {
        return $this->getDoctrine()->getRepository(Aula::class);
    }

    /**
     * GET Repositório
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function repositoryCargaHoraria()
    {
        return $this->getDoctrine()->getRepository(CargaHoraria::class);
    }

    /**
     * GET Repositório
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function repositoryTurma()
    {
        return $this->getDoctrine()->getRepository(Turma::class);
    }

    /**
     * GET Repositório
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function repositoryFrequencia()
    {
        return $this->getDoctrine()->getRepository(Frequencia::class);
    }

    public function jsonResponseSucess($data) {
        return new JsonResponse(array('status'   => 'success', 'data' => $data));
    }

    public function jsonResponseError($data) {
        return new JsonResponse(array('status' => 'error', 'data' => $data));
    }

    public function setFlashBagErrorMessage($message)
    {
        $this->getRequest()->getSession()->getFlashBag()->add("error", $message);
    }

    public function setFlashBagSuccessMessage($message)
    {
        $this->getRequest()->getSession()->getFlashBag()->add("success", $message);
    }

    public function getFileName($nomeRelatório)
    {
        $format = 'csv';

        return sprintf(
            'export_%s_%s.%s',
            $nomeRelatório,
            date('Y_m_d_H_i_s', strtotime('now')),
            $format
        );
    }

    public function csvResponse($template, $parametros, $nomeArquivo)
    {
        //TODO: Remover caracteres especiais

        $nomeArquivo = $this->getFileName($nomeArquivo);

        $response = $this->renderWithExtraParams($template, $parametros);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', "attachment; filename='$nomeArquivo'");
        $response->headers->set('encoding', 'UTF-8"');

        return $response;
    }

}