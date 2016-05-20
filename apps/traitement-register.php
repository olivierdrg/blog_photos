<?php
    /**
    * Register new user.
    *
    * @param array $form
    *
    */
    function register_user( $form, $link ) {

        unset( $form['success'] );
        unset( $form['message'] );
        unset( $form['confirm-password'] );
        $form['date']['value'] = date('Y-m-d H:m:i');
        $form['password']['value'] = password_hash( $form['password']['value'], PASSWORD_BCRYPT, array("cost"=>8) );

        foreach ( $form as $key => $value ) {
            $sql_into[] = $key;
            $sql_value[] =  '\'' . $value['value'] . '\'';
        }

        $sql_into   = implode( ',', $sql_into );
        $sql_value  = implode( ',', $sql_value );

        $query = 'INSERT INTO admins (' . $sql_into . ') VALUES (' . $sql_value . ')';
        // var_dump( $query );
        $res = mysqli_query( $link, $query );
    }
    
    $form = array(
        'success'   => true,
        'message'   => '',
        'login' => array(
            'value' => '',
            'class' => '',
        ),
        'email' => array(
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

        if ( strlen( $form['login']['value'] ) < 3 ) {
            $form['success'] = false;
            $form['login']['class']  = 'error';
        }

        if ( !filter_var( $form['email']['value'], FILTER_VALIDATE_EMAIL ) ) {
            $form['success'] = false;
            $form['email']['class']  = 'error';
        }

        if ( strlen( $form['password']['value'] ) < 3 ) {
            $form['success'] = false;
            $form['password']['class']  = 'error';
        }

        if ( strlen( $form['confirm-password']['value'] ) < 3 ) {
            $form['success'] = false;
            $form['confirm-password']['class']  = 'error';
        }    

        if ( $form['password']['value'] != $form['confirm-password']['value'] ) {
            $form['success'] = false;
            $form['password']['class']  = 'error';
            $form['confirm-password']['class']  = 'error';
        }  

        if ( $form['success'] ) {

            register_user( $form, $link );

            header('Location: index.php?page=login');
            exit;            

        } else {
            $form['message'] = 'Register Error';
        }

    }
?>