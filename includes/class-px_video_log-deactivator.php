<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://pixefora.com
 * @since      1.0.0
 *
 * @package    Px_video_log
 * @subpackage Px_video_log/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Px_video_log
 * @subpackage Px_video_log/includes
 * @author     Pixefora <app@pixefora.com>
 */
class Px_video_log_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        /**
         * Only to develop
         */

      /*  global $wpdb;
        $table_name_login = $wpdb->prefix . 'login_log';
        $table_name_video_views = $wpdb->prefix . 'video_views ';

        $sql[] = "DROP TABLE IF EXISTS  $table_name_login";
        $sql[] = "DROP TABLE IF EXISTS  $table_name_video_views";



        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );*/

	}

}
