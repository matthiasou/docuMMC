<?php echo $library_src;?>
<?php
foreach ($utilisateurs as $user){
    echo ($user->getNom()."(".$user->getGroupe()->getLibelle().") <a class='delete' href='#' id =delete".$user->getId().">supprimer </a><br><br>");
}
?>
<?php echo $script_foot;?>


