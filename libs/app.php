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
            return false;
        }

        // No existe el controlador a cargar
        $fileController = "controllers/$url[0].php";
        if (!file_exists($fileController)) {
            # 404 page.
            // return false 
        }

        require_once $fileController;
        $controllerName = ucfirst($url[0]) . 'Controller';
        $modelName = $url[0] . 'Montroller';

        $controller =  new $controllerName;
        $controller->loadModel($modelName);

        //No hay metodo a cargar
        $method = isset($url[1]) ? $url[1] : null;
        if (is_null($method)) {
            $controller->render();
            return;
        }

        //No existe el metodo en la clase
        if (method_exists($controller, $method)) {
            $controller->render();
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
        error_log("APP::constructor=>No controller especified");

        $fileController = 'controllers/loginController.php';
        require_once $fileController;
        $controller = new LoginController();
        // $controller->loadModel('login');
        // $controller->render();    
    }
}
