<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 02/12/14
 * Time: 00:56
 */

class CUtilisateur extends CI_Controller{

    public function refresh() {
        $this->load->view('VIndex');
    }

    public function all(){
        $query = $this->doctrine->em->createQuery("SELECT u FROM utilisateur u");
        $users = $query->getResult();
        $this->load->view('VUtilisateur',array('utilisateurs'=>$users));
    }



    public function connexion() {
        /*if ($joueur = $this->doctrine->em->createQuery("SELECT u FROM utilisateur u WHERE login='test' AND password ='test'")) {
            echo "bien joué";
        }else
            echo "connard";*/

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('');
        }
        else
        {
            $this->load->view('formsuccess');
        }

        /*$query = $this->doctrine->em->createQuery("SELECT u FROM utilisateur u");
        $users = $query->getResult();
        $this->load->view('VIndex',array('utilisateurs'=>$users));

        if ($joueur = DAO::getOne("Joueur", "login='" . $_POST["login"] . "' AND password= '" . $_POST["password"] . "'")) {
            //var_dump($joueur);
            $_SESSION["joueur1"] = $joueur;
            //var_dump($joueur);
        } else
            echo 'Identifiants incorrects';

        //echo JsUtils::doSomethingOn("#frmConnexion","hide");
        //echo JsUtils::doSomethingOn("#inscription","hide");
        echo JsUtils::get("CJoueur/index", "{}", "body");*/
    }
}
?>