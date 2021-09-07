<?php
/**
 * Plugin Name: Product thumbnail gallery for woocommerce
 * Description: Add effect for loop woocommerce product image gallery hover or swap
 * Version: 2.0.0
 * Author: Alexandr Ogorodnikov
 * Text Domain: ogo-ptg
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class/OgoPtg.php' );
add_action( 'init', array( 'OgoPtg', 'init' ) );


add_action( 'woocommerce_before_shop_loop_item_title', array('OgoPtg','add_img_container'), 9);
add_action( 'woocommerce_before_shop_loop_item_title', array('OgoPtg','add_hover_img'), 11);