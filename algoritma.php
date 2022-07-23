<?php

class AHP
{
    private const QUANTITATIVE = 1;
    private const QUALITATIVE = 0;
    private $criterias = [];
    private $rawCriteria  = [];
    private $relativeMatrix = [];
    private $eigenVector = [];
    private $candidates = [];
    private $criteriaPairWise = [];
    private $finalMatrix = [];
    private $finalRanks = [];
    private $ir = [];

    public function __construct(bool $isQuant = true, array $criterias = [], array $candidates = [], array $ir = [])
    {
        foreach ($criterias as $value) {
            $this->criterias[] = ['name' => $value, 'type' => ($isQuant ? self::QUANTITATIVE : self::QUALITATIVE)];
        }
        $this->candidates = $candidates;
        $this->ir = $ir;
        return $this;
    }

    public function getRank()
    {
        return $this->finalRanks;
    }

    public function getCriteria()
    {
        return $this->criterias;
    }

    public function getCandidate()
    {
        return $this->candidates;
    }

    public function getRelativeMatrix()
    {
        return $this->relativeMatrix;
    }

    public function getCriteriaPairWise()
    {
        return $this->criteriaPairWise;
    }

    public function getEigenVector()
    {
        return $this->eigenVector;
    }

    public function setIr($ir)
    {
        $this->ir = $ir;
        return $this;
    }

    public function setCriterias(array $criterias, bool $isQuant = true)
    {
        foreach ($criterias as $value) {
            $this->criterias[] = ['name' => $value, 'type' => ($isQuant ? self::QUANTITATIVE : self::QUALITATIVE)];
        }
        return $this;
    }

    public function setCandidates(array $candidates)
    {
        $this->candidates = $candidates;
        return $this;
    }

    public function setRelativeInterestMatrix(array $matrix)
    {
        $size = count($this->criterias);
        if ($size != count($matrix)) throw new \ErrorException('matrix size should be ' . $size . "x" . $size);
        foreach ($matrix as $i => $m) {
            if ($size != count($m)) throw new \ErrorException('matrix size should be ' . $size . "x" . $size);
            for ($j = 0; $j < count($m); $j++) {
                if ($i == $j) {
                    if ($matrix[$i][$j] != 1) {
                        throw new \ErrorException('matrix diagonal should have value : 1');
                    }
                } else {
                    if ($matrix[$i][$j] != null) {
                        $matrix[$j][$i] = 1 / $matrix[$i][$j];
                    } else {
                        $matrix[$i][$j] = 1 / $matrix[$j][$i];
                    }
                }
                //echo $matrix[$i][$j]." ";
            }
            //echo "\n";
        }
        //        $matrix = MatrixCalculator::multiply($matrix,$matrix);
        $do = $this->normalizeRelativeInterestMatrixAndCountEigen($matrix);

        $this->relativeMatrix = $do['matrix'];
        //print_r($do['matrix']);
        $this->eigenVector = $do['eigen'];
        //print_r($this->eigenVector);
        return $this;
    }

    public function setCriteriaPairWise($criteria_name, array $matrix)
    {
        $id = array_search($criteria_name, array_column($this->criterias, 'name'));
        if (!is_numeric($id)) throw new \ErrorException('Criteria \'' . $criteria_name . '\' not found');

        return $this->criterias[$id]['type'] == self::QUALITATIVE ? $this->setCriteriaPairWiseQualitative($criteria_name, $matrix) : $this->setCriteriaPairWiseQuantitative($criteria_name, $matrix);
    }

    public function setBatchCriteriaPairWise(array $matrix)
    {
        $this->criteriaPairWise = [];
        foreach ($matrix as $key => $value) {
            $this->setCriteriaPairWise($key, $value);
        }
        return $this;
    }

    private function setCriteriaPairWiseQuantitative($criteria_name, array $matrix)
    {
        $size = count($this->candidates);
        if (count($matrix) != $size) throw new \ErrorException('Quantitative Pairwise should have matrix sized ' . $size . "x1");
        $tot = array_sum($matrix);
        $matrix_eigen = [];
        foreach ($matrix as $key => $value) {
            if (is_array($value)) throw new \ErrorException('Quantitative Pairwise should have matrix sized ' . $size . "x1");

            $matrix_eigen[] = $value / $tot;
        }
        $this->criteriaPairWise[$criteria_name]['eigen'] = $matrix_eigen;
        $this->criteriaPairWise[$criteria_name]['matrix'] = $matrix;
        return $this;
    }

