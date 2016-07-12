<?php

/*
 * Dspc back compat functionality
 *
 * Prevents Dspc from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
*/

function dspc_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'dspc_upgrade_notice' );
}
add_action( 'after_switch_theme', 'dspc_switch_theme' );

/*
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Dspc on WordPress versions prior to 4.1.
*/

function dspc_upgrade_notice() {
	$message = sprintf( __( 'Dspc requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'dspc' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/*
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
*/

function dspc_customize() {
	wp_die( sprintf( __( 'Dspc requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'dspc' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}aq
add_action( 'load-customize.php', 'dspc_customize' );

/*
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
*/

function dspc_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Dspc requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'dspc' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'dspc_preview' );
