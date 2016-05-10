<?php
function getLine($fileName, $numberLine) {
    $count = 0;
    $file = fopen($fileName, 'r') or die ($php_errormsg);
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty($line) &&  $count == $numberLine) {
            return trim($line);
        }
        $count++;
    }
    fclose($file) or die ($php_errormsg);
}

function countLines($fileName) {
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

function generData($line) {
    $chars = array();
    if (!empty($line) && is_string($line)) {
        $chars = str_split($line);
        return $chars;
    }
}

function sorting($data) {
    if(!empty($data)) {
        sort($data);
    }
    return $data;
}

function revers($data) {
    return array_reverse($data);
}

function repeat($data) {
    $array = array_count_values($data);
    return $array[$data[0]];
}

$fileName = 'data.txt';

function main($fileName) {
    $lines = countLines($fileName);
    for ($numberLine = 0; $numberLine <= $lines; $numberLine++) {
        $line = getLine($fileName, $numberLine);
        switch ($line) {
            case 'SORT':
                echo implode(' ', sorting(generData(getLine($fileName, $numberLine+1)))) . '</br>';
                break;
            case 'REVERSE':
                echo implode(' ', revers(generData(getLine($fileName, $numberLine+1)))) . '</br>';
                break;                
            case 'REPEAT':
                echo repeat(generData(getLine($fileName, $numberLine+1))) . '</br>';
                break;                
            default:
                break;
        }
    }
}
main($fileName);