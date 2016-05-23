<?php

if (!isset($_SESSION['login']))
{
	header('Location: ?page=login');
	exit;
}


if (isset($_POST['id_articles'], $_POST['id_admins'], $_POST['descriptif']))
{

	$success = true;
	$id_articles = $_POST['id_articles'];
	$id_admins = $_POST['id_admins'];
	$descriptif = $_POST['descriptif'];

	if(strlen($descriptif) == 0)
		$success = false;
		
		if ($success){

			$ladate = date('Y-m-d H:m:i');
			$query = "INSERT INTO commentaires (id_articles, id_admins, `date`, descriptif) VALUES ('" . $id_articles . "','" . $id_admins . "','" .  $ladate . "','" . $descriptif . "')";
			
			$res = mysqli_query( $link, $query);
			header('Location: ?page=detail-article&id='.$id_articles);
			exit;
	}
	else
		$error = 'Vous devez vous connecter pour modifier votre commentaire.';
}
?>