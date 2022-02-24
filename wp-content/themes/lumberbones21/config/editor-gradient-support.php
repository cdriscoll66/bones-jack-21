<?php

add_theme_support(
	'editor-gradient-presets',
	array(
		array(
			'name'     => __( 'Transparent to Black 40', 'tabor' ),
			'gradient' => 'linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%)',
			'slug'     => 'transparent-to-black-40',
		),
        array(
			'name'     => __( 'Transparent to Green', 'tabor' ),
			'gradient' => 'linear-gradient(rgba(255, 255, 255, 0.2) 0%, rgba(153, 229, 197, 0.2) 50%, rgba(0, 190, 111, 0.2) 100%)',
			'slug'     => 'transparent-to-green',
		),
        array(
			'name'     => __( 'Green to Green', 'tabor' ),
			'gradient' => ' linear-gradient(226.38deg, rgba(0, 155, 141, 0.157) 11.89%, rgba(0, 192, 109, 0.11) 100%)',
			'slug'     => 'green-to-green',
		),
        array(
			'name'     => __( 'Green to Transparent', 'tabor' ),
			'gradient' => 'linear-gradient(rgba(0, 190, 111, 0.2) 0%, rgba(153, 229, 197, 0.2) 50%, rgba(255, 255, 255, 0.2) 100%)',
			'slug'     => 'green-to-transparent',
		),
        array(
			'name'     => __( 'Blue to Stone', 'tabor' ),
			'gradient' => 'linear-gradient(129.23deg, rgb(26, 45, 79) 27.89%, rgb(18, 30, 52) 77.04%)',
			'slug'     => 'blue-to-stone',
		),
	)
);
