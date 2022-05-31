<?php 

namespace Controller;

class CommentsModalController
{
    public function show()
    {
        $modal = new \Model\Modal();
        $content= realpath(__DIR__.'/../view/viewComments.php');
        require __DIR__.'/../view/template.php';
    }
}