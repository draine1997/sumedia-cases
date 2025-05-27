<?php

function pr($data) : void {
    if (isLocal()):
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    endif;
}

function isLocal() : bool {
    return (stristr($_SERVER['HTTP_HOST'], 'localhost') !== false);
}