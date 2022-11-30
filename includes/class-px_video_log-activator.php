<?php

/**
 * Fired during plugin activation
 *
 * @link       https://pixefora.com
 * @since      1.0.0
 *
 * @package    Px_video_log
 * @subpackage Px_video_log/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Px_video_log
 * @subpackage Px_video_log/includes
 * @author     Pixefora <app@pixefora.com>
 */
class Px_video_log_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name_login = $wpdb->prefix . 'login_log';
        $table_name_video_views = $wpdb->prefix . 'video_views ';

        $sql[] = "CREATE TABLE $table_name_login (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		mail varchar(255) NOT NULL,
		date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

        $sql[] = "CREATE TABLE $table_name_video_views (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		id_video int(10) NOT NULL,
		mail varchar(255) NOT NULL,
		date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
	}

}
