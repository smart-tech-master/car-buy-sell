<?php 

	/*---------------------------Width -------------------*/

	$beauty_salon_spa_custom_style= "";
	
	$beauty_salon_spa_theme_width = get_theme_mod( 'beauty_salon_spa_width_options','full_width');

    if($beauty_salon_spa_theme_width == 'full_width'){

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='max-width: 100%;';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_theme_width == 'Container'){

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_theme_width == 'container_fluid'){

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$beauty_salon_spa_custom_style .='}';
	}

	//---------------------------------------------------------------------------------------------

	$beauty_salon_spa_sticky_header = get_theme_mod('beauty_salon_spa_sticky_header');

	if($beauty_salon_spa_sticky_header != true){

		$beauty_salon_spa_custom_style .='.menu_header.fixed{';

			$beauty_salon_spa_custom_style .='position: static;';
			
		$beauty_salon_spa_custom_style .='}';
	}

	//---------------------------------------------------------------------------------

	$beauty_salon_spa_logo_max_height = get_theme_mod('beauty_salon_spa_logo_max_height');

	if($beauty_salon_spa_logo_max_height != false){

		$beauty_salon_spa_custom_style .='.custom-logo-link img{';

			$beauty_salon_spa_custom_style .='max-height: '.esc_html($beauty_salon_spa_logo_max_height).'px;';
			
		$beauty_salon_spa_custom_style .='}';
	}