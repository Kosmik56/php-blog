<?php

namespace App\Repository;

use PDO;
use App\Service\DatabaseConnection;
use App\Model\Post;
use Exception;

class PostRepository extends AbstractRepository
{
    public function getPost(string $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, chapo, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date 
            FROM posts 
            WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false){
            throw new Exception('Enregistrement introuvable');
        }
        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->chapo = $row['chapo'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];

        return $post;
    }

    public function getPosts(bool $getAllPosts = false): array
    {
        $query = "SELECT id, title, chapo, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY created_at DESC";
        $query = $getAllPosts ? $query : $query . ' LIMIT 0, 5';

        $statement = $this->connection->getConnection()->query($query);

        $posts = [];
        while (($row = $statement->fetch())) {
            if ($row === false){
                throw new Exception('Enregistrement introuvable');
            }
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->chapo = $row['chapo'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];

            $posts[] = $post;
        }

        return $posts;
    }

    public function create(array $data): int
    {
        $statement = $this->connection->getConnection()->prepare("INSERT INTO posts(title, chapo, content) VALUES (:title, :chapo, :content)");

        $statement->execute([
            'title' => $data['title'],
            'chapo' => $data['chapo'],
            'content' => $data['post_body'],
        ]);

        $postId = $this->connection->getConnection()->lastInsertId();

        return $postId;
    }
}
