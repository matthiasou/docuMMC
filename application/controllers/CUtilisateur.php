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
            //echo "Bienvenue " . $this->session->userdata('user')->getNom();

            if ($pb == true)
                echo 'Login ou password incorrect';
        }
        else{
            echo "Bienvenue " . $this->session->userdata('user')->getNom();
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
        if($utilisateur = $query->getSingleResult()) {

            //echo $utilisateur[0]->getLogin();
            //$_SESSION["user"] = $utilisateur[0];
            //$this->session->set_userdata('user', serialize($utilisateur));
            //$this->session->userdata('user')->getNom();

            var_dump($utilisateur);
            //var_dump($_SESSION["user"]);
            //echo $_SESSION["user"]->getGroupe()->getLibelle();
        }
        else{
            $pb = array('erreur de connexion');
            $this->refresh($pb);
        }
    }



}
?>