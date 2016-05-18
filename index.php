<?php    
    function get_login_info() {
        if ( isset( $_SESSION['login'] ) ) {
            $login_info = array(
                'message'   => 'Bonjour ' . $_SESSION['login'],
                'icon'      => 'out', 
                'page'      => 'logout',
            );
        } else {
            $login_info = array(
                'message'   => 'unregistred',
                'icon'      => 'in', 
                'page'      => 'login',
            );            
        }

        return $login_info;
    }

    session_start();

    define( 'LIB', 'public/' );
    define( 'IMAGE_PATH', LIB . 'images/' );
    define( 'CSS_PATH', LIB . 'css/' );
    define( 'JS_PATH', LIB . 'js/' );
    
    $page = 'home';
    
    $access = array(
        'home',
        'taches',
        'list-taches',
        'edit-tache',
        'supp-tache',
        'dupli-tache',
        'login',
        'register',
        'logout',

    );

    $access_traitement = array(
        'login',
        'register',
        'edit-tache',
        'supp-tache',
        'dupli-tache',
        'logout',
    );   

    if ( isset( $_GET['page'] ) ) {
        if ( in_array( $_GET['page'], $access ) ) {
            $page = $_GET['page'];
        }
    }

    if ( in_array( $page, $access_traitement ) ) {
        require("apps/traitement-" . $page . ".php");
    }

    $login_info = get_login_info();

    require('apps/skel.php');



?>