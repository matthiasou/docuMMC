<?php
//***** Sommaire affichant le titre de chaque parties les unes à la suite des autres
echo "<fieldset>";
echo "<legend>Sommaire : </legend>";
foreach ($tests as $test) {
    foreach ($test->getLibelle() as $Monde) {
       echo $Monde;
    }
}
echo "</fieldset>";
?>