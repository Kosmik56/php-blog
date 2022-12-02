<?php

use Application\Model\Post\PostRepository;

$title = "Le blog de Lewis"; ?>

<?php ob_start(); ?>
<h1>Le super blog de Lewis !</h1>
<?php  if (!isset($_SESSION['user'])) echo "<a href='index.php?action=login'>Login</a>";
    else echo '<a href="index.php?action=logout">Log out</a><div> "bonjour' . $_SESSION['name'] . '!" </div>';
?>

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
require('layout.php') ?>