    private function setCriteriaPairWiseQualitative($criteria_name, $matrix)
    {

        $size = count($this->candidates);
        if ($size != count($matrix)) throw new \ErrorException('matrix size should be ' . $size . "x" . $size);
        foreach ($matrix as $i => $m) {
            if ($size != count($m)) throw new \ErrorException('matrix size should be ' . $size . "x" . $size);
            for ($j = 0; $j < count($m); $j++) {
                if ($i == $j) {
                    if ($matrix[$i][$j] != 1) {
                        throw new \ErrorException('matrix diagonal should have value : 1');
                    }
                } else {
                    if ($matrix[$i][$j] != null) {
                        $matrix[$j][$i] = 1 / $matrix[$i][$j];
                    } else {
                        $matrix[$i][$j] = 1 / $matrix[$j][$i];
                    }
                }
                //echo $matrix[$i][$j]." ";
            }
            //echo "\n";
        }
        // $criteria_name;
        $this->rawCriteria[$criteria_name] = $matrix;
        $this->criteriaPairWise[$criteria_name] = $this->normalizeRelativeInterestMatrixAndCountEigen($matrix);
        $this->criteriaPairWise[$criteria_name]['cr'] = $this->concistencyCheck($matrix, $this->criteriaPairWise[$criteria_name]['eigen']);
        return $this;
    }

    private function normalizeRelativeInterestMatrixAndCountEigen($matrix)
    {
        $s = count($matrix);
        $tot = [];

        for ($i = 0; $i < $s; $i++) {
            for ($j = 0; $j < $s; $j++) {
                if (!isset($tot[$j])) {
                    $tot[$j] = 0;
                }
                $tot[$j] += $matrix[$i][$j];
            }
        }
        //print_r($tot);
        $eigen = [];
        for ($i = 0; $i < $s; $i++) {
            $eigen[$i] = 0;
            for ($j = 0; $j < $s; $j++) {
                //echo $matrix[$i][$j]." ";
                $matrix[$i][$j] /= $tot[$j];
                $eigen[$i] += $matrix[$i][$j];
            }
            $eigen[$i] /= $s;
            //echo "\n";
        }
        return ['matrix' => $matrix, 'eigen' => $eigen];
        //return $this;
    }

    private function concistencyCheck($matrix, $eigen)
    {
        $s = count($matrix);
        $dmax = 0;
        for ($i = 0; $i < $s; $i++) {
            $e = 0;
            for ($j = 0; $j < $s; $j++) {
                //if(!isset($tot[$j])){
                //$tot[$j] = 0;
                //}
                $e += $matrix[$j][$i];
            }
            $dmax += $e * $eigen[$i];
        }
        $ci = ($dmax - $s) / ($s - 1);

        $cr = $ci / self::getIR($s);
        // $cr."\n";
        return $cr;
    }

    public function finalize()
    {
        if (count($this->criteriaPairWise) != count($this->criterias)) throw new \ErrorException('Error');

        $m1 = [];
        $ranks = [];
        for ($i = 0; $i < count($this->candidates); $i++) {
            $m1[$i] = [];
            $j = 0;
            $r = ['name' => $this->candidates[$i], 'value' => 0];
            foreach ($this->criteriaPairWise as $key => $criteriaPairWise) {
                $m1[$i][$j] = $criteriaPairWise['eigen'][$i];
                $r['value'] += $m1[$i][$j] * $this->eigenVector[$j];
                //echo $m1[$i][$j]." ";
                $j++;
            }
            $ranks[] = $r;
            //echo "\n";
        }
        $this->finalRanks = $ranks;
        $this->finalMatrix = $m1;
        //print_r($m1);
        return $this;
    }

    public function getIR($matrix_size)
    {
        return isset($this->ir[$matrix_size - 1]) ? $this->ir[$matrix_size - 1] : null;
    }

    public function multiply(array $m1, array $m2)
    {
        $ar = [];
        for ($i = 0; $i < count($m1); $i++) {
            $ar[$i] = [];
            for ($j = 0; $j < count($m2); $j++) {
                //if(!isset($ar[$i][$j])){
                $ar[$i][$j] = 0;
                //}
                for ($k = 0; $k < count($m1); $k++) {
                    $ar[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
                }
            }
        }
        return ($ar);
    }
}
