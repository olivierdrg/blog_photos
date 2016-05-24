<?php
	if ( isset( $_GET['id'] ) ) {
		$id = $_GET['id'];

	    $query = 'SELECT * FROM commentaires WHERE id_commentaires = ' . $id;

	    $res = mysqli_query( $link, $query );

	    $ligne = mysqli_fetch_assoc( $res ); 
	    require('views/edit-commentaire.phtml');
	    
	}

?>