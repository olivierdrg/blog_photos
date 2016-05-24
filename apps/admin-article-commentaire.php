<?php
	if ( $ligne['nb_commentaires'] > 0 ) {
		$s = '';
		if ( $ligne['nb_commentaires'] > 1 ) $s = 's';
		require('views/admin-article-commentaire.phtml');
	}
?>