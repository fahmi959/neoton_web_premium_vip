<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */

if ( ! function_exists( 'neoton_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 

function neoton_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on neoton, use a find and replace
	 * to change 'neoton' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'neoton', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );	
	
	function neoton_change_excerpt( $text )
	{
		$pos = strrpos( $text, '[');
		if ($pos === false)
		{
			return $text;
		}
		
		return rtrim (substr($text, 0, $pos) ) . '...';
	}
	add_filter('get_the_excerpt', 'neoton_change_excerpt');


	// Limit Excerpt Length by number of Words
	function neoton_custom_excerpt( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
		}
		function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
		$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'neoton' ),			
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'neoton_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	//add support posts format
	add_theme_support( 'post-formats', array( 
		'aside', 
		'gallery',
		'audio',
		'video',
		'image',
		'quote',
		'link',
	) );

add_theme_support( 'align-wide' );	
}
endif;
add_action( 'after_setup_theme', 'neoton_setup' );

/**
*Custom Image Size
*/

add_image_size( 'neoton_long_width-grid', 1000, 700, true );
add_image_size( 'neoton_long-grid', 550, 270, true );
add_image_size( 'neoton_equal-grid', 550, 550, true );
add_image_size( 'neoton_equal-grid_big', 550, 650, true );
add_image_size( 'neoton_footer-post', 100, 100, true );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function neoton_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'neoton_content_width', 640 );
}
add_action( 'after_setup_theme', 'neoton_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/template-scripts.php';



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom Style
 */


if (class_exists( 'ReduxFramework')){
	require_once get_template_directory() . '/framework/custom.php';
	require_once get_template_directory() . '/libs/theme-option/config.php';
}



function neoton_file_types_to_uploads($file_types){
	$new_filetypes        = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'neoton_file_types_to_uploads');


// TGM Plugin Activation
if (is_admin()) {
	require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/framework/tgm-config.php';	
}

/**
 * WooCommerce additions.
 */
require_once get_template_directory() . '/inc/woocommerce-functions.php';

//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;

function neoton_remove_demo_mode_link() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'neoton_remove_demo_mode_link');


/**
 * Registers an editor stylesheet for the theme.
 */
function neoton_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'neoton_theme_add_editor_styles' );



//remove revolution slid metabox

function neoton_remove_revolution_slider_meta_boxes() {	
	
	remove_meta_box( 'mymetabox_revslider_0', 'teams', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'rsclient', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'gallery', 'normal' );
}

add_action( 'do_meta_boxes', 'neoton_remove_revolution_slider_meta_boxes' );	


function neoton_menu_add_description_to_menu($item_output, $item, $depth, $args) {

   if (strlen($item->description) > 0 ) {
      // append description after link
      $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));   
     
   }   
   return $item_output;
}
add_filter('walker_nav_menu_start_el', 'neoton_menu_add_description_to_menu', 10, 4);

//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function neoton_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'neoton_wpb_move_comment_field_to_bottom' );	

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});


if(!function_exists('back_add_images_to_special_submenu')){
	function back_add_images_to_special_submenu( $items ) {
	  $special_menu_parent_ids = array();

	  foreach ( $items as $item ) {
	    if ( in_array( 'back-custom-mega', $item->classes, true ) && isset( $item->ID ) ) {
	      $special_menu_parent_ids[] = $item->ID;
	    }

	    if ( in_array( $item->menu_item_parent, $special_menu_parent_ids ) && has_post_thumbnail( $item->object_id ) ) {
	      $item->title = sprintf(
	        '%1$s %2$s',
	        get_the_post_thumbnail( $item->object_id, 'thumbnail', array( 'alt' => esc_attr( $item->title ) ) ),
	        $item->title
	      );
	    }
	  }

	  return $items;
	}

	add_filter( 'wp_nav_menu_objects', 'back_add_images_to_special_submenu' );
}

/* extra field at for user profile */

add_action( 'show_user_profile', 'neoton_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'neoton_show_extra_profile_fields' );

function neoton_show_extra_profile_fields( $user ) { ?>
  <h3><?php  esc_html_e('Author Share Icon Here', 'neoton');?></h3>
  <table class="form-table">
    <tr>
      <th><label for="facebook"><?php esc_html_e('Facebook', 'neoton'); ?></label></th>
      <td>
        <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />       
      </td>
    </tr>
    <tr>
      <th><label for="twitter"><?php esc_html_e('Twitter', 'neoton');?></label></th>
      <td>
        <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
       
      </td>
    </tr>
    <tr>
      <th><label for="linkedin "><?php esc_html_e('Linkedin', 'neoton');?></label></th>
      <td>
        <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />       
      </td>
    </tr>
    <tr>
      <th><label for="google"><?php esc_html_e('Instagram', 'neoton');?></label></th>

      <td>
        <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />       
      </td>
    </tr>
  </table>
<?php }
/* update user profile field */
add_action( 'personal_options_update', 'neoton_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'neoton_save_extra_profile_fields' );

function neoton_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
    return false;
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'google', $_POST['google'] );
}
function back_updats__post_views($post_id) {
    $views = get_post_meta($post_id, 'post_views', true);
    $views = $views ? $views + 1 : 1;
    update_post_meta($post_id, 'post_views', $views);
}
add_action('wp_head', function() {
    if (is_single()) {
        back_updats__post_views(get_the_ID());
    }
});
