<?php

namespace App\Controller;

use App\Entity\Aula;
use App\Entity\CargaHoraria;
use App\Entity\Frequencia;
use App\Entity\Matricula;
use App\Entity\StatusMatricula;
use App\Entity\StatusTurma;
use App\Entity\TipoAula;
use App\Entity\TipoFrequencia;
use App\Util\Util;
use Symfony\Component\HttpFoundation\Request;

class AulaController extends BaseController
{
    public function repositoryCargaHoraria()
    {
        return $this->getDoctrine()->getRepository(CargaHoraria::class);
    }

    public function repositoryFrequencia()
    {
        return $this->getDoctrine()->getRepository(Frequencia::class);
    }

    public function repositoryMatricula()
    {
        return $this->getDoctrine()->getRepository(Matricula::class);
    }

    public function repositoryAula()
    {
        return $this->getDoctrine()->getRepository(Aula::class);
    }

    public function consultarCargaHoraria($id)
    {
        $cargaHoraria = $this->repositoryCargaHoraria()->find($id);

        if (!$cargaHoraria) {
            throw $this->createNotFoundException(sprintf('Carga Horária id: %s não encontrada!', $id));
        }

        return $cargaHoraria;
    }

    public function carregarFrequencias(Request $request, Aula $aula)
    {
        $i = 1;
        $radioFrequencia = $request->get('frequencia_'.$i++);
        $frequencias = array();

        while ($radioFrequencia != null) {
            $frequencia = null;

            $radioValue = explode('_', $radioFrequencia);
            $idFrequencia = $radioValue[0];
            $idMatricula = $radioValue[1];
            $tipoFrequencia = $radioValue[2];

            if($idFrequencia != null && $idFrequencia != '')
            {
                $frequencia = $this->repositoryFrequencia()->find($idFrequencia);
            }

            if ($frequencia == null)
            {
                $frequencia = new Frequencia();
                $frequencia->setAula($aula);
                $frequencia->setMatricula($this->repositoryMatricula()->find($idMatricula));
            }

            $frequencia->setTipoFrequencia($tipoFrequencia);

            $frequencias[] = $frequencia;

            $radioFrequencia = $request->get('frequencia_'.$i++);
        }

        return $frequencias;
    }

    //TODO: Melhorar logica para unir o array de matricula e frequencia
    public function getFrequenciaMatricula($cargaHoraria, $aula = null)
    {
        $matriculas = $this->repositoryMatricula()->findBy(['turma' => $cargaHoraria->getTurma(), 'status' => StatusMatricula::ATIVA]);

        $frequencias = array();

        foreach ($matriculas as $matricula)
        {
            $frequencia = null;

            if($aula != null)
            {
                $frequencia = $this->repositoryFrequencia()->findOneBy(['aula' => $aula, 'matricula' => $matricula]);
            }

            if($frequencia == null)
            {
                $frequencia = new Frequencia();
                $frequencia->setMatricula($matricula);
                $frequencia->setTipoFrequencia(TipoFrequencia::PRESENTE);
            }

            $frequencias[] =  $frequencia;
        }

        return $frequencias;
    }

    public function getAula($idAula)
    {
        $aula = $this->repositoryAula()->find($idAula);

        if (!$aula) {
            throw $this->createNotFoundException(sprintf('Aula id: %s não encontrada!', $idAula));
        }

        $aula->setFrequencias($this->getFrequenciaMatricula($aula->getCargaHoraria(), $aula));

        return $aula;
    }

    public function getOrCreateAula($idCargaHoraria, $data)
    {
        $aula = null;

        $cargaHoraria = $this->consultarCargaHoraria($idCargaHoraria);
        $aula = $this->repositoryAula()->findOneBy(['cargaHoraria' => $cargaHoraria, 'data' => $data]);
        $frequencias = $this->getFrequenciaMatricula($cargaHoraria, $aula);

        if($aula == null)
        {
            $aula = new Aula();
        }

        $aula->setFrequencias($frequencias);

        if($aula->getQuantidadeHoras() == null)
        {
            $aula->setQuantidadeHoras(3);
        }

        return $aula;
    }

