<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 */


/////////////////////////////////////////
// Library includes
////////////////////////////////////////


 include_once dirname(__FILE__) . "/libs/custom-post-type.php";	

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function transformationspace_setup() {

	function remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');


	/* add a shortcode for dynamic select using functions and hooks */
	function dynamic_select($choices, $args = array()) {

		global $post;
		$bootCampTitle = $post->post_title;

		$args = array(
			'post_type' => 'Bootcamps',
			'post_status' => 'publish',
		);
		
		$the_query = new WP_Query( $args );
		
		while ( $the_query->have_posts() ) :
		$the_query->the_post();
		$output[get_the_title()] = get_the_title();
		endwhile;
		

		foreach ($output as $myString) {
			$outputDecoded[] = html_entity_decode($myString);
		}
		//var_dump($outputDecoded);
		
	
		if (in_array($bootCampTitle, $outputDecoded)) {
		//echo "Match found";
		$choices = array($bootCampTitle => $bootCampTitle);
		$choices = array_merge($choices, $output);
		} else {
		//echo "Match not found";
		$choices = array('Select a bootcamp' => '');
		$choices = array_merge($choices, $output);
		}

		return $choices;

		}
		add_filter('wpcf7_dynamic_select', 'dynamic_select', 10, 2);


	function _wp_upload_dir_baseurl(){
	
		$upload_dir = wp_get_upload_dir();
		
		return $upload_dir['baseurl'];
	}
	
	add_action( 'admin_menu', 'my_admin_menu' );

	function my_admin_menu() {
		//add_menu_page(__('Locations'), __('Locations'), 'edit_posts', 'post.php?post=165&action=edit', '', 'dashicons-location', 6);
	}
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/transformationspace
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'transformationspace' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'transformationspace' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'transformationspace-featured-image', 2000, 1200, true );

	add_image_size( 'transformationspace-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'transformationspace' ),
		'social' => __( 'Social Links Menu', 'transformationspace' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', transformationspace_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'transformationspace' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'transformationspace' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'transformationspace' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'transformationspace' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'transformationspace' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'transformationspace_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'transformationspace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function transformationspace_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( transformationspace_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'transformationspace_content_width', $content_width );
}
add_action( 'template_redirect', 'transformationspace_content_width', 0 );

/**
 * Register custom fonts.
 */
function transformationspace_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'transformationspace' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function transformationspace_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'transformationspace-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'transformationspace_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function transformationspace_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'transformationspace' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'transformationspace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'transformationspace' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'transformationspace' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'transformationspace' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'transformationspace' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'transformationspace' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'transformationspace' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Bottom Menu', 'transformationspace' ),
		'id'            => 'footer-bottom-menu',
		'description'   => __( 'Add widgets here to appear in your footer.', 'transformationspace' ),
		'before_widget' => '<div class="footer-bottom-menu" id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'transformationspace_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function transformationspace_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'transformationspace' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'transformationspace_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function transformationspace_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'transformationspace_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function transformationspace_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'transformationspace_pingback_header' );



/**
 * Enqueue scripts and styles.
 */
