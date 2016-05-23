<?php

if ( isset( $_GET['id'] ) ) {

	$id_articles = $_GET['id'];

	$query = 'SELECT articles.id_articles, articles.date, articles.photo, articles.titre, articles.id_admins, articles.descriptif, admins.login FROM articles LEFT JOIN admins ON articles.id_admins = admins.id_admins WHERE articles.id_articles = ' . $id_articles;
    $res = mysqli_query( $link, $query );

    $ligne = mysqli_fetch_assoc( $res );  

	require htmlentities('views/detail-article.phtml');	
}    
?>