<?php
    /**
    * Order taches
    *
    * @param array $taches
    * @param string $order
    * @param string $prder_by
    *
    * @return array $new_taches
    */
    function order( $taches, $order, $order_by ) {
        $new_index = array();
        $new_taches = array();

        foreach ( $taches as $key => $tache ) {
            $new_index[] = $tache[$order];
        }
        
        if ( $order_by == 'asc' )
            asort( $new_index );
        else
            arsort( $new_index );

        
        foreach ( $new_index as $key => $value) {
            $new_taches[] = $taches[$key];
        }

        return $new_taches;
    }

    $filename = "taches.json";
    $data = file_get_contents( $filename );
    $taches = json_decode( $data, true );

    $taches = order( $taches, $order, $order_by );

    $i = 0;
    $count = count( $taches );
    
    while( $i <  $count ) {
        $tache = $taches[$i];
        require('views/tache.phtml');

        $i++;
    }

?>