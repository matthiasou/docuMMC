<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 02/12/14
 * Time: 00:56
 */

class CUtilisateur extends BaseCtrl{

    public function refresh() {
        $this->load->view('VIndex');
    }

    public function all(){
        $query = $this->doctrine->em->createQuery("SELECT u FROM utilisateur u");
        $users = $query->getResult();
        $this->load->view('VUtilisateur',array('utilisateurs'=>$users));

    }



    public function connexion()
    {
        $login = $_POST['username'];
        $password = $_POST['password'];

        if($query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.login='" . $login . "' AND u.password ='" . $password . "'")) {
            $joueur = $query->getSingleResult();
            echo $joueur->getLogin();
        }
        else
                echo "chiasse";
        //echo $joueur->getLogin();





            /*$this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'required');
            $this->form_validation->set_rules('password', 'Mot de passe', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('VIndex');
            }
            else
            {
                $this->load->view('VConnSuccess');
            }*/

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