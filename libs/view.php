<?php

class View
{

    function __construct()
    {
        error_log('VIEW::CONSTRUCT=>OK');
    }

    function render($VIEW, $DATA = [])
    {
        $this->data = $DATA;
        require_once "views/$VIEW/index.php";
    }
}
