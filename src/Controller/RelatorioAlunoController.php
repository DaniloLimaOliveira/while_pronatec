<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class RelatorioAlunoController extends BaseController
{
    public function listAction()
    {
        return $this->renderWithExtraParams('admin/relatorioAluno/relatorioAlunoList.html.twig', ['Model' => null]);
    }

    public function exportAction(Request $request)
    {
        //TODO: Validar os campos

        $dataInicio = $request->get('filter_aula__data_value_start');
        $dataFim = $request->get('filter_aula__data_value_end');

        $relatorio = $this->repositoryFrequencia()->consultarFrequencias($dataInicio, $dataFim);

        $response = $this->renderWithExtraParams('admin/relatorioAluno/relatorioAlunoList.csv.twig', ['Model' => $relatorio]);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

        return $response;
    }

}