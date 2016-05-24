<?php

	if ( isset( $_POST['confirme'], $_POST['id'] ) ) {
		$confirme = $_POST['confirme'];
		$id_articles = $_POST['id'];

		if ( $confirme == 'yes' ) {
			$query = 'DELETE FROM articles WHERE id_articles = ' . $id_articles;

        	$res = mysqli_query( $link, $query );

		}

	    header('Location: index.php?page=admin');
        exit; 
	}

?>