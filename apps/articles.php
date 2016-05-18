<?php
    // Get user order when display tache.
    $order = 'priorite';

    if ( isset( $_GET['order']) ) $order = $_GET['order'];

    $option_order = array_fill( 0, 3, '' );

    if ( $order == 'priorite') $option_order[0] = 'selected';
    if ( $order == 'date-crea') $option_order[1] = 'selected';
    if ( $order == 'date-rea') $option_order[2] = 'selected';
    
    // Get user order_by when display tache.
    $order_by = 'asc';

    if ( isset( $_GET['order-by']) ) $order_by = $_GET['order-by'];

    $option_order_by = array_fill( 0, 2, '' );

    if ( $order_by == 'asc') $option_order_by[0] = 'selected';
    if ( $order_by == 'desc') $option_order_by[1] = 'selected';

    require('views/articles.phtml');
?>