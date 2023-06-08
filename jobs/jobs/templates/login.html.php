<main class="home">
	<?php if (isset($error)):?>
		<div class="errors"><?=$error;?></div>
	<?php endif; ?>
	<form method="POST" action="">
		<label for="email">Email address</label>
		<input type="text" id="email" name="email">

		<label for="password">Password</label>
		<input type="password" id="password" name="password">

		<input type="submit" name="login" value="Log in">



	</form>
</main>