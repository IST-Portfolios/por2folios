<?php
/*
Plugin Name: Nav Menu Roles Toggle
Plugin URI: https://gist.github.com/helgatheviking/d00f9c033a4b0aab0f69cf50d7dcd89c
Description: Give NMR priority over any competing Walkers
Version: 0.1.0
Author: helgatheviking
Author URI: http://kathyisawesome.com

*/

function kia_force_nmr_filter( $walker ){
	if( function_exists( 'Nav_Menu_Roles' ) ){
		$walker = 'Walker_Nav_Menu_Edit_Roles';
	}
	return $walker;
}
add_filter( 'wp_edit_nav_menu_walker', 'kia_force_nmr_filter', 999999 );