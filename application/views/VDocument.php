<?php
/**
 * Created by PhpStorm.
 * User: BINET
 * Date: 09/12/2014
 * Time: 15:01
 */

// **** Liste des ressources :
/**
 * Liste des ressources :
 * $doc = tanleau associatif contenant :
 *
 * * titreDoc = titre du document
 * * dateCrea = date de création du document
 *
 * * dateVersion = date de la création de la version
 *
 * * titreP = titre de la partie
 * * contenuP = contenu de la partie
 * * ordreP = placement dans le document
 * * niveauP = niveau de tabulation
 *
 *  DEV :
 * * idDoc = id du document
 * * idV = id de la version
 * * idP = id de la partie
 */
//$docu = $doc[2]->getId();


foreach($document as $data){
    var_dump($data);
}
?>

<table border="1" align="center">
    <tr>
        <th>
            idDoc
        </th>
        <th>
            Titre du document
        </th>
        <th>
            Date de création
        </th>
    </tr>
    <tr>
        <td>
            <?php
            echo $document->getId();
            ?>
        </td>
        <td>
            <?php
            echo $document->getTitre();
            ?>
        </td>
        <td>
            <?php
            echo $document->getDateCreation()->format('Y-m-d H:i:s');
            ?>
        </td>
    </tr>
    <?php

    ?>
</table>

<span id="spanDocument">
    <?php
    echo $document->getDateCreation()->format('Y-m-d H:i:s');
    ?>

</span>
