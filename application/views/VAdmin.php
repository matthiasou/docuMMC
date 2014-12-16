
<?php echo $library_src;?>
<?php echo $script_foot;?>
<?php
/**
 * Created by PhpStorm.
 * User: matthiaslecomte
 * Date: 09/12/14
 * Time: 19:16
 */
?>
<div id='updateUser' style="float:right;width:20%;" ></div>
<?php
echo " <a class='addUser' href='#'>Ajouter utilisateur</a><br/><br/>";?>
<div id="addUser" style="width:25%;"  >  </div>
<?php
echo " <a class='addMonde' href='#'>Ajouter monde</a><br/><br/>";?>
<div id="addMonde" style="width:10%;" ></div>
<br>

<?php
foreach($mondes as $monde) {
    echo("<h3>".$monde->getLibelle() . " <small><a class='deleteMonde' href='#' id =deleteMonde" . $monde->getId() . ">supprimer </a> &nbsp;  <a class='modifierMonde' href='#' id =modifierMonde" . $monde->getId() . "> modifier </a></small></h3>");
    $query = $this->doctrine->em->createQuery("SELECT u FROM Utilisateur u where u.monde = " . $monde->getId());
    $users = $query->getResult();
    foreach ($users as $user) {
        echo($user->getNom() . "(" . $user->getGroupe()->getLibelle() . ") <a class='delete' href='#' id =delete" . $user->getId() . ">supprimer </a> &nbsp;  <a class='modifier' href='#' id =modifier" . $user->getId() . "> modifier </a><br><br>");
    }
    if($users == null)
    {
        echo"Aucun utilisateur.";
    }

}
?>

<div id='updateMonde' style="float:right;width:20%;" ></div>
