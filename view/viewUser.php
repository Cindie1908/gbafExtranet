<?php
require "view/login.php";
$users = getDatas();
if (isset($_POST['username']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['username'] === $_POST['username'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'username' => $user['username'],
                'nom'=>$user['nom'],
                'prénom'=>$user['prénom'],
            ];
        } else {
            $errorMessage = sprintf('Erreur identifiée : (%s/%s)',
                $_POST['username'],
                $_POST['password']
            );
        }
    }
}



    ?>
    <div class="headername" >
        <img class="logo-profile" alt="logo user" src="./Images/profile-user.png" )>
        <p><!--Nom Prénom--><?php echo $loggedUser['nom']; ?> <?php echo $loggedUser['prénom']; ?></p>
    </div>
    <?php
    
?>



