<?php
class App
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        // No se especifico controlador en la url 
        if (empty($url[0])) {
            $this->redirectLogin();
            return;
        }

        // No existe el controlador especificado
        $fileController = "controllers/$url[0].php";
        if (!file_exists($fileController)) {
            $this->redirectErrors();
            return;
        }

        // TODO:: scar esto de aqui 
        // ------------------------------
        require_once $fileController;
        $controller = ucfirst($url[0]) . 'Controller';
        $model = $url[0] . 'Model';
        $controller =  new $controller();
        // ------------------------------
        $controller->loadModel($model);

        //No se especifico metodo en la url
        $method = isset($url[1]) ? $url[1] : null;
        if (is_null($method)) {
            $controller->loadView();
            return;
        }

        //No existe el metodo especificado
        if (method_exists($controller, $method)) {
            $this->redirectErrors();
            return;
        }

        //No tiene parametros
        $params = isset($url[2]) ? $url[2] : null;
        if (is_null($params)) {
            $controller->{$method}();
        }


        $numOfParams = count($url) - 2;

        $paramList = [];

        for ($i = 0; $i < $numOfParams; $i++) {
            array_push($paramList, $url[$i] + 2);
        }

        $controller->{$method}($paramList);
    }

    private function redirectLogin()
    {
        error_log("APP::constructor=>No se especifico controlador");

        $fileController = 'controllers/loginController.php';
        require_once $fileController;

        $controller = new LoginController();
        $controller->loadModel('login');
        $controller->loadView();
    }

    private function redirectErrors()
    {
        error_log("APP::constructor=>No existe el controlador especificado");

        $fileController = 'controllers/errorsController.php';
        require_once $fileController;

        $controller = new ErrorsController();
        $controller->loadView();
    }
}
