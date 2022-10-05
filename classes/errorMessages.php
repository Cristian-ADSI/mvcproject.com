<?php
class ErrorMessages
{

    // ERROR_CONTROLLER_METHOD_ACTION
    const ERORR_ADMIN_TEST = "test";


    private $errorList = [];


    public function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERORR_ADMIN_TEST => 'Mensaje de error exitoso!'
        ];
    }

    public function getError($CODE)
    {
        return $this->errorList[$CODE];
    }

    public function existsKey($CODE)
    {
        if (array_key_exists($CODE, $this->errorList)) {
            return true;
        } else {
            return false;
        }
    }
}
