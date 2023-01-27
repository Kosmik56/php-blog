<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Service\DatabaseConnection;

class PostController
{
    private PostRepository $postRepository;
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
    }

    public function show(string $identifier)
    {
        $post = $this->postRepository->getPost($identifier);
        $comments = $this->commentRepository->getByPost($post);

        require('templates/post.php');
    }

    public function form() {
        require_once('templates/blank_post.php');
    }

    public function create() {
        $postId = $this->postRepository->create($_POST);
        header('location: index.php?action=post&id=' . $postId);
    }
}