<?php

    $filename = "taches.json";
    $data = file_get_contents( $filename );
    $taches = json_decode( $data, true );

    $id = 0;
    $i = 0;
    $count = count( $taches );
    
    while( $i <  $count ) {
        $tache = $taches[$i];
        require('views/article.phtml');

        $i++;
    }

?>