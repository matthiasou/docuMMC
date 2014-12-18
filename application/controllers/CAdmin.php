<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 09/12/14
 * Time: 19:10
 */

class CAdmin extends BaseCtrl{

    /**
     * Appel de la fonction refresh
     */
    public function index(){
        $this->refresh();

    }

    /**
     *Affichage initial  et rafraîchissement après modification
     */
    public function refresh(){
        ob_start();
        $this->jsutils->getAndBindTo(".delete", "click", "/docu/CAdmin/deleteUser", "body");
        $this->jsutils->getAndBindTo(".addUser", "click", "/docu/CAdmin/viewAddUser", "#addUser");
        $this->jsutils->getAndBindTo(".addMonde", "click", "/docu/CAdmin/viewAddMonde", "#addMonde");
        $this->jsutils->getAndBindTo(".modifier", "click", "/docu/CAdmin/viewUpdateUser", "#updateUser");
        $this->jsutils->getAndBindTo(".deleteMonde", "click", "/docu/CAdmin/deleteMonde", "body");
        $this->jsutils->getAndBindTo(".modifierMonde", "click", "/docu/CAdmin/viewUpdateMonde", "#updateMonde");
        $this->jsutils->compile();

        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u");
        $users = $query->getResult();
        $query2 = $this->doctrine->em->createQuery("SELECT m FROM Monde m");
        $mondes =$query2->getResult();
        $this->load->view('VAdmin',array('utilisateurs'=>$users,'mondes'=>$mondes));


    }

    /**
     * @param $param // id de l'utilisateur
     * Permet de supprimer un utilisateur
     */
    public function deleteUser($param){
        $id=str_replace("delete", "", $param);
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.id=".$id);
        $user = $query->getSingleResult();
        $this->doctrine->em->remove($user);
        $this->doctrine->em->flush();
        $this->refresh();
    }

    /**
     * @param $param // id de l'utilisateur
     * Affichage de la vue VUpdateUser avec les informations de l'utilisateur
     */
    public function viewUpdateUser($param){
        $this->jsutils->click("#btFermerUser",$this->jsutils->slideToggle("#frmUpdateUser"));
        $this->jsutils->postFormAndBindTo(".btUpdateUser", "click", "/docu/CAdmin/updateUser","frmUpdateUser","#messageUpdateUser");
        $this->jsutils->compile();
        $id=str_replace("modifier", "", $param);
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.id=".$id);
        $user = $query->getSingleResult();
        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m");
        $mondes = $query->getResult();
        $query = $this->doctrine->em->createQuery("SELECT g FROM Groupe g");
        $groupes = $query->getResult();
       // var_dump($user);
        $this->load->view('VUpdateUser',array('utilisateurs'=>$user,'monde' => $mondes, 'groupe' => $groupes));

    }

    /**
     * @param $param // id de l'utilisateur
     * Permet de mettre à jour l'utilisateur en récuperant les champs remplis
     */
    public function updateUser($param){
        $id = str_replace("btUpdateUser","",$param);
        $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.id=".$id);
        $query1 = $this->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id=".$_POST["monde_id"]);
        $query2 = $this->doctrine->em->createQuery("SELECT g FROM Groupe g WHERE g.id=".$_POST["groupe_id"]);
        $utilisateur = $query->getSingleResult();
        $monde = $query1->getSingleResult();
        $groupe = $query2->getSingleResult();
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setMail($_POST['mail']);
        $utilisateur->setLogin($_POST['login']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setPassword($_POST['password']);
        $utilisateur->setMonde($monde);
        $utilisateur->setGroupe($groupe);
        $this->doctrine->em->persist($utilisateur);
        $this->doctrine->em->flush($utilisateur);

        echo'Utilisateur mis à jour';

    }

    /**
     * Affichage de la vue VAddUser
     */
    public function viewAddUser(){


        $this->jsutils->postFormAndBindTo("#btUser", "click", "/docu/CAdmin/addUser","frmAddUser","#message");
        $this->jsutils->click("#btFermer",$this->jsutils->hide("#frmAddUser"));
        $this->jsutils->compile();
        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m");
        $mondes = $query->getResult();
        $query = $this->doctrine->em->createQuery("SELECT g FROM Groupe g");
        $groupes = $query->getResult();
        $this->load->view('VAddUser', array("monde" => $mondes, "groupe" => $groupes));

    }


    /**
     * Récupére les champs rentrés et crée l'utilisateur
     */
    public  function  addUser(){

        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id=".$_POST["monde_id"]);
        $query2 = $this->doctrine->em->createQuery("SELECT g FROM Groupe g WHERE g.id=".$_POST["groupe_id"]);
        $monde = $query->getSingleResult();
        $groupe = $query2->getSingleResult();
        $utilisateur = new utilisateur();
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setMail($_POST['mail']);
        $utilisateur->setLogin($_POST['login']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setPassword($_POST['password']);
        $utilisateur->setMonde($monde);
        $utilisateur->setGroupe($groupe);
        $this->doctrine->em->persist($utilisateur);
        $this->doctrine->em->flush($utilisateur);
        echo"Utilisateur ajouté";

    }

    /**
     * @param $param // id du monde
     * permet de supprimer le monde
     */
    public function deleteMonde($param){

        $id=str_replace("deleteMonde", "", $param);
        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id=".$id);
        $monde = $query->getSingleResult();
        $this->doctrine->em->remove($monde);
        $this->doctrine->em->flush();
        $this->refresh();

    }

    /**
     * @param $param // id du monde
     * fonction qui affiche la vue VUdpateMonde
     */
    public function viewUpdateMonde($param){
        $this->jsutils->click("#btFermerMonde",$this->jsutils->slideToggle("#frmUpdateMonde"));
        $this->jsutils->postFormAndBindTo(".btUpdateMonde", "click", "/docu/CAdmin/updateMonde","frmUpdateMonde","body");
        $this->jsutils->compile();
        $id=str_replace("modifierMonde", "", $param);
        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id=".$id);
        $monde = $query->getSingleResult();

        $this->load->view('VUpdateMonde',array('mondes'=>$monde));



    }

    /**
     * @param $param // id du monde
     * // récupére le champ libelle et le met à jour
     */
    public function updateMonde($param){
        $id = str_replace("btUpdateMonde","",$param);
        $query = $this->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id=".$id);
        $monde = $query->getSingleResult();
        $monde->setLibelle($_POST['libelle']);
        $this->doctrine->em->persist($monde);
        $this->doctrine->em->flush($monde);
        $this->index();
        //echo'Monde mis à jour';
    }

    /**
     * fonction qui affiche la vue VAddMonde
     */
    public function viewAddMonde(){
        $this->jsutils->click("#btFermerMonde",$this->jsutils->hide("#frmAddMonde"));
        $this->jsutils->postFormAndBindTo("#btMonde", "click", "/docu/CAdmin/addMonde","frmAddMonde","body");
        $this->jsutils->compile();
        $this->load->view('VAddMonde');

}

    /**
     * Récupére le champ libellé et crée le monde
     */
    public function addMonde(){
        $monde = new monde();
        $monde->setLibelle($_POST['libelle']);
        $this->doctrine->em->persist($monde);
        $this->doctrine->em->flush($monde);
        echo"Monde ajouté";
        $this->index();


    }


} 