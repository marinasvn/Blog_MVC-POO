<?php $title = 'Admin Dashboard'; ?>

<?php ob_start(); ?>
<div id="adminContainer">
	<nav id="adminNav">
		<div>
			<h1>Welcome to Admin dashboard!</h1>
	    	<p>Hello <?= $_SESSION['prenom'] ?></p>
	    	<a href="index.php?action=logout" class="btn">log out</a>
	    	<a href="index.php" class="btn">go to blog</a>

	    	<ul class="service">
	    		<li id="addPost">Add a post</li>
	    		<li></li>
	    		<li></li>
	    		<li></li>
	    		<li></li>
	    	</ul>

		</div>
	</nav>

	<div id="allPosts">
	    <h2>Voici tous les posts</h1>
	</div>

</div>

	<div class="modals">
		<div id="addPostModal">
			<button id="closeAddPostModal">Close</button>
			<form action="index.php?action=addPost">
				<p class="h3">Add a post</p>
				<input type="text" name="title" placeholder="title"><br/><br/>
				<textarea name="text" placeholder="text of post"></textarea><br/><br/>

				Select image to upload:
				<input type="file" name="imgToUpload" id="imgToUpload"><br/><br/>
					        
				<h3>Categories</h3>
					<?php
					while ($categories = $posts->fetch())
					{
					?>
						<input type='checkbox' name='categorie[]' value='<?= $categories['id_categorie'] ?>'>
						<?= $categories['name_categorie'] ?>
						<br/>

					<?php
					}
					$posts->closeCursor();
					?>
					<br/>
				<input type="submit" name="submit" value="Add post">
			</form>
		</div>

	</div>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>