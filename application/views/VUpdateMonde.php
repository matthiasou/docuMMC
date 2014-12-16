<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 15/12/14
 * Time: 00:15
 */

echo $script_foot;?>
<form id="frmUpdateMonde" name="frmUpdateMonde" class="updateMonde">
    <fieldset>
        <legend>Modification Monde </legend>
        <label for="Libelle">Libelle : </label><?php echo "<input type='text' id='Libelle' name='libelle' value='".$mondes->getLibelle()."'><br>"?>
        <hr>
        <?php echo "<input type='button' value='modifier' id='btUpdateMonde".$mondes->getId()."' class='btUpdateMonde'> ";?>
        <input type="button" value="fermer" id="btFermerMonde" class="btFermerMonde">
        <div id = "messageUpdateMonde"></div>
    </fieldset>
</form>
