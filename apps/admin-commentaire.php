<?php
	if ( isset( $_GET['id'] ) ) {
		$id = $_GET['id'];

	    $query = 'SELECT * FROM commentaires WHERE id_articles = ' . $id;
	    $res = mysqli_query( $link, $query );

	    while ( $ligne = mysqli_fetch_assoc( $res ) ) {
	        require('views/admin-commentaire.phtml');
	    }		
		
	}
?>