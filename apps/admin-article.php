<?php
    $query = 'SELECT * FROM articles';
    $res = mysqli_query( $link, $query );

    while ( $ligne = mysqli_fetch_assoc( $res ) ) {
        require('views/admin-article.phtml');
    }

?>