<?php
    if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        
        require('views/suppr-commentaire.phtml');
    }
?>