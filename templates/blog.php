<?php

$title = "Le blog de Lewis"; ?>

<?php ob_start(); ?>
<h1><a href="index.php">Le super blog de Lewis !</a></h1>
<?php if (!isset($_SESSION['user'])) { ?>
    <a href='index.php?action=login'>Login</a> or <a href='index.php?action=signup'>sign up</a>
<?php } else { ?>
    <a href="index.php?action=logout">Log out</a>
    <div> bonjour <?php $_SESSION['user']; ?> ! </div>

    <?php if ($_SESSION['user']['admin'] == 1) { ?>
        <button><a href="index.php?action=add_content">Add a new post!</a></button>
    <?php } ?>

<?php } ?>

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
<?php require('layout.php'); ?>

<?php if (!isset($_GET['show_all']) || $_GET['show_all'] != 1) { ?>
    <a href="index.php?show_all=1" class="more_posts_link"> Afficher plus</a>
<?php } else { ?>
    <a href="index.php?show_all=0" class="more_posts_link"> Afficher moins</a>
<?php } ?>

<button class="a-propos"><a href="index.php?action=homepage">A propos</a></button>