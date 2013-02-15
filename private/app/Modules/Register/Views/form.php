<?php if(!empty($error)): ?>
	<div class="alert error">
		<?php echo $error; ?>
	</div>
<?php endif; ?>
<form action="" method="post">

	<label>Entrer une adresse mail ou un pseudo : </label>
	<input type="text" name="login" placeholder="Email ou pseudo" /> <br/>

	<label>Entrer un mot de passe : </label>
	<input type="password" name="pass" placeholder="Mot de passe" /><br/>


	<input type="submit" value="S'inscrire !" /> 
</form>