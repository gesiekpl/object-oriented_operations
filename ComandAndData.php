<?php

class ComandAndData {

    public $comand;
    public $variable = array();

    public function __construct($comand, $variable) {
        $this->comand = $comand;
        $this->variable = str_split($variable);
    }

    public function getComand() {
        return $this->comand;
    }

    public function getVariable() {
        return $this->variable;
    }

}

?>