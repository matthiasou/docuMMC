<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 14:13
 */

class CDocument extends BaseCtrl {



    public function affichDoc(){
        $doc = $this->getDoc();
        //var_dump($document->getParties());

        $this->load->view('VDocument', array('doc' => $doc));
    }



    public function getDoc(){
        //requête de selection du documents, de sa version et de ses parties
        $idDocument = 1;
        //$req = "SELECT id FROM version WHERE document_id = " . $idDocument . "";
        //$imbrique = "SELECT partie_id FROM partieversion WHERE version_id= " . $req . "";
        $query = $this->doctrine->em->createQuery("SELECT v FROM Version v JOIN v.document d WHERE d.id=" . $idDocument . " ORDER BY v.datemaj");
        if($doc = $query->getSingleResult()) {
            //var_dump($doc->getParties());
            return $doc;

        }
        else{
            echo "Impossible d'afficher ce document";
        }
    }


} 