<?php

    if ( isset( $_POST['confirme'], $_POST['id'] ) ) {
        $confirme = $_POST['confirme'];
        $id_commentaires = $_POST['id'];

        if ( $confirme == 'yes' ) {
            $query = 'DELETE FROM commentaires WHERE id_commentaires = ' . $id_commentaires;

            $res = mysqli_query( $link, $query );

        }

        header('Location: index.php?page=admin');
        exit; 
    }

?>