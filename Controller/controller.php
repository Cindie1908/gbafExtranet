<?php

require('model/query.php');

function getActorWithComment()
{
    $actor = getActor($_GET['id_actor']);
    $comments = getComments($_GET['id_actor']);
    return $comments;
    dd($comments);
    //require('view/description.php');
}

function addComment($actorId, $userId, $comment)
{
    $affectedLines = postComment($actorId, $userId, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $actorId);
    }
}