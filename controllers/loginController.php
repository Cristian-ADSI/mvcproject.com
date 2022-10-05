<?php
class LoginController extends Controller
{
    function __construct()
    {
        error_log("LOGIN::CONSTRUCT=>Login cargado");
        parent::__construct();
    }

    function loadView(){
        $this->view->render('login');
    }
}