function transformationspace_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'transformationspace-fonts', transformationspace_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'transformationspace-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'transformationspace-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'transformationspace-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'transformationspace-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'transformationspace-style' ), '1.0' );
		wp_style_add_data( 'transformationspace-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'transformationspace-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'transformationspace-style' ), '1.0' );
	wp_style_add_data( 'transformationspace-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'transformationspace-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$transformationspace_l10n = array(
		'quote'          => transformationspace_get_svg( array( 'icon' => 'quote-right' ) ),
	);


	function menu_link_classes($classes, $item, $args) {

		$classes['class'] = 'menu-item-link menu-item-js';
		return $classes;
	  }
	  add_filter('nav_menu_link_attributes', 'menu_link_classes', 1, 3);


	wp_localize_script( 'transformationspace-skip-link-focus-fix', 'transformationspaceScreenReaderText', $transformationspace_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'transformationspace_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function transformationspace_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'transformationspace_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function transformationspace_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'transformationspace_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function transformationspace_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'transformationspace_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function transformationspace_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'transformationspace_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function transformationspace_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'transformationspace_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


function my_assets() {
	$ts_theme_version = '5.2';
	wp_enqueue_style( 'Raleway-font', 'https://fonts.googleapis.com/css?family=Raleway:400,700,900' );
	wp_enqueue_style( 'Abhaya-font', 'https://fonts.googleapis.com/css?family=Abhaya+Libre:400,600' );
	wp_enqueue_style( 'hamburgers-style', get_template_directory_uri() . '/assets/css/hamburgers.min.css' );
	wp_enqueue_style( 'slick-style-theme', get_template_directory_uri() . '/assets/css/slick-theme.css' );
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'tag-style-theme', get_template_directory_uri() . '/assets/css/tagify.css' );
	wp_enqueue_style( 'tagsinput-style',  plugins_url() . '/search-tag/bootstrap-tagsinput.css' );
	wp_enqueue_style( 'typehead-style',  plugins_url() . '/search-tag/typeahead.css' );
	wp_enqueue_style( 'fancybox-style', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css', '', $ts_theme_version);
	wp_enqueue_style( 'landing-style', get_template_directory_uri() . '/assets/css/style-landing-page.css', '', $ts_theme_version);	
}

add_action( 'wp_enqueue_scripts', 'my_assets' );

function my_scripts() {
	wp_enqueue_script( 'tag_scripts', get_template_directory_uri() . '/assets/js/jQuery.tagify.min.js' );
	wp_enqueue_script( 'fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js' );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery.ui.widget.js', array( 'jquery' ), true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array( 'jquery' ), true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), true );
	wp_enqueue_script( 'custom-lp', get_template_directory_uri() . '/assets/js/custom-lp.js', array( 'jquery' ), true );
	wp_enqueue_script( 'canvasloader', 'https://cdn.jsdelivr.net/gh/heartcode/CanvasLoader@0.9.1/js/heartcode-canvasloader-min.min.js', null, true );
	wp_enqueue_script( 'slick_scripts', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'slick_sliders_init', get_template_directory_uri() . '/assets/js/slick_sliders_init.js', array( 'jquery' ), true );
	wp_enqueue_script( 'tagsinput-js', plugins_url() . '/search-tag/bootstrap-tagsinput.js' );	
	wp_enqueue_script( 'typehead-js', plugins_url() . '/search-tag/typeahead.js', array( 'jquery' ), true );	
}
add_action( 'wp_enqueue_scripts', 'my_scripts', 40 );



function get_bootcamps( $atts ) {
	$limit = $atts['limit'];
	
	$args = array( 
			'post_type' => 'Bootcamps',
			'post_status' => 'publish',
			'numberposts' => $limit
		);
   		
  	$recent_posts = wp_get_recent_posts($args);
	$output = '<ul class="menu">';
		foreach( $recent_posts as $recent ){
			$output .= '<li class="menu-item"><a class="menu-item-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
		}
	$output .='</ul>';
	return $output;
	wp_reset_query();
}
add_shortcode( 'bootcamps', 'get_bootcamps' );


function get_excerpt($count){
//  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

function vimeoVideoDuration($video_id) {

   $json_url = 'http://vimeo.com/api/v2/video/' . $video_id . '.xml';

   $ch = curl_init($json_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HEADER, 0);
   $data = curl_exec($ch);
   curl_close($ch);
   $data = new SimpleXmlElement($data, LIBXML_NOCDATA);

   if (!isset($data->video->duration)) {
       return null;
   }

   	$duration = $data->video->duration;

   	$minutes = floor(($duration / 60) % 60);
  	$seconds = $duration % 60;
   
   return "$minutes:$seconds";


}
function create_excerpt($excerpt, $count){
	$excerpt = strip_tags($excerpt);
  	$excerpt = substr($excerpt, 0, $count);
  	$excerpt = $excerpt.'...';
  	return $excerpt;
}




function transformationspace_after_setup_theme() {

	// register our translatable strings - again first check if function exists.
 
	 if ( function_exists( 'pll_register_string' ) ) {
		pll_register_string('Button bootcamp single', 'enroll now');
		pll_register_string('Button bootcamp list', 'know more');
		pll_register_string('Button newsletter', 'Get started');
		pll_register_string('input newsletter', 'Enter your email');
		pll_register_string('Text newsletter', 'Looking for the right career move?');
		pll_register_string('Button Explore', 'Explore our Bootcamps');
		pll_register_string('Banner Info Title', 'Get more info');
		pll_register_string('Banner Info Paragraph', 'So many things we can share with you. Let your e-mail here');
		pll_register_string('Banner Info Name Label', 'Name');
		pll_register_string('Banner Info Name Placeholder', 'Your name here');
		pll_register_string('Banner Info Email Placeholder', 'Your e-mail here');
		pll_register_string('Banner Info Button', 'Get amazingness');
 
	 }
 }
  add_action( 'after_setup_theme', 'transformationspace_after_setup_theme' );



function last_word_blue($string){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

function get_newsletter_sidebar( $atts ) {

	$output ='<p class="extra-bold newsletter-sidebar-title">Subscribe our newsletter</p>
				<p>Find out about upcoming programs and events</p>
					<div id="mc_embed_signup">
							<form action="https://space.us19.list-manage.com/subscribe/post-json?u=f8fa948d2036f4f4fef049cfc&id=7aa7fb0215&c=?" method="get" id="newsletter-blog" name="mc-embedded-subscribe-form" class="form-inline validate newsletter-sidebar newsletter-blog" target="_blank">	
								<div class="input-container">
									<input id="mce-EMAIL" class="big" name="EMAIL" required="" type="email" placeholder="Your e-mail address">
									<input class="btn btn-big btn-shadow submit" name="subscribe" type="submit" value="Go!">
								</div>				
								<div id="mce-responses" class="clear">
									<p class="response"></p>
								</div>			
							</form>					
						</div>
					<p class="x-small">By providing us with your email, you agree to the terms of our Privacy Policy and Terms of Service.</p>';
	return $output;
}
add_shortcode( 'newsletter_sidebar', 'get_newsletter_sidebar' );


function get_career_sidebar( $atts ) {
	$output ='<div class="widget-career"><h1>looking for a new career?</h1><img src="'.get_template_directory_uri().'/assets/images/widget-career-bg.png" /><div class="button-container"><a class="btn btn-black shadow" tabindex="0" href="#">get your chance</a></div></div>';
	return $output;
}

add_shortcode( 'career_sidebar', 'get_career_sidebar' );


function get_started_sidebar( $atts ) {

	$output = '<div class="get-started-widget">
				<img src="'.get_template_directory_uri().'/assets/images/get-started.jpg" />
				<h1>Get Started</h1>
				<p>15-Day free trial. Get set up in 5 minutes.</p>
				<div class="button-container">
					<a class="round-button yellow" tabindex="0" href="#">get more info</a>
				</div>
			</div>';
	return $output;
}

add_shortcode( 'get_started', 'get_started_sidebar' );

add_filter('wp_ulike_format_number','wp_ulike_new_format_number',10,3);
function wp_ulike_new_format_number($value, $num, $plus){
	if ($num >= 1000 && get_option('wp_ulike_format_number') == '1'):
	$value = round($num/1000, 2) . 'K';
	else:
	$value = $num;
	endif;
	return $value;
}

function get_ajax_posts_() {
    // Query Arguments
    $args = array(
        'nopaging' => true,
        'order' => 'DESC',
        'orderby' => 'date',
        'category_name' => 'Stories'
    );

    // The Query
    $ajaxposts = new WP_Query( $args );

    $response = '';

    // The Query
    if ( $ajaxposts->have_posts() ) {
        while ( $ajaxposts->have_posts() ) {
            $ajaxposts->the_post();
            $response .= get_template_part( 'template-parts/transformation_space/bootcamp-stories');
        }
    } else {
        $response .= get_template_part('none');
    }

    echo $response;

    exit; // leave ajax call
}
function get_ajax_posts(){
    echo "ajax responding";
}
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_no_priv_get_ajax_posts', 'get_ajax_posts');

add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );



?>