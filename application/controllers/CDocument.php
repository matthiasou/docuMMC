<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 14:13
 */

class CDocument extends BaseCtrl {


    public function getDoc($param){
        $query = $this->doctrine->em->createQuery("SELECT v FROM Version v JOIN v.document d WHERE d.id=" . $param . " ORDER BY v.datemaj ");
        if($doc = $query->getResult()) {
            return $doc;
        }
        else{
            echo "Impossible de récupérer ce document";
        }
    }

    public function affichDoc($param){
        $doc = $this->getDoc($param);

        if ($doc != null){
            $this->load->view('VHeader');
            $this->load->view('VDocument', array('doc' => $doc));
        }
    }

} 