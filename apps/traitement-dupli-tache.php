<?php

	if ( isset( $_POST['confirme'], $_POST['id'] ) ) {
		$confirme = $_POST['confirme'];
		$id = $_POST['id'];

		if ( $confirme == 'yes' ) {
		    $filename = "taches.json";

		    $data = file_get_contents( $filename );
		    $taches = json_decode( $data, true );

		    $taches[] = $taches[$id];

		    $data = json_encode( $taches );
		    file_put_contents( $filename, $data );

		}

	    header('Location: index.php?page=list-taches');
        exit; 
	}

?>