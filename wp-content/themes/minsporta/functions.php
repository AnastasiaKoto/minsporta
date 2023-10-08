<?php
$root_path = ABSPATH;
require_once $root_path . '/vendor/autoload.php';
const FIELD_PARTICIPANTS = 'field_6505d06d0b877';
const FIELD_VIP = 'field_65040e0130045';
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

defined( 'CHLD_THM_CFG_IGNORE_PARENT' ) or define( 'CHLD_THM_CFG_IGNORE_PARENT', TRUE );

// END ENQUEUE PARENT ACTION


function all_styles() {
    wp_enqueue_style('css-norm', '/wp-content/themes/minsporta/css/normalize.css' );
	wp_enqueue_style( 'slick_css', '/wp-content/themes/minsporta/slick/slick.css' );
	wp_enqueue_style( 'slick-theme_css', '/wp-content/themes/minsporta/slick/slick-theme.css' );
	wp_enqueue_style( 'global_css', '/wp-content/themes/minsporta/css/global.css' );
  }
function all_js() {
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js');
	wp_enqueue_script('slick', '/wp-content/themes/minsporta/slick/slick.min.js');
	wp_enqueue_script('main', '/wp-content/themes/minsporta/js/global.js');
}
  add_action('wp_enqueue_scripts', 'all_styles');
  add_action('wp_enqueue_scripts', 'all_js');

function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'gallery.php' ) ) {
		wp_enqueue_style( 'fancy_css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css' );
		wp_enqueue_script('fancy_js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js');
		wp_enqueue_script('test_js', '/wp-content/themes/minsporta/js/test.js');
    }
	if (is_page_template('profile.php') || is_page_template('profile_add.php') || is_page_template('profile_download.php')) {
		wp_enqueue_style( 'profile_css', '/wp-content/themes/minsporta/css/profile.css' );
    }
  if (is_page_template('main.php')) {
    wp_enqueue_style( 'acc_css', '/wp-content/themes/minsporta/css/accordion.min.css' );
    wp_enqueue_style( 'land_css', '/wp-content/themes/minsporta/css/landing.css' );
    wp_enqueue_script('acc_js', '/wp-content/themes/minsporta/js/accordion.min.js');
  }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Страница настроек'),
            'menu_title'    => __('Настройки темы'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

function hide_admin_bar_for_subscriber() {
    if ( current_user_can( 'subscriber' ) && ! current_user_can( 'edit_posts' ) ) {
        show_admin_bar( false );
    }
}
add_action( 'after_setup_theme', 'hide_admin_bar_for_subscriber' );


//acf в профиле
add_action( 'admin_post_adaptiveweb_save_profile_form', 'adaptiveweb_save_profile_form' );
function adaptiveweb_save_profile_form() {
  if(!isset($_REQUEST['user_id'])) return;
  $current_user = wp_get_current_user();

  if(!empty($_POST['acf'][FIELD_VIP])) {
    $form_rows_vip = $_POST['acf'][FIELD_VIP];
    $vip_limit = get_field('vip_limit', 'user_'. $current_user->ID);

    if(count($form_rows_vip) > $vip_limit) {
      $_POST['acf'][FIELD_VIP] = array_slice($form_rows_vip, 0, $vip_limit);
    }
  }

  if(!empty($_POST['acf'][FIELD_PARTICIPANTS])) {
    $form_rows_participants = $_POST['acf'][FIELD_PARTICIPANTS];
    $parc_limit = get_field('parc_limit', 'user_'. $current_user->ID);

    if(count($form_rows_participants) > $parc_limit) {
      $_POST['acf'][FIELD_PARTICIPANTS] = array_slice($form_rows_participants, 0, $parc_limit);
    }
  }

  do_action('acf/save_post', $_REQUEST['user_id']);

  wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
  exit;
}