<?php
/**
 * @package ReFlex_Gallery
 * @version 3.1.3
 */
/*
Plugin Name: ReFlex Gallery
Plugin URI: http://wordpress-photo-gallery.com/
Description: Wordpress Plugin for creating responsive image galleries. By: HahnCreativeGroup
Author: HahnCreativeGroup
Version: 3.1.3
Author URI: http://labs.hahncreativegroup.com/
*/
if (!class_exists("ReFlex_Gallery")) {
	class ReFlex_Gallery {
		
		//Constructor
		public function __construct() {
			$this->plugin_name = plugin_basename(__FILE__);		
			$this->define_constants();
			$this->define_db_tables();			
			$this->add_gallery_options();
			$this->reflexdb = $this->create_db_conn();
			
			register_activation_hook( $this->plugin_name,  array(&$this, 'create_db_tables') );
			add_action('init', array($this, 'create_textdomain'));
			add_action('wp_enqueue_scripts', array($this, 'add_gallery_scripts'));
			
			add_action('wp_head', array($this, 'reflex_custom_style'));
			
			add_action( 'admin_init', array($this,'gallery_admin_init') );
			add_action( 'admin_menu', array($this, 'add_gallery_admin_menu') );
			
			add_shortcode( 'ReflexGallery', array($this, 'gallery_shortcode_handler') );
		}
		
		//Define textdomain
		public function create_textdomain() {
			$plugin_dir = basename(dirname(__FILE__));
			load_plugin_textdomain( 'reflex-gallery', false, $plugin_dir.'/lib/languages' );
		}
		
		//Define constants
		public function define_constants() {
			if ( ! defined( 'RESPONSIVEFLEXIGALLERY_PLUGIN_BASENAME' ) )
				define( 'RESPONSIVEFLEXIGALLERY_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		
			if ( ! defined( 'RESPONSIVEFLEXIGALLERY_PLUGIN_NAME' ) )
				define( 'RESPONSIVEFLEXIGALLERY_PLUGIN_NAME', trim( dirname( RESPONSIVEFLEXIGALLERY_PLUGIN_BASENAME ), '/' ) );
			
			if ( ! defined( 'RESPONSIVEFLEXIGALLERY_PLUGIN_DIR' ) )
				define( 'RESPONSIVEFLEXIGALLERY_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . RESPONSIVEFLEXIGALLERY_PLUGIN_NAME );
		}
		
		//Define DB tables
		public function define_db_tables() {
			global $wpdb;
			
			$wpdb->reflexGalleries = $wpdb->prefix . 'reflex_gallery';
			$wpdb->reflexImages = $wpdb->prefix . 'reflex_gallery_images';
		}
		
		//Create DB tables
		public function create_db_tables() {
			include_once (dirname (__FILE__) . '/lib/install-db.php');
			
			install_db();
		}
		
		public function create_db_conn() {
			require('lib/db-class.php');
			$reflexdb = ReflexDB::getInstance();
			return $reflexdb;
		}
		
		//Add gallery options
		public function add_gallery_options() {
			if(!get_option('reflex_gallery_options')) {
			  $gallery_options = array(
				  'thumbnail_width'  => 'auto',
				  'thumbnail_height' => 'auto',
				  'hide_overlay'     => 'false',
				  'hide_social'      => 'false',
				  'style'			 => 'default',
				  'custom_style'     => '',
				  'thumbnail_dShadow'=> 'true'
			  );
			
				add_option('reflex_gallery_options', array($this, $gallery_options));
			}
			else {
				$reFlexGalleryOptions = get_option('reflex_gallery_options');
				$keys = array_keys($reFlexGalleryOptions[1]);				
								
				if (!in_array('hide_overlay', $keys)) {
					$reFlexGalleryOptions[1]['hide_overlay'] = "false";	
				}
				if (!in_array('hide_social', $keys)) {
					$reFlexGalleryOptions[1]['hide_social'] = "false";	
				}
				if (!in_array('style', $keys)) {
					$reFlexGalleryOptions[1]['style'] = "default";	
				}				
				if (!in_array('custom_style', $keys)) {
					$reFlexGalleryOptions[1]['custom_style'] = "";	
				}
				if (!in_array('thumbnail_dShadow', $keys)) {
					$reFlexGalleryOptions[1]['thumbnail_dShadow'] = "true";	
				}
				
				update_option('reflex_gallery_options', $reFlexGalleryOptions);		
			}
		}
		
		//Add gallery scripts
		public function add_gallery_scripts() {			
			$ReflexGalleryOptions = get_option('reflex_gallery_options');
			
			wp_enqueue_script('jquery');
			wp_register_script('jquery_migrate', WP_PLUGIN_URL.'/reflex-gallery/scripts/jquery-migrate.js', array('jquery'), null);
			//wp_enqueue_script('jquery_migrate');
			wp_register_script('flexSlider', WP_PLUGIN_URL.'/reflex-gallery/scripts/flexslider/jquery.flexslider-min.js', array('jquery'));
			wp_register_script('prettyPhoto', WP_PLUGIN_URL.'/reflex-gallery/scripts/prettyphoto/jquery.prettyPhoto.js', array('jquery'));
			if($ReflexGalleryOptions[1]['hide_overlay'] == 'true' && $ReflexGalleryOptions[1]['hide_social'] == 'false') {
				wp_register_script('galleryManager', WP_PLUGIN_URL.'/reflex-gallery/scripts/galleryManagerNoOverlay.js', array('flexSlider', 'prettyPhoto', 'jquery'));
			}
			else if($ReflexGalleryOptions[1]['hide_overlay'] == 'false' && $ReflexGalleryOptions[1]['hide_social'] == 'true') {
				wp_register_script('galleryManager', WP_PLUGIN_URL.'/reflex-gallery/scripts/galleryManagerNoSocial.js', array('flexSlider', 'prettyPhoto', 'jquery'));
			}
			else if($ReflexGalleryOptions[1]['hide_overlay'] == 'true' && $ReflexGalleryOptions[1]['hide_social'] == 'true') {
				wp_register_script('galleryManager', WP_PLUGIN_URL.'/reflex-gallery/scripts/galleryManagerNoOverlayNoSocial.js', array('flexSlider', 'prettyPhoto', 'jquery'));
			}
			else {
				wp_register_script('galleryManager', WP_PLUGIN_URL.'/reflex-gallery/scripts/galleryManager.js', array('flexSlider', 'prettyPhoto', 'jquery'));
			}
			wp_enqueue_script('flexSlider');
			wp_enqueue_script('prettyPhoto');
			wp_enqueue_script('galleryManager');
			wp_register_style('flexSlider_stylesheet', WP_PLUGIN_URL.'/reflex-gallery/scripts/flexslider/flexslider.css');
			wp_register_style('prettyPhoto_stylesheet', WP_PLUGIN_URL.'/reflex-gallery/scripts/prettyphoto/prettyPhoto.css');
			wp_register_style('reflexGallery_stylesheet', WP_PLUGIN_URL.'/reflex-gallery/styles/'.$ReflexGalleryOptions[1]['style'].'.css');
			wp_enqueue_style('flexSlider_stylesheet');
			wp_enqueue_style('prettyPhoto_stylesheet');
			wp_enqueue_style('reflexGallery_stylesheet');
		}
		
		//Add custom thumbnail styles
		public function reflex_custom_style() {
			$styles = get_option('reflex_gallery_options');
			echo "<style>.reflex-gallery a img {".$styles[1]['custom_style']."}</style>";
		}
				
		//Admin Section - register scripts and styles
		public function gallery_admin_init() {
			wp_register_style( 'table_pager_stylesheet', WP_PLUGIN_URL.'/reflex-gallery/admin/scripts/TablePagination/tablePager.css');
			wp_register_style( 'prettyPhoto_admin_stylesheet', WP_PLUGIN_URL.'/reflex-gallery/scripts/prettyphoto/prettyPhoto.css');
		}
		
		public function add_default_media_uploader() {
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_register_script('easy-gallery-uploader', WP_PLUGIN_URL.'/reflex-gallery/admin/scripts/MediaUpload/image-uploader.js', array('jquery','media-upload','thickbox'));
			wp_enqueue_script('easy-gallery-uploader');
			wp_enqueue_style('thickbox');
		}
		
		public function reflex_gallery_admin_style_load() {
			wp_enqueue_style('table_pager_stylesheet');
		}
		
		public function reflex_gallery_admin_style_images() {
			wp_enqueue_style('table_pager_stylesheet');
			wp_enqueue_style('prettyPhoto_admin_stylesheet');
		}
		
		//Create Admin Menu
		public function add_gallery_admin_menu() {
			$overview = add_menu_page(__('ReFlex Gallery','reflex-gallery'), __('ReFlex Gallery','reflex-gallery'), 'manage_options', 'reflex-gallery-admin', array($this, 'add_overview'));
			$add_gallery = add_submenu_page('reflex-gallery-admin', __('ReFlex Gallery >> Add Gallery','reflex-gallery'), __('Add Gallery','reflex-gallery'), 'manage_options', 'add-gallery', array($this, 'add_gallery'));
			$edit_gallery = add_submenu_page('reflex-gallery-admin', __('ReFlex Gallery >> Edit Gallery','reflex-gallery'), __('Edit Gallery','reflex-gallery'), 'manage_options', 'edit-gallery', array($this, 'edit_gallery'));
			$add_images = add_submenu_page('reflex-gallery-admin', __('ReFlex Gallery >> Add Images','reflex-gallery'), __('Add Images','reflex-gallery'), 'manage_options', 'add-images', array($this, 'add_images'));	
			
			add_action('admin_print_styles-'.$overview, array($this, 'reflex_gallery_admin_style_load'));
			add_action('admin_print_styles-'.$edit_gallery, array($this, 'reflex_gallery_admin_style_load'));
			add_action('admin_print_styles-'.$add_images, array($this, 'reflex_gallery_admin_style_images'));
			add_action('admin_print_styles-'.$add_images, array($this, 'add_default_media_uploader'));
		}
		
		//Create Admin Pages
		public function add_overview() {			
			include("admin/overview.php");
		}
		
		public function add_gallery() {
			include("admin/add-gallery.php");	
		}
		public function edit_gallery() {
			include("admin/edit-gallery.php");	
		}
		
		public function add_images() {
			include("admin/add-images.php");
		}	
		
		//Create gallery
		public function create_gallery($galleryId) {
			require_once('lib/gallery-class.php');			
			global $responsiveGallery;
			
			if (class_exists('ResponsiveGallery')) {
				$responsiveGallery = new ResponsiveGallery($galleryId, $this->reflexdb);
				return $responsiveGallery->render();
			}
			else {
				return "Gallery not found.";	
			}	
		}
		
		//Create Short Code
		public function gallery_shortcode_handler($atts) {
			return $this->create_gallery($atts['id']);
		}
	}
}

if (class_exists("ReFlex_Gallery")) {
    global $ob_ReFlex_Gallery;
	$ob_ReFlex_Gallery = new ReFlex_Gallery();
	
	add_action( 'init', 'rfg_code_button' );
function rfg_code_button() {
    add_filter( "mce_external_plugins", "rfg_code_add_button" );
    add_filter( 'mce_buttons', 'rfg_code_register_button' );
}
function rfg_code_add_button( $plugin_array ) {
    $plugin_array['rfgbutton'] = $dir = plugins_url( 'admin/scripts/shortcode.js', __FILE__ );
    return $plugin_array;
}
function rfg_code_register_button( $buttons ) {
    array_push( $buttons, 'rfgselector' );
    return $buttons;
}
}
?>