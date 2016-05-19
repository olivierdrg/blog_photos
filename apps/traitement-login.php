<?php
    /**
    * Verify if user have a ccount.
    *
    * @param array $form
    *
    */
    function verify_user( $form, $link ) {
        $error          = true;/** Pascal : Stockez plutôt une variable $success que $error, c'est plus logique dans la suite du code **/
        $user_login     = $form['login']['value'];
        $user_password  = $form['password']['value'];

        $query = 'SELECT login, password, role FROM admins';/** Pascal : Rajoutez une condition pour récupérer directement le bon user s'il existe **/
        /** Pascal : SELECT login, password, role FROM admins WHERE login=$user_login **/
        $res = mysqli_query( $link, $query );


        while ( $ligne = mysqli_fetch_assoc( $res )  ){

            if ( $ligne['login'] == $user_login  && $ligne['password'] == $user_password ) {
                $error = false;
                $_SESSION['login']  = $user_login;
                $_SESSION['role']   = $ligne['role'];
            }

        }

        return $error;        
    }

    $form = array(
        'error'     => false,
        'message'   => '',
        'login' => array(
            'value' => '',
            'class' => '',
        ),
        'password' => array(
            'value' => '',
            'class' => '',
        ),        
    );

    if ( isset( $_POST['form'] ) ) {

        $post = $_POST['form'];

        foreach ( $_POST['form'] as $key => $value) {
            $form[$key]['value'] = $value;
        }

        if ( strlen( $form['login']['value'] ) == 0 ) {
            $form['error'] = true;            
        }

        if ( strlen( $form['password']['value'] ) == 0 ) {
            $form['error'] = true;            
        }

        $form['error'] = verify_user( $form, $link );

        if ( !$form['error'] ) {

            header('Location: index.php?page=home');
            exit;            

        } else {
            $form['message'] = 'Login Error';
            $form['login']['class']  = 'error';
            $form['password']['class']  = 'error';
        }

    }
?>