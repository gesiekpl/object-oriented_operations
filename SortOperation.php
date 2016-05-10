<?php

class SortOperation implements Operation {

    function algorithm($data) {
        sort($data);
        return implode($data);
    }

}

?>