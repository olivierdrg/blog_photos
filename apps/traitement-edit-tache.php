<?php
    /**
    * Add new tache.
    *
    * @param array $form
    *
    */ 
    function add_form( $form ) {
        $filename = "taches.json";

        $id = $form['id'];
        unset( $form['id'] );
        unset( $form['error'] );
        unset( $form['message'] );

        foreach ( $form as $key => $value ) {
            $tache[$key] = $value['value'];
        }

        $data = file_get_contents( $filename );
        $taches = json_decode( $data, true );

        if ( $id == "new" ) {
            $taches[] = $tache;
        } else {
            $taches[$id] = $tache;
        }

        $data = json_encode( $taches );
        file_put_contents( $filename, $data );

    }
    
    $form = array(
        'error'     => false,
        'message'   => '',
        'id'        => '',
        'titre' => array(
            'value' => '',
            'class' => '',
        ),
        'description' => array(
            'value' => '',
            'class' => '',
        ),
        'priorite' => array(
            'value' => '',
            'class' => '',
        ),
        'date-crea' => array(
            'value' => date("m/d/Y"),
            'class' => '',
        ),        
        'date-rea' => array(
            'value' => date("m/d/Y"),
            'class' => '',
        ),  
        'commentaire' => array(
            'value' => '',
            'class' => '',
        ),        

    );

    if ( isset( $_POST['form'] ) ) {

        $form['id'] = $_POST['form']['id'];
        unset( $_POST['form']['id'] );

        foreach ( $_POST['form'] as $key => $value) {
            $form[$key]['value']  = $value;
        }

        if ( strlen( $form['titre']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['titre']['class']  = 'error';
        }

        if ( strlen( $form['description']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['description']['class']  = 'error';
        }


        if ( strlen( $form['commentaire']['value'] ) < 3 ) {
            $form['error'] = true;
            $form['commentaire']['class']  = 'error';
        }

        if ( !$form['error'] ) {
            
            add_form( $form );

            header('Location: index.php?page=list-taches');
            exit;            

        } else {
            $form['message'] = 'Create News Error';
        }

    }
?>