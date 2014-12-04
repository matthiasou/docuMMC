<?php

class BaseCtrl extends \CI_Controller{


    public function __construct(){
        parent::__construct();
        if(!$this->_isValid())
            $this->_onInvalidControl();
    }
    /**
     * retourne Vrai si l'accès au contrôleur est autorisé
     * @return boolean
     */
    protected function _isValid(){
        return true;
    }

    protected function _onInvalidControl(){
        header('HTTP/1.1 401 Unauthorized', true, 401);
        exit;
    }
}