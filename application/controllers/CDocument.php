<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 14:13
 */

class CDocument extends BaseCtrl {



    public function affichDoc(){
        $document = $this->getDoc();
        $doc = $document[0];
        $version = $document[1];
        $partie = $document[2];
        $this->load->view('VDocument', array('document' => $doc, 'version' => $version, 'partie' => $partie));
    }



    public function getDoc(){
        //requête de selection du documents, de sa version et de ses parties
        $idDocument = 1;
        $req = "SELECT id FROM version WHERE document_id = " . $idDocument . "";
        $imbrique = "SELECT partie_id FROM partieversion WHERE version_id= " . $req . "";
        $query = $this->doctrine->em->createQuery("SELECT d,v, p FROM Document d, Version v, partie p WHERE d.id='1' AND v.document=d.id AND p.id= " . $imbrique ."");
        if($doc = $query->getResult()) {
            $i = 0;
            foreach ($doc as $data){
                echo "</br>" . $data->getId() . " i = ";
                echo $i;
                $i++;
            }
            //return $doc;


        }
        else{
            echo "Impossible d'afficher ce document";
        }
    }


} 