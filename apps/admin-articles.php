<?php

    if ( isset( $_SESSION['login'] ) ) {

        if ( isset( $_SESSION['role'] ) && $_SESSION['role'] == 'admin' )
            require('views/admin-articles.phtml');
    }

?>