<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 01/12/14
 * Time: 20:53
 */

class CTest extends  BaseCtrl{

    public function affiche(){
        echo 'good';
    }

    public function testGet($nom, $autre =''){
        echo ('Le nom passe par GET est: '.$nom);

    }

} 