    public function listAction()
    {
        //TODO: Filtrar as turmas de acordo com o usuário logado, filtrando apenas a turmas em andamento
        $cargaHorarias = $this->repositoryCargaHoraria()->findBy(['status' => StatusTurma::EM_ANDAMENTO]);

        return $this->renderWithExtraParams('admin/aula/aulaList.html.twig', ['Model' => $cargaHorarias]);
    }

    public function registerAction($id = null)
    {
        $request = $this->getRequest();

        $idAula = $request->get('idAula');

        if ($idAula != null)
        {
            $aula = $this->getAula($idAula);

            return $this->renderWithExtraParams('admin/aula/aulaRegister.html.twig',
                [
                    'Model' => $aula->getCargaHoraria(),
                    'TiposAula' => TipoAula::getTiposAula(),
                    'Aula' => $aula
                ]
            );
        }
        else
        {
            $cargaHoraria = $this->consultarCargaHoraria($id);
            return $this->renderWithExtraParams('admin/aula/aulaRegister.html.twig', ['Model' => $cargaHoraria]);
        }
    }

    public function saveAction(){
        $request = $this->getRequest();

        //TODO: Validar campos
        $idCargaHoraria = $request->get('id');
        $data = Util::stringToDate($request->get('data'));

        $cargaHoraria = $this->consultarCargaHoraria($idCargaHoraria);

        $aula = $this->repositoryAula()->findOneBy(['cargaHoraria' => $cargaHoraria, 'data' => $data]);

        if($aula == null)
        {
            $aula = new Aula();
        }

        $aula->setData($data);
        $aula->setConteudoMinistrado(trim($request->get('conteudoMinistrado')));
        $aula->setQuantidadeHoras($request->get('quantidadeHoras'));
        $aula->setTipoAula($request->get('tipoAula'));
        $aula->setCargaHoraria($cargaHoraria);
        $aula->setFrequencias($this->carregarFrequencias($request, $aula));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($aula);
        $entityManager->flush();

        $mensagem = 'Aula registrada com sucesso!';

        $reponse = null;

        if($request->get('btn_update_and_edit') != null)
        {
            $aula = $this->getOrCreateAula($idCargaHoraria, $data);

            $reponse =  $this->renderWithExtraParams('admin/aula/aulaRegister.html.twig', [
                                                            'Model' => $cargaHoraria,
                                                            'TiposAula' => TipoAula::getTiposAula(),
                                                            'Aula' => $aula,
                                                            'Mensagem' => $mensagem
            ]);
        }
        elseif($request->get('btn_update_and_list') != null)
        {
            $reponse = $this->redirectToRoute('aula_list');
        }
        else//btn_create_and_create
        {
            $reponse = $this->renderWithExtraParams('admin/aula/aulaRegister.html.twig',
                                                    ['Model' => $cargaHoraria, 'Mensagem' => $mensagem]);
        }

        return $reponse;
    }

    public function listFrequenciaAction()
    {
        try{
            //TODO: Validar os campos

            $aula = null;

            $request = $this->getRequest();

            $idCargaHoraria = $request->get('id');
            $data = Util::stringToDate($request->get('data'));

            $view = $this->renderView('admin/aula/aulaRegisterPartial.html.twig',
                                        [
                                            'Model' => $this->getOrCreateAula($idCargaHoraria, $data),
                                            'TiposAula' => TipoAula::getTiposAula()
                                        ]
            );

            return $this->jsonResponseSucess($view);

        }catch (\Exception $ex) {
            return $this->jsonResponseError($ex->getMessage());
        }
    }

    public function showAction($id = null)
    {
        $cargaHoraria = $this->consultarCargaHoraria($id);

        $aulas = $this->repositoryAula()->findBy(['cargaHoraria' => $cargaHoraria]);

        return $this->renderWithExtraParams('admin/aula/aulaShow.html.twig', ['Model' => $aulas, 'CargaHoraria' => $cargaHoraria]);
    }

}