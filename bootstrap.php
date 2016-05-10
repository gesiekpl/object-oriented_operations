<?php

include_once './Operation.php';
include_once './SortOperation.php';
include_once './ReversOperation.php';
include_once './RepeatOperation.php';
include_once './DataGenerator.php';
include_once './ComandAndData.php';


$operations['SORT'] = new SortOperation();
$operations['REVERSE'] = new ReversOperation();
$operations['REPEAT'] = new RepeatOperation();

$data = new DataGenerator();
$data->generateData('data.txt');

foreach ($data->arrayComandAndData as $key => $object) {
    $operation = $operations[$object->getComand()];
    echo 'Operacja: ' . $object->getComand() . ' dane przed: ' . implode($object->getVariable()) . ' dane po operacji: ' . $operation->algorithm($object->getVariable()) . '</br>';
}