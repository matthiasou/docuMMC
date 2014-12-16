<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 15:01
 */

?>
<html ng-app>
    <head>
        <meta charset="UTF-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.27/angular.min.js"></script>
    </head>

    <body>

<p id="titDoc"><?php echo $doc[0]->getDocument()->getTitre();?></p>
<p id="dateCrea"><?php echo $doc[0]->getDocument()->getDateCreation()->format('Y-m-d H:i:s');?></p>


<div id="divSommaire" class="span6">
    <ul>
        <?php
        //***** Sommaire affichant le titre de chaque parties les unes à la suite des autres
        echo "<fieldset>";
        echo "<legend>Sommaire : </legend>";
            foreach ($doc as $docu) {
                foreach ($docu->getParties() as $partie) {
                    echo "<li><a href='#divdoc". $partie->getNiveau() ."'>" . $partie->getTitre() . "</a></li>";
                }
            }
        echo "</fieldset>";
        ?>

    </ul>
</div>


<div id="divParties" class="span10">
    <?php
    //***** Affichage des parties les unes à la suite des autres
    foreach ($doc as $docu) {
        foreach ($docu->getParties() as $partie) {
            echo "<fieldset id='divdoc". $partie->getNiveau() ."' class='divdoc". $partie->getNiveau() ."'>";
            echo "<legend>" . $partie->getTitre() . "<input type='button' id='btnEdit' class='btnEdit' /></legend>";
            echo "" . $partie->getContenu() . "";
            echo "</fieldset>";
        }
    }
    ?>
</div>

<?php /*?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.27/angular.min.js"></script>
    <input type="text" value="test" ng-model="query" placeholder="recherche">
    <h1>Hello {{name}} !</h1>


<?php var_dump($array);?>


    <?php $array = null?>

        <?php foreach($doc as $docu):?>
            <?php foreach($docu->getParties() as $partie):?>

                    <?php
                    $array = $array + "{titre:'".$partie->getTitre()."', niveau:'".$partie->getNiveau()."'}";

                    ?>
            <?php endforeach;?>
        <?php endforeach;?>

<?php var_dump($array);?>
    <div ng-init="users=[<?php echo $array;?>]">


    <ul>
        <li ng-repeat="user in users | filter:query">{{user}}

        </li>
    </ul>


</div>
*/?>
    </body>
</html>

