<?php
$error = '';
if(!empty($_POST)){

	/* On charge le modele */
	loadModel('users.php', 'users');
	if( !empty($_POST['login']) && !empty($_POST['pass']) ){


		if(!existUser($_POST['login'])){

			addUser($_POST['login'], hash_str($_POST['pass']) );
			redirect('./index.php?page=register&action=finish');
		}
		else{
			$error = 'Le nom d\'utilisateur est déjà utilisé';
		}
	}
	else{
		$error = 'Vous avez oublié de completer un champs';
	}
}
render('form.php', array(
		'error' => $error
		)
);