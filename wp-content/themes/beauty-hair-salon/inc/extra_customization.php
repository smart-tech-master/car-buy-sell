<?php 

	$beauty_salon_spa_sticky_header = get_theme_mod('beauty_salon_spa_sticky_header');

	$beauty_salon_spa_custom_style= "";

	if($beauty_salon_spa_sticky_header != true){

		$beauty_salon_spa_custom_style .='.menu_header.fixed{';

			$beauty_salon_spa_custom_style .='position: static;';
			
		$beauty_salon_spa_custom_style .='}';
	}

	$beauty_salon_spa_logo_max_height = get_theme_mod('beauty_salon_spa_logo_max_height');

	if($beauty_salon_spa_logo_max_height != false){

		$beauty_salon_spa_custom_style .='.custom-logo-link img{';

			$beauty_salon_spa_custom_style .='max-height: '.esc_html($beauty_salon_spa_logo_max_height).'px;';
			
		$beauty_salon_spa_custom_style .='}';
	}