<?php
/**
 * Navigation Functions
 *
 * @package Bulmapress
 */

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'menu-1' => esc_html__( 'Studio', 'littlepool' ),
	) );

register_nav_menus( array(
	'menu-2' => esc_html__( 'Label/Shop', 'littlepool' ),
	) );

register_nav_menus( array(
	'menu-2' => esc_html__( 'Label/Shop', 'littlepool' ),
	) );

function main_navigation()
{
	wp_nav_menu( array(
		 	'theme_location'    => 'menu-1',
      'depth'             => 2,
      'container'         => false,
      // 'items_wrap'        => 'div',
      'menu_class'        => 'navbar-start',
      'menu_id'           => 'studio',
      'after'             => "</div>",
			'walker'            => new bulma_navwalker()
		)
	);
}

function shop_navigation()
{
	wp_nav_menu( array(
		 	'theme_location'    => 'menu-2',
      'depth'             => 2,
      'container'         => false,
      // 'items_wrap'        => 'div',
      'menu_class'        => 'navbar-start',
      'menu_id'           => 'studio',
      'after'             => "</div>",
			'walker'            => new bulma_navwalker()
		)
	);
}


function social_navigation()
{
	wp_nav_menu( array(
		 	'theme_location'    => 'menu-3',
      'depth'             => 1,
      'container'         => false,

      'menu_class'        => 'field is-grouped',
      'menu_id'           => 'social',
      'after'             => "</div>",
			'walker'            => new bulma_navwalker_social()
		)
	);
}
