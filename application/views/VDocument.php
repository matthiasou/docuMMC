
<?php echo $library_src;?>
<?php echo $script_foot;?>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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
            echo "<fieldset id='divdoc". $partie->getId() ."' class='divdoc". $partie->getNiveau() ."'>";
            echo "<legend><img id ='flecheSlide". $partie->getId() ."'class='flecheSlide' src=' " . base_url() . "assets/images/icons/arrow483.png'> " . $partie->getTitre() . "<a href='#' id='btnEdit". $partie->getId() ."' class='btnEdit'><img src=' " . base_url() . "assets/images/icons/32x32/big46.png'></a></legend>";
            echo "<div id='divParCon". $partie->getId() ."'>" . $partie->getContenu() . "</div>";
            echo "</fieldset>";
        }
    }
    ?>
</div>


<a href="#" class="back-to-top" id="back-to-top"><?php echo "<img src=' " . base_url() . "assets/images/icons/arrow.png'/>";?></a>
<script src="jquery.js"></script>
<script>
    jQuery(document).ready(function() {
        var offset = 220;
        var duration = 100;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back-to-top').fadeIn(duration);
            } else {
                jQuery('.back-to-top').fadeOut(duration);
            }
        });

        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });


    $('.flecheSlide').click(function(){
        $(this).addClass('rotated');
    });


</script>
<?php
/*?>
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

