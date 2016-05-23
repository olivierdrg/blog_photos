<?php
    /**
    * Register new user.
    *
    * @param array $form
    *
    */
    function update_article( $form, $link ) {
    	$id_articles = $form['id_articles']['value'];

        unset( $form['success'] );
        unset( $form['message'] );
        unset( $form['id_articles'] );

        foreach ( $form as $key => $value ) {
            $sql[] = $key . ' = \'' . mysqli_real_escape_string( $link, $value['value'] ) . '\'';
        }

        $sql   = implode( ',', $sql );

        $query = 'UPDATE articles SET ' . $sql . ' WHERE id_articles = ' . $id_articles;

        $res = mysqli_query( $link, $query );
    }
    
    $form = array(
        'success'    	=> true,
        'message'   	=> '',
        'id_articles' => array(
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

            update_article( $form, $link );

            header('Location: index.php?page=admin');
            exit;            

        } else {
            $form['message'] = 'Erreur';
        }

    }
?>