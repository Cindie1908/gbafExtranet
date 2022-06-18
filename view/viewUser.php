<?php $user=$this->getUser(); ?>
<nav>
    <ul>
        <li class="déroulant">
            <a href="#">
                <div class="headername" >
                    <img class="logo-profile" alt="logo user" src="./Images/profile-user.png" )>
                    <p><?php echo $user->getNom(); ?> <?php echo $user->getPrenom(); ?></p>
                </div>
            </a>
                <ul class="sous">
                    <li><a href="?page=users::parameter">Mon compte</a></li>
                    <li><a href="?page=users::deconnect">Se déconnecter</a></li>
                </ul>
        </li>
    </ul>
</nav>




