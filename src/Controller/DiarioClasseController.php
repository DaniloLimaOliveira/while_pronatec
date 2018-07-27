<?php

namespace App\Controller;

use App\Entity\Aula;
use App\Entity\CargaHoraria;
use App\Entity\Frequencia;
use App\Entity\FuncaoColaborador;
use App\Entity\Matricula;
use App\Entity\StatusMatricula;
use App\Entity\StatusTurma;
use App\Entity\TipoAula;
use App\Entity\TipoFrequencia;
use App\Util\Util;
use Symfony\Component\HttpFoundation\Request;

class DiarioClasseController extends BaseController
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


    public function getFrequenciaMatricula($cargaHoraria, $aula = null)
    {
        $matriculas = $this->repositoryMatricula()->findBy(['turma' => $cargaHoraria->getTurma(),
                                                            'status' => StatusMatricula::ATIVA]
        );

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
        $filtro = array('status' => StatusTurma::EM_ANDAMENTO);
        $usuario = $this->getUser();

        if( $usuario && $usuario->getColaborador() &&
            $usuario->getColaborador()->getFuncao() == FuncaoColaborador::PROFESSOR)
        {
            $filtro['colaborador'] = $usuario->getColaborador();
        }

        $cargaHorarias = $this->repositoryCargaHoraria()->findBy($filtro);

        return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseList.html.twig', ['Model' => $cargaHorarias]);
    }

    public function registerAction($id = null)
    {
        $request = $this->getRequest();

        $idAula = $request->get('idAula');

        if ($idAula != null)
        {
            $aula = $this->getAula($idAula);

            return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseRegister.html.twig',
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
            return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseRegister.html.twig', ['Model' => $cargaHoraria]);
        }
    }

    public function saveAction(){
        $response = null;
        $request = $this->getRequest();

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
        $aula->setQuantidadeHoras(str_replace(',','.',$request->get('quantidadeHoras')));
        $aula->setTipoAula($request->get('tipoAula'));
        $aula->setCargaHoraria($cargaHoraria);
        $aula->setFrequencias($this->carregarFrequencias($request, $aula));

        if(!is_numeric($aula->getQuantidadeHoras()))
        {
            throw new \LogicException("Campo quantidade de horas inválido");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($aula);
        $entityManager->flush();

        $mensagem = 'Aula registrada com sucesso!';

        if($request->get('btn_update_and_edit') != null)
        {
            $aula = $this->getOrCreateAula($idCargaHoraria, $data);

            $response =  $this->renderWithExtraParams('admin/diarioClasse/diarioClasseRegister.html.twig', [
                                                            'Model' => $cargaHoraria,
                                                            'TiposAula' => TipoAula::getTiposAula(),
                                                            'Aula' => $aula,
                                                            'Mensagem' => $mensagem
            ]);
        }
        elseif($request->get('btn_update_and_list') != null)
        {
            $response = $this->redirectToRoute('diarioClasse_list');
        }
        else//btn_create_and_create
        {
            $response = $this->renderWithExtraParams('admin/diarioClasse/diarioClasseRegister.html.twig',
                                                    ['Model' => $cargaHoraria, 'Mensagem' => $mensagem]);
        }

        return $response;
    }

    public function listFrequenciaAction()
    {
        try{
            $aula = null;
            $request = $this->getRequest();
            $idCargaHoraria = $request->get('id');
            $data = Util::stringToDate($request->get('data'));

            $view = $this->renderView('admin/diarioClasse/diarioClasseRegisterPartial.html.twig',
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

        return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseShow.html.twig', ['Model' => $aulas, 'CargaHoraria' => $cargaHoraria]);
    }

    public function deleteAction($id)
    {
        $aula = $this->getAula($id);

        $request = $this->getRequest();

        if($request->get('_method') == 'DELETE')
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aula);
            $entityManager->flush();

            $aulas = $this->repositoryAula()->findBy(['cargaHoraria' => $aula->getCargaHoraria()]);

            return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseShow.html.twig', ['Model' => $aulas, 'CargaHoraria' => $aula->getCargaHoraria()]);
        }
        else
        {
            return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseDelete.html.twig', ['Model' => $aula]);
        }
    }
}