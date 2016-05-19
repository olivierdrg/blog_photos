<?php
    if ( isset( $_SESSION['login'] ) && $_SESSION['login'] != '' )
        require('views/edit-commentaire.phtml');
?>