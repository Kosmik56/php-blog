<?php

class Comment
{
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
}

function getComments(string $post): array
{
    $database = commentDbConnect();
    $statement = $database->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );
    $statement->execute([$post]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = new Comment();
        $comment->author = $row['author'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];

        $comments[] = $comment;
    }

    return $comments;
}

function createComment(string $post, string $comment)
{
    $database = commentDbConnect();
    $statement = $database->prepare(
        'INSERT INTO comments(post_id, comment, user_id) VALUES(?, ?, ?)'
    );
    $result = $statement->execute([$post, $comment, $_SESSION['user']['id']]);
    return $result;

}
 
function commentDbConnect()
{   
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', '');
    return $database;
}
