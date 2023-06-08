<main class="home">
	<?php if (!empty($errors)): ?>
		<div class="errors">
			<p>Your account could not be created, please check the following:</p>
			<ul>
			<?php foreach ($errors as $error): ?>
				<li><?= $error ?></li>
			<?php endforeach; 	?>
			</ul>
		</div>
	<?php endif; ?>
	<form action="" method="post">
		<label for="email">Your email address</label>
		<input name="user[email]" type="text" value="<?=$user->email ?? ''?>">
		
		<label for="name">Your first name</label>
		<input name="user[firstname]" type="text" value="<?=$user->firstname ?? ''?>">

		<label for="name">Your last name</label>
		<input name="user[lastname]" type="text" value="<?=$user->lastname ?? ''?>">

		<label for="password">Your password</label>
		<input name="user[password]" type="password" value="<?=$user->password ?? ''?>">
	
		<input type="submit" value="Register account">
	</form>
</main>