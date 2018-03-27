<?php $title = 'Blog'; ?>

<?php ob_start(); ?>
<h1>Welcome to the blog !</h1>
<p>Tous les posts</p>

<nav>
    <p>Hello <?= $_SESSION['prenom'] ?></p>
    
    <ul>
        <li>Update my profile</li>
        <li>See my posts</li>
        <li>Add post</li>
        <li>Disconnect</li>
    </ul>
</nav>

<div id="allPosts">
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>