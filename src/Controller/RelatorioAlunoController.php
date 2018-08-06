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

            $response = $this->renderWithExtraParams('admin/relatorioAluno/relatorioAlunoList.csv.twig', ['Model' => $relatorio]);
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');
            $response->headers->set('encoding', 'UTF-8"');

            return $response;
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