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
    require('config.php');

    $link = mysqli_connect( $serveur ,$username, $password, $database);
    if ( !$link ) {
        require('views/bigerror.phtml');
        exit;
    }

    define( 'LIB', 'public/' );
    define( 'IMAGE_PATH', LIB . 'images/' );
    define( 'CSS_PATH', LIB . 'css/' );
    define( 'JS_PATH', LIB . 'js/' );
    
    $page = 'articles';
    
    $access = array(
        'articles', 
        'detail-article',        
        'contact',
        'login',
        'register',
        'logout',
        'admin',
        'creer-article',
        'edit-article',
        'suppr-article',
        'creer-commentaire',
        'suppr-commentaire',     
        'edit-commentaire',
        'admin-commentaires',
    );

    $access_traitement = array(      
        'login',
        'register',
        'logout',
        'contact',
        'creer-article',
        'edit-article',
        'suppr-article',
        'creer-commentaire',
        'edit-commentaire',
        'suppr-commentaire',         
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