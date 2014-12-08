<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 02/12/14
 * Time: 00:56
 */

class CUtilisateur extends BaseCtrl{



    public function refresh($pb='') {
        if (!isset($_SESSION['user'])) {
            $this->load->view('VConnexion');
            echo "Bienvenue " . $_SESSION['user']->getNom;
            if ($pb == true)
                echo 'Login ou password incorrect';
        }
        else{
            echo "Bienvenue " . $_SESSION['user']->getNom;
        }

    }





    public function all(){
        $this->load->library('jsUtils');
        $this->jsutils->getAndBindTo(".delete", "click", "/docu/CUtilisateur/deleteUser", "body");
        $this->jsutils->compile();
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u");
        $users = $query->getResult();
        $this->load->view('VUtilisateur',array('utilisateurs'=>$users));

    }

    public function deleteUser($param){
        $id=str_replace("utilisateur", "", $param[6]);
       // var_dump($id);
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.id=".$id);
        $user = $query->getSingleResult();
        //var_dump($user);
        $this->doctrine->em->remove($user);
        $this->doctrine->em->flush();
        $this->all();


    }



    public function connexion()
    {
        $login = $_POST['username'];
        $password = $_POST['password'];
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.login='" . $login . "' AND u.password ='" . $password . "'");
        if($joueur = $query->getResult()) {

            echo $joueur[0]->getLogin();
            var_dump($joueur[0]);
        }
        else{
            $pb = array('erreur de connexion');
            $this->refresh($pb);
        }
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