<?php
    $nav_menu = array(
        'article' => array(
            'page'      => 'article',
            'name'      => 'Article',
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