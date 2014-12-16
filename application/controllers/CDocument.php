<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 14:13
 */

class CDocument extends BaseCtrl {


    public function getDoc(){
        //requête de selection du documents, de sa version et de ses parties
        $idDocument = 1;
        //$req = "SELECT id FROM version WHERE document_id = " . $idDocument . "";
        //$imbrique = "SELECT partie_id FROM partieversion WHERE version_id= " . $req . "";
        $query = $this->doctrine->em->createQuery("SELECT v FROM Version v JOIN v.document d WHERE d.id=" . $idDocument . " ORDER BY v.datemaj ");
        //$query->setMaxResults(2);
        if($doc = $query->getResult()) {
            //var_dump($doc->getParties());
            return $doc;

        }
        else{
            echo "Impossible de récupérer ce document";
        }
    }

    public function affichDoc(){
        $doc = $this->getDoc();

        if ($doc != null){
            $this->load->view('VHeader');
            $this->load->view('VDocument', array('doc' => $doc));
        }
    }

} 