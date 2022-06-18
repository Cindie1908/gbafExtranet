<?php $user=$this->getUser(); ?>
<?php 
ob_start(); 
?>    
    
    
    <div class="home" >
        <h1 class="homeUser">Bienvenue <?php echo $user->getPrenom(); ?> <?php echo $user->getNom(); ?></h1>
        <a class="visit" href="?page=actors::viewActors">Visiter le site</a>

    </div>
<?php
$content = ob_get_clean();
$titre = "Home";
require "template.php";
?>




