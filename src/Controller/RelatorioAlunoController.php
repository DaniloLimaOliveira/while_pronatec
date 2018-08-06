<?php

namespace App\Controller;

use App\Util\Util;
use Symfony\Component\HttpFoundation\Request;

class RelatorioAlunoController extends BaseController
{
    public function listAction()
    {
        return $this->renderWithExtraParams('admin/relatorioAluno/relatorioAlunoList.html.twig', ['Model' => null]);
    }

    public function exportAction(Request $request)
    {
        try
        {
            $dataInicio = $request->get('filter_aula__data_value_start');
            $dataFim = $request->get('filter_aula__data_value_end');

            if (Util::IsNullOrEmptyString($dataInicio) || Util::IsNullOrEmptyString($dataFim)) {
                throw new \LogicException("Preencha a data inicial e a data final!");
            }
            if (strtotime($dataInicio) > strtotime($dataFim)) {
                throw new \LogicException("Data inicial maior que a data final!");
            }

            $relatorio = $this->repositoryFrequencia()->consultarFrequencias($dataInicio, $dataFim);

            return $this->csvResponse('admin/relatorioAluno/relatorioAlunoList.csv.twig',
                                        ['Model' => $relatorio], 'financeiro_alunos');
        }
        catch (\Exception $ex)
        {
            $this->setFlashBagErrorMessage($ex->getMessage());
            return $this->renderWithExtraParams('admin/relatorioAluno/relatorioAlunoList.html.twig',
                                                ['Model' => ['dataIncio'=>$dataInicio, 'dataFim'=>$dataFim]]
            );
        }
    }

}