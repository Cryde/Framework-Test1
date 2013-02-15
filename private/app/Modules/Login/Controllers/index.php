<?php

$error = "";
if(!empty($_POST)){

	if( !empty($_POST['login']) && !empty($_POST['pass']) ){

		/* On charge le modele */
		loadModel('users.php', 'users');
	
		$infoMembre = checkLogin($_POST['login'], hash_str($_POST['pass']));
		if(!empty($infoMembre)){

			echo 'ok !';
			
			$_SESSION['id_membre'] = $infoMembre['id'];
			$_SESSION['login'] = $infoMembre['login'];
			$_SESSION['role'] = $infoMembre['role'];
			
			redirect('index.php?page=panel');
		}
		else{
			$error = 'La combinaison login/password est incorrecte';
		}
	}
	else{
		$error = 'Un des champs est vide!';
	}
}


/* On affiche le formulaire */
render('form.php', array(
	'error' => $error
));
