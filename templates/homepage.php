<?php

use Application\Model\Post\PostRepository;

$title = "Le blog de Lewis"; ?>

<?php ob_start(); ?>
<h1>Le super blog de Lewis !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php

require_once('src/model/post.php');

function homepage()
{
    $postRepository = new PostRepository();
    $posts = $postRepository->getPosts();

    require('templates/homepage.php');
}
?>
<?php require('layout.php') ?>