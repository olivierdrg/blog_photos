<?php
    /**
    * Register new user.
    *
    * @param array $form
    *
    */
    function register_article( $form, $link ) {

        unset( $form['success'] );
        unset( $form['message'] );
        unset( $form['confirm-password'] );
        $form['date']['value'] = date('Y-m-d H:m:i');

        foreach ( $form as $key => $value ) {
            $sql_into[] = $key;
            $sql_value[] =  '\'' . $value['value'] . '\'';
        }

        $sql_into   = implode( ',', $sql_into );
        $sql_value  = implode( ',', $sql_value );

        $query = 'INSERT INTO articles (' . $sql_into . ') VALUES (' . $sql_value . ')';

        $res = mysqli_query( $link, $query );
    }
    
    $form = array(
        'success'    => true,
        'message'   => '',
        'date' => array(
            'value' => '',
            'class' => '',
        ),
        'titre' => array(
            'value' => '',
            'class' => '',
        ),
        'photo' => array(
            'value' => '',
            'class' => '',
        ),
        'id_admins' => array(
            'value' => '',
            'class' => '',
        ),        
        'descriptif' => array(
            'value' => '',
            'class' => '',
        ),  

    );

    if ( isset( $_POST['form'] ) ) {

        foreach ( $_POST['form'] as $key => $value) {
            $form[$key]['value']  = $value;
        }

        if ( strlen( $form['titre']['value'] ) < 3 ) {
            $form['success'] = false;
            $form['titre']['class']  = 'error';
        }

        if ( filter_var( $form['photo']['value'], FILTER_VALIDATE_URL ) == false ) {
            $form['success'] = false;
            $form['photo']['class']  = 'error';
        }

        if ( strlen( $form['descriptif']['value'] ) < 3 ) {
            $form['success'] = false;
            $form['descriptif']['class']  = 'error';
        }    


        if ( $form['success'] ) {

            register_article( $form, $link );

            header('Location: index.php?page=login');
            exit;            

        } else {
            $form['message'] = 'Erreur';
        }

    }
?>