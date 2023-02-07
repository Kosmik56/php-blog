<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de Lewis !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post->title) ?>
        <em>le <?= $post->frenchCreationDate ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php if (isset($_SESSION['user'])) {?>
<form action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" onkeyup="checkInput()" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" id='submit_button1' style="display: none;"/>
    </div>
</form>
<?php } ?>
<?php
foreach ($comments as $comment) {
?>
    <p><strong><?= htmlspecialchars($comment->name) ?></strong> le <?= $comment->frenchCreationDate ?></p>
    <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

<script>
    function checkInput(){
        let comment =  document.getElementById('comment').value;
        if (!comment) document.getElementById('submit_button1').style.display = 'none';
        else document.getElementById('submit_button1').style.display = 'block';
        }
</script>