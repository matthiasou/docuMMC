<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 15:01
 */

?>

<table border="1" align="center">
    <tr>
        <th>
            ID du document
        </th>
        <th>
            Titre du document
        </th>
        <th>
            Date de création du document
        </th>
    </tr>
    <tr>
        <td>
            <?php
            echo $doc[0]->getDocument()->getId();
            ?>
        </td>
        <td>
            <?php
                echo $doc[0]->getDocument()->getTitre();
            ?>
        </td>
        <td>
            <?php
            echo $doc[0]->getDocument()->getDateCreation()->format('Y-m-d H:i:s');
            ?>
        </td>
    </tr>
    <?php

    ?>
</table>

<div id="divParties" class="divParties">
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
