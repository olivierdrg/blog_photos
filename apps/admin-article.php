<?php
    $query = 'SELECT articles.*, COUNT(commentaires.id_commentaires) AS nb_commentaires FROM articles LEFT JOIN commentaires ON articles.id_articles = commentaires.id_articles GROUP BY articles.id_articles';
    //$query = 'SELECT * FROM articles';
    $res = mysqli_query( $link, $query );

    while ( $ligne = mysqli_fetch_assoc( $res ) ) {
        require('views/admin-article.phtml');
    }

?>