<?php $title = 'Connect to Admin Dashboard'; ?>

<?php ob_start(); ?>
<p>Etes-vous Admin?</p>
<h1>Please connect to go to Admin dashboard!</h1>

<form action="index.php?action=connectAdmin" method="post">
        <input type="email" placeholder="your email" name="email"><br/>
        <input type="password" placeholder="password" name="pass"><br/>
        <input type="submit" value="Log in" name="submit">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>