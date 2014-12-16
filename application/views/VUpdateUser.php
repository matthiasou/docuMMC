<?php echo $script_foot;?>
<form id="frmUpdateUser" name="frmUpdateUser" class="updateUser">
    <fieldset>
        <legend>Informations utilisateur </legend>
        <label for="nom">Nom : </label><?php echo "<input type='text' id='nom' name='nom' value='".$utilisateurs->getNom()."'><br>"?>
        <label for="prenom">Prénom : </label><?php echo "<input type='text' id='prenom' name='prenom' value='".$utilisateurs->getPrenom()."'><br>"?>
        <label for="mail">Mail : </label><?php echo "<input type='text' id='mail' name='mail' value='".$utilisateurs->getMail()."'><br>"?>
        <label for="login">Login : </label><?php echo "<input type='text' id='login' name='login' value='".$utilisateurs->getPassword()."'><br>"?>
        <label for="password">Password : </label><?php echo "<input type='text' id='password' name='password' value='".$utilisateurs->getPassword()."'><br>"?>
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
        <?php echo "<input type='button' value='modifier' id='btUpdateUser".$utilisateurs->getId()."' class='btUpdateUser'> ";?>
        <input type="button" value="fermer" id="btFermerUser" class="btFermerUser">
        <div id = "messageUpdateUser"></div>
    </fieldset>
</form>
<script >

/*
    $(document).ready(function(){
        $("#btFermerUser").click(function () {
            $("#frmUpdateUser").slideToggle("speed");
        });
    });


</script>
