<?php 
ob_start(); 
?>    
    
    
    <div class="home" >
        <h1 class="homeUser">Bienvenue <?php echo $_SESSION['prénom']; ?> <?php echo $_SESSION['nom']; ?></h1>
        <a class="visit" href="?page=actors::viewActors">Visiter le site</a>

    </div>
<?php
$content = ob_get_clean();
$titre = "Home";
require "template.php";
?>




