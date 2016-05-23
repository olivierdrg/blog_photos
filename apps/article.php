<?php
    $query = 'SELECT articles.id_articles, articles.date, articles.photo, articles.titre, articles.id_admins, articles.descriptif, admins.login FROM articles LEFT JOIN admins ON articles.id_admins = admins.id_admins';

    $res = mysqli_query( $link, $query );

    while ( $ligne = mysqli_fetch_assoc( $res )  ){
        require('views/article.phtml');
    }  
?>