<?php $title = 'Blog'; ?>

<?php ob_start(); ?>
<div id="userContainer">
    <h1>Welcome to the blog !</h1>

    <button id="SignUp">Sign up</button>

    <form action="index.php?action=signUp" id="formInscription" method="post">
        <div class="titleForm">
            <p>Add a new user</p>
            <p id="fermerAddUserForm">X</p> 
        </div>
            <input type="text" placeholder="your first name" name="prenom"><br/>
            <input type="text" placeholder="your last name" name="nom"><br/>
            <input type="email" placeholder="your email" name="email"><br/>
            <input type="password" placeholder="password" name="pass"><br/>
            <input type="password" placeholder="confirm your password" name="pass-confirm"><br/>
            <input type="submit" value="add" name="submit">
    </form>

    <button id="SignIn">Sign in</button>

    <form action="index.php?action=signIn" method="post" id="formConnection">
        <div class="titleForm">
            <p>Log in</p>
            <p id="fermerConnectForm">X</p> 
        </div>
            <input type="email" placeholder="your email" name="email"><br/>
            <input type="password" placeholder="password" name="pass"><br/>
            <input type="submit" value="Log in" name="submit">
    </form>

    <div id="allPosts">
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('userTemplate.php'); ?>