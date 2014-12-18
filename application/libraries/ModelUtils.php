<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 18/12/14
 * Time: 08:48
 */
class ModelUtils{

    private $ci;
    public function __construct(){
        $this->ci =& get_instance();
    }

    public function getAllUsers(){
        $query = $this->ci->doctrine->em->createQuery("SELECT u FROM Utilisateur u");
        return $query->getResult();
    }

    public function getUserWithId($param){
        $query = $this->ci->doctrine->em->createQuery("SELECT u FROM Utilisateur u WHERE u.id='".$param."'");
        return $query->getSingleResult();
    }

    public function getAllMondes(){
        $query = $this->ci->doctrine->em->createQuery("SELECT m FROM Monde m");
        return $query->getResult();
    }

    public function getMondeWithId($param){
        $query = $this->ci->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.id='".$param."'");
        return $query->getSingleResult();
    }

    public function getMondeWithLibelle($param){
        $query = $this->ci->doctrine->em->createQuery("SELECT m FROM Monde m WHERE m.libelle='".$param."'");
        return $query->getSingleResult();
    }

    public function getGroupeWithId($param){
        $query = $this->ci->doctrine->em->createQuery("SELECT g FROM Groupe g WHERE g.id='".$param."'");
        return $query->getSingleResult();
    }

    public function getGroupeWithLibelle($param){
        $query = $this->ci->doctrine->em->createQuery("SELECT g FROM Groupe g WHERE g.libelle='".$param."'");
        return $query->getSingleResult();

    }



}