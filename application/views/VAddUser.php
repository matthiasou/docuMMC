
<?php echo $script_foot;?>
<form id="frmAddUser" name="frmAddUser" class="addUser">
    <fieldset>
        <legend>Création utilisateur:</legend>
        <label for="nom">Nom : </label><input type="text" id="nom" name="nom"><br>
        <label for="prenom">Prénom : </label><input type="text" id="prenom" name="prenom"><br>
        <label for="mail">Mail : </label><input type="text" id="mail" name="mail"><br>
        <label for="login">Login : </label><input type="text" id="login" name="login"><br>
        <label for="password">Password : </label><input type="password" id="password" name="password"><br>
        <label for="monde_id">Monde : </label>
        <select id="monde_id" name="monde_id">
            <?php
            foreach ($monde as $monde){
                echo "<option class='element' id='element".$monde->getId()."' value='".$monde->getId()."'>".$monde->getLibelle()."</option>";
            }
            ?>
        </select><br>
        <label for="groupe_id">Groupe : </label>
        <select id="groupe_id" name="groupe_id">
            <?php
            foreach ($groupe as $groupe){
                echo "<option class='element' id='element".$groupe->getId()."' value='".$groupe->getId()."'>".$groupe->getLibelle()."</option>";
            }
            ?>
        </select><br>
        <hr>
        <input type="button" value="Valider" id="btUser" class="btUser">
        <input type="button" value="fermer" id="btFermer" class="btFermer">
        <div id = "message"></div>
    </fieldset>
</form>

