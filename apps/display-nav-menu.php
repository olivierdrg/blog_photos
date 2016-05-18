<?php

    if ( !isset( $_SESSION['login'] ) || empty( $_SESSION ) ) {

        unset( $nav_menu['list-taches'] );
    }

    foreach ( $nav_menu as $key => $value ) {
        $nav_menu_page      = $nav_menu[$key]['page'];
        $nav_menu_name      = $nav_menu[$key]['name'];
        $nav_menu_active    = $nav_menu[$key]['active'];
        
        require('views/display-nav-menu.phtml');
        
    }


?>