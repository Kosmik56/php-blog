<?php

require_once('src/model/post.php');
require_once('src/lib/database.php');

function add_post_page(){
    require_once('templates/blank_post.php');
}

function add_content()
{
    $database = dbConnect();
    $statement = $database->prepare("INSERT INTO posts(title, content) VALUES (:title, :content)");

    $statement->execute([
        'title'=>$_POST['title'],
        'content'=>$_POST['post_body'],
    ]);
    
    $postId = $database->lastInsertId();

    header('location: index.php?action=post&id=' . $postId);
}
