<?php
    $serveur     = 'localhost';
    $username    = 'root'; 
    $password    = 'troiswa';
    $database    = 'blog_photos';

    $mysqli = new mysqli( $serveur, $username, $password, $database );
    if ($mysqli->connect_errno) {
        //echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $res = $mysqli->query('SELECT * FROM admins');
    $res->data_seek(0);

    var_dump( $res );

    while ( $row = $res->fetch_assoc() ) {
        var_dump( $row );
    }
?>