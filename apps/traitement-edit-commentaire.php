<?php

if (!isset($_SESSION['login']))
{
	header('Location: ?page=login');
	exit;
}


if ( isset( $_POST['descriptif'] ) ) {

	$success = true;
	$descriptif =  $_POST['descriptif'];
	$id_commentaires =  $_POST['id_commentaires'];

	if ( strlen( $descriptif ) == 0 ) {
		$success = false;
	}
		
	if ( $success ) {

			$descriptif = mysqli_real_escape_string( $link, $descriptif );

			$query = 'UPDATE commentaires SET descriptif = \'' . $descriptif . '\' WHERE id_commentaires = ' . $id_commentaires;
			

			$res = mysqli_query( $link, $query);
			header('Location: ?page=articles');
			exit;
	}
	else
		$error = 'Vous devez vous connecter pour modifier votre commentaire.';
}
?>