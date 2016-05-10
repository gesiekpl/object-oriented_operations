<?php

class RepeatOperation implements Operation {

    function algorithm($data) {
        $array = array_count_values($data);
        return $array[$data[0]];
    }

}

?>