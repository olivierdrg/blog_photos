<?php
    if ( isset( $_SESSION['login'] ) && $_SESSION['login'] != '' )
        require('views/articles.phtml');
?>