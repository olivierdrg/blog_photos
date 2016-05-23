<?php
    $query = 'SELECT commentaires.id_commentaires, commentaires.id_articles, commentaires.`date`, commentaires.id_admins, commentaires.descriptif, admins.login, admins.role FROM commentaires LEFT JOIN admins ON commentaires.id_admins = admins.id_admins WHERE commentaires.id_articles = ' . $id_articles;
    
    $res = mysqli_query( $link, $query );

    while ( $commentaires = mysqli_fetch_assoc( $res )  ){
        require htmlentities('views/commentaire.phtml');
    }  
?>