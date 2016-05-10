<?php

class ReversOperation implements Operation {

    function algorithm($data) {
        $data = array_reverse($data);
        return implode($data);
    }

}

?>