<?php
/**
 * BuddyBoss Messages Widgets.
 *
 * @package BuddyBoss\Messages
 * @since BuddyPress 1.9.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register widgets for the Messages component.
 *
 * @since BuddyPress 1.9.0
 */
function bp_messages_register_widgets() {
	add_action(
		'widgets_init',
		function() {
			register_widget( 'BP_Messages_Sitewide_Notices_Widget' );
		}
	);
}
add_action( 'bp_register_widgets', 'bp_messages_register_widgets' );
