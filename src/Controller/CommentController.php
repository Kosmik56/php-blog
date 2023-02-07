<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Exception;

class CommentController
{
    private CommentRepository $commentRepository;

    public function __construct() {
        $this->commentRepository = new CommentRepository;
    }

   public function create(string $post, array $input)
    {
        if (!isset($_SESSION['user'])) {
            throw new Exception("Veuillez vous connecter pour rajouter un commentaire.");
        }

        $comment = null;
        if (!empty($input['comment'])) {
            $comment = $input['comment'];
        } else {
            throw new Exception('Les données du formulaire sont invalides.');
        }
        $success = $this->commentRepository->create($post, $comment, $_SESSION['user']['id']);
        if (!$success) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }
    } 
}