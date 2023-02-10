<?php

namespace App\Controller;

use App\Repository\PostRepository;

class AppController
{
    private PostRepository $postRepository;

    public function __construct() {
        $this->postRepository = new PostRepository;
    }

    public function callBlog(bool $show_all = false)
    {
        $posts = $show_all ? $this->postRepository->getPosts(true) : $this->postRepository->getPosts();
        require('templates/blog.php');
    }

    public function callHomepage(){
        require('templates/homepage.php');
    }
}