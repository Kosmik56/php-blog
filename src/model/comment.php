<?php

class Comment
{
    public string $name;
    public string $frenchCreationDate;
    public string $comment;
}

function getComments(string $postId): array
{
    $database = commentDbConnect();
    $statement = $database->prepare(
        "SELECT comments.id, comment, name, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date
        FROM `comments` 
        INNER JOIN `users` ON comments.user_id = users.id 
        WHERE post_id = ?
        ORDER BY created_at DESC"
    );
    $statement->execute([$postId]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = new Comment();
        $comment->name = $row['name'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];

        $comments[] = $comment;
    }

    return $comments;
}

function createComment(string $post, string $comment, int $userId)
{
    $database = commentDbConnect();
    $statement = $database->prepare(
        'INSERT INTO comments(post_id, comment, user_id) VALUES(?, ?, ?)'
    );
    return $statement->execute([$post, $comment, $userId]);
}
 
function commentDbConnect()
{   
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', '');
    return $database;
}

