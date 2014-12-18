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
            foreach ($doc as $docu) {
                foreach ($docu->getParties() as $partie) {
                    $this->jsutils->click("#flecheSlide". $partie->getId() ."",$this->jsutils->slideToggle("#divParCon". $partie->getId()));
                    echo $partie->getId();
                }
            }
            $this->jsutils->click("#btnEdit",$this->jsutils->slideToggle("#divParties"));
            $this->jsutils->compile();
            $this->load->view('VHeader');
            $this->load->view('VDocument', array('doc' => $doc));

        }
    }

} 