<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pixefora.com
 * @since      1.0.0
 *
 * @package    Px_video_log
 * @subpackage Px_video_log/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Px_video_log
 * @subpackage Px_video_log/public
 * @author     Pixefora <app@pixefora.com>
 */
class Px_video_log_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    private $token;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->token = 'cbde8f669fb952b01d66b8a64e6e2d77a1f8eeea';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Px_video_log_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Px_video_log_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/px_video_log-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Px_video_log_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Px_video_log_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/px_video_log-public.js', array( 'jquery' ), $this->version, false );

	}


    public function log_login($user_login, $user){

        $login_log = new px_video_log_login(0 );
        $mail = $user->user_email;
        $date = date('Y-m-d H:i:s');

        $args = array(
            'mail' => $mail,
            'date' => $date

        );

        $login_log->add($args);


    }

    public function register_view(){
        global $post;

        $current_user = wp_get_current_user();
        $user_mail =  $current_user->user_email;
        $post_id = $post->ID;
        $date = date('Y-m-d H:i:s');

       $view_log = new px_video_log_video_views( 0 );

       $args = array(
         'mail' => $user_mail,
         'date' => $date,
         'id_video' => $post_id
       );

       $view_log->add($args);


    }

    public function rest_api(){
        register_rest_route( 'px_video_log/v3', '/videos', array(
            'methods' => 'GET',
            'callback' => [$this,'rest_api_video'],
            'args' => array(),
            'permission_callback' => function () {
                return true;
            }
        ) );

        register_rest_route( 'px_video_log/v3', '/logins', array(
            'methods' => 'GET',
            'callback' => [$this,'rest_api_logins'],
            'args' => array(),
            'permission_callback' => function () {
                return true;
            }
        ) );

    }

    public function rest_api_video($request){
        if ($_GET['token'] == $this->token) {
            $log_video = new px_video_log_video_views(0);
            $json = $log_video->repository(($_GET));

            echo json_encode($json);
        }
    }

    public function rest_api_logins($request){
        if ($_GET['token'] == $this->token) {
            $log_video = new px_video_log_login(0);
            $json = $log_video->repository(($_GET));

            echo json_encode($json);
        }
    }

}
