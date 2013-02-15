	<h1>Login</h1>

	<?php if(!empty($error)): ?>
		<div class="alert error">
			<?php echo $error; ?>
		</div>
	<?php endif; ?>

	<form action="" method="post">

		<label>Login : </label><input type="text" name="login" placeholder="Username or Email" /><br/>
		<label>Mot de passe : </label><input type="password" name="pass" placeholder="password" />

		<br/><br/>
		<input type="submit" value="Login">
	</form>
