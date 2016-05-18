<?php
    /**
    * Register new user.
    *
    * @param array $form
    *
    */
    function register_user( $form ) {
        $filename = "users.json";

        unset( $form['error'] );
        unset( $form['message'] );
        unset( $form['confirm-password'] );

        foreach ( $form as $key => $value ) {
            $user[$key] = $value['value'];
        }

        $data = file_get_contents( $filename );
        $users = json_decode( $data, true );

        $users[] = $user;

        $data = json_encode( $users );
        file_put_contents( $filename, $data );
        
    }
    
    $form = array(
        'error'     => false,
        'message'   => '',
        'name' => array(
            'value' => '',
            'class' => '',
        ),
        'firstname' => array(
            'value' => '',
            'class' => '',
        ),
        'mail' => array(
            'value' => '',
            'class' => '',
        ),
        'password' => array(
            'value' => '',
            'class' => '',
        ),        
        'confirm-password' => array(
            'value' => '',
            'class' => '',
        ),  

    );

    if ( isset( $_POST['form'] ) ) {

        foreach ( $_POST['form'] as $key => $value) {
            $form[$key]['value']  = $value;
        }

        if ( strlen( $form['name']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['name']['class']  = 'error';
        }

        if ( strlen( $form['firstname']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['firstname']['class']  = 'error';
        }

        if ( !filter_var( $form['mail']['value'], FILTER_VALIDATE_EMAIL ) ) {
            $form['error'] = true;
            $form['mail']['class']  = 'error';
        }

        if ( strlen( $form['password']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['password']['class']  = 'error';
        }

        if ( strlen( $form['confirm-password']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['confirm-password']['class']  = 'error';
        }    

        if ( $form['password']['value'] != $form['confirm-password']['value'] ) {
            $form['error'] = true;
            $form['password']['class']  = 'error';
            $form['confirm-password']['class']  = 'error';
        }  

        if ( !$form['error'] ) {

            register_user( $form );

            header('Location: index.php?page=login');
            exit;            

        } else {
            $form['message'] = 'Register Error';
        }

    }
?>