<?php

class Controller
{

    function __construct()
    {
        error_log('CONTROLLER::CONSTRUCT=>OK');
        $this->view = new View();
    }

    function loadModel($MODEL)
    {
        $modelFile = 'models/' . $MODEL . 'Model.php';

        if (file_exists($modelFile)) {

            require_once $modelFile;
            $modelName =  ucfirst($model . 'Model');

            $this->model = new  $modelName();
        }
    }
}
