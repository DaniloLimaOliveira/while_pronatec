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
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

class DiarioClasseController extends BaseController
{
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
    public function repositoryFrequencia()
    {
        return $this->getDoctrine()->getRepository(Frequencia::class);
    }

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
     * Consulta a Carga Horaria de acordo com o ID
     * @param $id
     * @return CargaHoraria $cargaHoraria
     */
    public function consultarCargaHoraria($id)
    {
        $cargaHoraria = $this->repositoryCargaHoraria()->find($id);

        if (!$cargaHoraria) {
            throw $this->createNotFoundException(sprintf('Carga Horária id: %s não encontrada!', $id));
        }

        return $cargaHoraria;
    }

    /**
     * Cria a lista de frequencias de acordo as informações selecionadas na tela
     * @param Request $request
     * @param Aula $aula
     * @return Frequencias
     */
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

    /**
     * Ordena as frequencias pelo nome do aluno
     * @param $frequencias
     * @return ArrayCollection
     */
    public function ordenarFrequencia($frequencias)
    {
        $iterator = $frequencias->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a->getMatricula()->getAluno()->getNome() < $b->getMatricula()->getAluno()->getNome()) ? -1 : 1;
        });
        $frequencias = new ArrayCollection(iterator_to_array($iterator));

        return $frequencias;
    }

    /**
     * Consulta os alunos matriculados na turma, verifica se existe frequência cadastrada na aula,
     * caso não exista cria a frequencia para o aluno.
     * @param CargaHoraria $cargaHoraria
     * @param Aula $aula
     * @return Frequencias
     */
    public function getFrequenciaMatricula($cargaHoraria, $aula = null)
    {
        $matriculas = $this->repositoryMatricula()->findBy(['turma' => $cargaHoraria->getTurma(),
                                                            'status' => StatusMatricula::ATIVA]
        );

        $frequencias = new \ArrayObject();

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

            $frequencias->append($frequencia);
        }

        return $this->ordenarFrequencia($frequencias);
    }

    /**
     * Consulta a aula e suas frequências
     * @param $idAula
     * @return Aula $aula
     */
    public function getAula($idAula)
    {
        $aula = $this->repositoryAula()->find($idAula);

        if (!$aula) {
            throw $this->createNotFoundException(sprintf('Aula id: %s não encontrada!', $idAula));
        }

        $aula->setFrequencias($this->getFrequenciaMatricula($aula->getCargaHoraria(), $aula));

        return $aula;
    }

    /**
     * Seleciona ou cria a aula, caso não exista
     * @param $idCargaHoraria
     * @param $data
     * @return Aula|null|object
     */
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

    /**
     * Tela de seleção da carga horária para o cadastro de aula
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        $filtro = array('status' => StatusTurma::EM_ANDAMENTO);
        $usuario = $this->getUser();

        if( $usuario && $usuario->getColaborador() &&
            $usuario->getColaborador()->getFuncao() == FuncaoColaborador::PROFESSOR)
        {
            $filtro['colaborador'] = $usuario->getColaborador();
        }

        $cargaHorarias = $this->repositoryCargaHoraria()->findBy($filtro);

        return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseCreate.html.twig', ['Model' => $cargaHorarias]);
    }

    /**
     * Lista as aulas ministradas pelo professor
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $aulas = null;
        $usuario = $this->getUser();

        if( $usuario && $usuario->getColaborador() &&
            $usuario->getColaborador()->getFuncao() == FuncaoColaborador::PROFESSOR)
        {
            $aulas = $this->repositoryAula()->selectAulas($usuario->getColaborador());
        }

        return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseList.html.twig', ['Model' => $aulas]);
    }

    /**
     * Carrega a tela de cadastro de aula (insert e edit)
     * @param Aula or CargaHoraria $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
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

    /**
     * Registra a aula
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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
            $response = $this->redirectToRoute('diarioClasse_create');
        }
        else//btn_create_and_create
        {
            $response = $this->renderWithExtraParams('admin/diarioClasse/diarioClasseRegister.html.twig',
                ['Model' => $cargaHoraria, 'Mensagem' => $mensagem]);
        }

        return $response;
    }

    /**
     * Carrega as informações da aula, de acordo com id da carga horária e a data selecionada
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
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

    /**
     * Consulta as aulas realizadas, de acordo com o id da carga horária
     * @param CargaHoraria $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id = null)
    {
        $cargaHoraria = $this->consultarCargaHoraria($id);

        $aulas = $this->repositoryAula()->findBy(['cargaHoraria' => $cargaHoraria]);

        return $this->renderWithExtraParams('admin/diarioClasse/diarioClasseShow.html.twig', ['Model' => $aulas, 'CargaHoraria' => $cargaHoraria]);
    }


    /**
     * Exibe a tela de exclusão e também efetua a exclusão da aula
     * @param Aula $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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