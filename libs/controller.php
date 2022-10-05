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

    function existsPOST($PARAMS)
    {

        $validation = true;

        foreach ($PARAMS as $param) {
            if (!isset($_POST[$param])) {
                error_log("CONTROLLER::existsPOST => No existe el parametro $param");
                $validation =  false;
            }
        }

        return $validation;
    }

    function existsGET($PARAMS)
    {
        $validation = true;

        foreach ($PARAMS as $param) {
            if (!isset($_GET[$param])) {
                error_log("CONTROLLER::existsGET => No existe el parametro $param");
                $validation =  false;
            }
        }

        return $validation;
    }

    function redirect($PATH, $MESSAGES)
    {
        $data = [];
        $params = '';

        foreach ($MESSAGES as $key => $message) {

            array_push($data, "$key=$message");
        }

        $params = join('&', $data);

        if ($params != '') {
            $params = "?$params";
        }

        header("lLcation:".constant(URL)."$PATH" . "$params");
    }
}
