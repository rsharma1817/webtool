<?php

class MRepository
{

    /**
     * Método auxiliar para montagem de grids de dados.
     * Retorna objeto JSON relativo a um criteria ou um array de dados. Os atributos "page" (número da página, 0-based)
     * e "rows" (número de linhas a serem retornadas) devem estar definidos em $this->data.
     * @param basecriteria|array $source Fonte de dados.
     * @param boolean $rowsOnly Se o JSON deve conter apenas os dados das linhas ou se deve conter também o total.
     * @param integer total
     * @return JSON object
     */
    public static function gridDataAsJSON($source, $rowsOnly = false, $total = 0)
    {
        $data = Manager::getData();
        $result = (object)[
            'rows' => array(),
            'total' => 0
        ];
        if ($source instanceof BaseCriteria) {
            $criteria = $source;
            $result->total = $criteria->asQuery()->count();
            //if ($data->page > 0) {
            //    $criteria->range($data->page, $data->rows);
            //}
            $source = $criteria->asQuery();
        }
        if ($source instanceof database\mquery) {
            $result->total = $source->count();
            if ($data->page > 0) {
                $source->setRange($data->page, $data->rows);
            }
            $result->rows = $source->asObjectArray();
        } elseif (is_array($source)) {
            $rows = array();
            foreach ($source as $row) {
                $r = new \StdClass();
                foreach ($row as $c => $col) {
                    $field = is_numeric($c) ? 'F' . $c : $c;
                    $r->$field = "{$col}";
                }
                $rows[] = $r;
            }
            $result->rows = $rows;
            $result->total = ($total != 0) ? $total : count($rows);
        }
        if ($rowsOnly) {
            return MJSON::encode($result->rows);
        } else {
            return MJSON::encode($result);
        }
    }


}