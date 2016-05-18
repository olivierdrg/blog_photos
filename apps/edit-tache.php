<?php
    if ( isset( $_GET['id'] ) ) $id = $_GET['id'];
    
    $filename = "taches.json";

    $data = file_get_contents( $filename );

    $taches = json_decode( $data, true );

    if ( $id != 'new' ) {
        foreach ( $taches[$id] as $key => $value) {
            $form[$key]['value'] = $value;
        }
    }

    $option_priority = array_fill( 0, 4, '' );

    $option_priority[$form['priorite']['value']] = 'selected';

    require('views/edit-tache.phtml');
?>