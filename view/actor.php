<?php

require("model/query.php");

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $actor = getActor($_GET['id']);
    $comments = getComments($_GET['id']);
    require("description.php");
}
else {
    echo 'Erreur : pas de commentaires';
}