<?php
    /**
    * Verify if user have a ccount.
    *
    * @param array $form
    *
    */
    function verify_user( $form ) {
        $error          = true;
        $user_login     = $form['login']['value'];
        $user_password  = $form['password']['value'];

        $filename = "users.json";
        $data = file_get_contents( $filename );
        $users = json_decode( $data, true );

        $i = 0;
        $count = count( $users );

        while ( $i < $count ) {
            $user = $users[$i];

            if ( $user['firstname'] == $user_login  && $user['password'] == $user_password ) {
                $error = false;
                $_SESSION['login'] = $user_login;
            }

            $i++;
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

        $form['error'] = verify_user( $form );

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