<?php

namespace App\Service;

use PDO;

class DatabaseConnection
{
	public ?PDO $database = null;

	public function getConnection(): PDO
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', '');
    	}

    	return $this->database;
	}
}