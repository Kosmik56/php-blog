<?php

namespace Application\Model\Post;

use PDO;

require_once('src/lib/database.php');

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
}


class PostRepository
{

    public ?PDO $database = null;

    public \DatabaseConnection $connection;

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
        $query = $getAllPosts ? $query : $query.' LIMIT 0, 5';

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

    public function dbConnect()
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');
        }
    }
}
