<?php
class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();
        error_log("LOGIN::CONSTRUCT=>OK");
    }

    function loadView(){
        $this->view->render('login');
    }
}
