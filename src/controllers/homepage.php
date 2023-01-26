<?php

require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;

function callHomepage(bool $show_all = false)
{

	$postRepository = new PostRepository();
	$postRepository->connection = new DatabaseConnection();
	$posts = $show_all ? $postRepository->getPosts(true): $postRepository->getPosts();
	require('templates/homepage.php');
}