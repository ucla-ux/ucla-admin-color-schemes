<?php
/**
 * Plugin Name: UCLA Admin Custom Color Schemes
 * Plugin URI: https://github.com/ucla-ux/ucla-admin-color-schemes
 * Description: Uses UCLA branding colors for WordPress admin color schemes
 * Version: 1.0
 * Requires PHP: 5.3
 * Author: Scott Gruber
 * Author URI: https://github.com/scottgruber
 * Domain Path: /languages
 */

/*
Copyright 2020 Kelly Dwan, Mel Choyce, Dave Whitley, Kate Whitley
https://wpsmackdown.com/create-custom-wordpress-admin-color-scheme/

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

namespace Custom_Color_Schemes;
use function add_action;
use function wp_admin_css_color;

const VERSION = '1.0';

/**
 * Helper function to get stylesheet URL.
 *
 * @param string $color The folder name for this color scheme.
 */
function get_color_url( $color ) {
	$suffix = is_rtl() ? '-rtl' : '';
	return plugins_url( "$color/colors$suffix.css?v=" . VERSION, __FILE__ );
}

/**
 * Register color schemes.
 */
function add_colors() {

	wp_admin_css_color(
		'ucla-light-theme',
		__( 'UCLA Light Theme', 'admin_schemes' ),
		get_color_url( 'ucla-light-theme' ),
		array( '#2774ae', '#003b5c', '#ffd100', '#f1f3f3' ),
		array(
			'base' => '#003b5c',
			'focus' => '#0079bf',
			'current' => '#ffd100',
		)
	);

	wp_admin_css_color(
		'ucla-dark-theme',
		__( 'UCLA Dark Theme', 'admin_schemes' ),
		get_color_url( 'ucla-dark-theme' ),
		array( '#003b5c', '#2774ae', '#ffd100', '#f1f3f3' ),
		array(
			'base' => '#f1f3f3',
			'focus' => '#fff',
			'current' => '#fff',
		)
	);

}

add_action( 'admin_init', __NAMESPACE__ . '\add_colors' );
