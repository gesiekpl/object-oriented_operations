<?php

include_once './ComandAndData.php';

class DataGenerator {

    public $arrayComandAndData;

    private function getLine($fileName, $numberLine) {
        $count = 0;
        $file = fopen($fileName, 'r') or die($php_errormsg);
        while (!feof($file)) {
            $line = fgets($file);
            if (!empty($line) && $count == $numberLine) {
                return trim($line);
            }
            $count++;
        }
        fclose($file) or die($php_errormsg);
    }

    private function countLines($fileName) {
        $lines = 0;
        if ($file = fopen($fileName, 'r')) {
            while (!feof($file)) {
                if (fgets($file)) {
                    $lines++;
                }
            }
        }
        return $lines;
    }

    public function generateData($fileName) {
        $this->arrayComandAndData = new ArrayObject();
        $lines = $this->countLines($fileName);
        for ($numberLine = 0; $numberLine <= $lines; $numberLine++) {
            $comand = $this->getLine($fileName, $numberLine);
            if ($comand == 'SORT' || $comand == 'REVERSE' || $comand == 'REPEAT') {
                $variable = $this->getLine($fileName, $numberLine + 1);
                $object = new ComandAndData($comand, $variable);
                $this->arrayComandAndData->append(new ComandAndData($comand, $variable));
            }
        }
        return $this->arrayComandAndData;
    }

}

?>