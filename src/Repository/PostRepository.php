<?php

namespace App\Repository;

use PDO;
use App\Service\DatabaseConnection;
use App\Model\Post;

class PostRepository extends AbstractRepository
{
    public function getPost(string $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date 
            FROM posts 
            WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();

        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];

        return $post;
    }

    public function getPosts(bool $getAllPosts = false): array
    {
        $query = "SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY created_at DESC";
        $query = $getAllPosts ? $query : $query . ' LIMIT 0, 5';

        $statement = $this->connection->getConnection()->query($query);

        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];

            $posts[] = $post;
        }

        return $posts;
    }

    public function create(array $data): int
    {
        $statement = $this->connection->getConnection()->prepare("INSERT INTO posts(title, content) VALUES (:title, :content)");

        $statement->execute([
            'title' => $data['title'],
            'content' => $data['post_body'],
        ]);

        $postId = $this->connection->getConnection()->lastInsertId();

        return $postId;
    }
}
