<?php
	if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
    
        require('views/dupli-tache.phtml');
    }
?>