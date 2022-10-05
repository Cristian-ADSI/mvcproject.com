<?php

class View
{

    function __construct()
    {
        error_log('VIEW::CONSTRUCT=>OK');
    }

    public function render($VIEW, $DATA = [])
    {
        $this->data = $DATA;
        $this->handleMessages();
        require_once "views/$VIEW/index.php";
    }

    private function handleMessages()
    {
        if (isset($_GET['success']) && isset($_GET['error'])) { }
        
        if (isset($_GET['success'])) {   $this->handleSuccess(); }
        
        if (isset($_GET['error'])) { $this->handleError(); }
    }
    
    private function handleError(){
        $code = $_GET['error'];
        $error = new ErrorMessages();

        if ($error->existsKey($code)) {
            $this->data['error'] = $error->getError($code);
        }
    }

    private function handleSuccess(){
        $code = $_GET['success'];
        $success = new SuccesserMessages();

        if ($success->existsKey($code)) {
            $this->data['success'] = $success->getSuccess($code);
        }
    }


    public function showMessages(){
        $this->showErrors();
        $this->showSuccess();
    }

    private function showErrors(){
        if (array_key_exists('error', $this->data)){

            echo'<div class="error" > ' . $this->data['error'] . ' </div> ';
        }
    }

    private function showSuccess(){
        if (array_key_exists('success', $this->data)){

            echo'<div class="success" > ' . $this->data['success'] . ' </div> ';
        }
    }
}
