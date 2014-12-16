<?php
class Ctrl extends \CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('jsUtils');
    }

    function index(){
        $this->jsutils->getAndBindTo("#div","click","Ctrl/ajaxGet","#response");
        $this->jsutils->compile();
        $this->load->view('test');
    }

    function ajaxGet(){
        echo "Exemple de get sur click";
    }
}