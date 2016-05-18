<?php
    $nav_menu = array(
        'home' => array(
            'page'      => 'home',
            'name'      => 'Home',
            'active'    => '',
        ),
        'taches' => array(
            'page'      => 'taches',
            'name'      => 'Taches',
            'active'    => '',
        ),
        'list-taches' => array(
            'page'      => 'list-taches',
            'name'      => 'List Taches',
            'active'    => '',
        ),        
        'login' => array(
            'page'      => 'login',
            'name'      => 'Login',
            'active'    => '',
        ),   
        'register' => array(
            'page'      => 'register',
            'name'      => 'Register',
            'active'    => '',
        ),                                     
    );

    if ( array_key_exists( $page, $nav_menu )) {
        $nav_menu[$page]['active'] = 'active';
    }
    
    require('views/header.phtml');
?>