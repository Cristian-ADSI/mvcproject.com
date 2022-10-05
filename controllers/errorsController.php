<?php

class ErrorsController extends Controller
{


    function __construct()
    {
        error_log("ERROR::CONSTRUCT=>Errors cargado");
        parent::__construct();
    }

    function loadView(){
        $this->view->render('errors');
    }
}
