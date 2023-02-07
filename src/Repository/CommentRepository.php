<?php

namespace App\Repository;

use App\Model\Comment;
use App\Model\Post;

class CommentRepository extends AbstractRepository
{
    public function create(string $post, string $comment, int $userId)
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(post_id, comment, user_id) VALUES(?, ?, ?)'
        );
        return $statement->execute([$post, $comment, $userId]);
    }

    public function getByPost(Post $post): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT comments.id, comment, name, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date
        FROM `comments` 
        INNER JOIN `users` ON comments.user_id = users.id 
        WHERE post_id = ?
        ORDER BY created_at DESC"
        );
        $statement->execute([$post->identifier]);

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
}
