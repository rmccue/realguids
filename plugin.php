<?php
/**
 * Plugin Name: Real GUIDs
 * Description: Generates real GUIDs for your posts, rather than a URL. Simplifies moving between development and production.
 * Author: Ryan McCue
 * Author URI: http://rmccue.io/
 * Version: 1.0
 *
 *          ^
 *         / \
 *        /   \
 *       /     \
 *      /       \
 *       |     |
 *       |     |             /--------------------------------\
 *       |     |        ,--- | Hi! I'm Sid the Squid, and I'm |
 *      (o)   (o)      /     | here to generate your GUIDs!   |
 *       |     |      /      \________________________________/
 *       \,,,,,/  ---'
 *       , , , ,
 *      (  ) (  )
 *     )  )  )   (
 *    (    )  )   )
 */

namespace RealGUIDs;

add_filter( 'kses_allowed_protocols', __NAMESPACE__ . '\\add_urn_protocol' );
add_filter( 'wp_insert_post_data', __NAMESPACE__ . '\\add_uuid_to_new' );

/**
 * Add urn: to allowed protocols.
 *
 * The GUID gets passed through `esc_url_raw`, so we need to allow urn.
 */
function add_urn_protocol( $protocols ) {
	$protocols[] = 'urn';
	return $protocols;
}

/**
 * Add our UUID to new posts.
 *
 * @param array $data Post data to save to the database.
 * @return array
 */
function add_uuid_to_new( $data ) {
	// Set a default GUID
	if ( empty( $data['guid'] ) ) {
		$data['guid'] = wp_slash( sprintf( 'urn:uuid:%s', generate_uuid_v4() ) );
	}

	return $data;
}

/**
 * Generate a UUID using the v4 algorithm.
 *
 * From http://php.net/manual/en/function.uniqid.php#94959
 *
 * @return string Generated UUID.
 */
function generate_uuid_v4() {
	return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

		// 32 bits for "time_low"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff),

		// 16 bits for "time_mid"
		mt_rand(0, 0xffff),

		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand(0, 0x0fff) | 0x4000,

		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand(0, 0x3fff) | 0x8000,

		// 48 bits for "node"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	);
}
