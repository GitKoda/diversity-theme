<?php

//Dspc only works in WordPress 4.1 or later
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
	
if (!function_exists('dspc_setup')) :
	function dspc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dspc, use a find and replace
		 * to change 'dspc' to the name of your theme in all the template files
		*/
		load_theme_textdomain('dspc', get_template_directory() . '/languages');
			
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		
		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');
		
		//This theme uses wp_nav_menu() in two locations.
		register_nav_menus(array(
			'primary' => __( 'Primary Menu', 'dspc'),
			'social'  => __( 'Social Links Menu', 'dspc'),
		));
		
		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		));
		remove_theme_support('html5', 'comment-form');
		
		//Enable support for custom logo.
		add_theme_support('custom-logo', array(
			'height'      => 200,
			'width'       => 200,
		));
		
		//Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // twentyfifteen_setup
add_action('after_setup_theme','dspc_setup');

function scripts() {
	//Register the script like this for a theme
	//For either a plugin or a theme, you can then enqueue the script
	wp_deregister_script('jquery');
	wp_register_script('jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script('jquery');
	
	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), false, true);
	wp_enqueue_script('bootstrap');
	
	wp_register_script( 'scroll', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/10.0.0/js/smooth-scroll.min.js',  NULL, false, true);
	wp_enqueue_script('scroll');
	
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.min.js', array('jquery'), false, true);
	wp_enqueue_script('app');
}
add_action( 'wp_enqueue_scripts', 'scripts' );


//Add excerpts to pages
function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'add_excerpts_to_pages' );

//Pagination
function is_paginated() {
		return true;
}

//FB Open Graph W3 Tags
function modify_language_atrributes($content) {
	return $content . ' xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'modify_language_atrributes');

//Add Meta Tags
function insert_fb_in_head() {
	global $post;
	global $wp;
	$current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
	$post_image_url = get_bloginfo('template_directory') . '/images/logo-diversity.png';
	if (is_single()){ //is a post
		$html .= '<meta property="og:url" content="' . get_permalink() . '"/>';
		$html .= '<meta property="og:type" content="article"/>';
		$html .= '<meta property="og:title" content="' . get_the_title() . '"/>';		
		$html .= '<meta property="og:description" content="' . $post->post_excerpt . '"/>';			
		//if the post or page have an image
		if(has_post_thumbnail($post->ID)) {
			$post_image_url = get_the_post_thumbnail_url($post->ID, array(527,275));
			$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
		} else {
			$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
		}
		
	} else if(is_page()){ //is a page
		$html .= '<meta property="og:url" content="' . get_permalink() . '"/>';
		$html .= '<meta property="og:type" content="website"/>';
		$html .= '<meta property="og:title" content="' . get_the_title() . '"/>';		
		$html .= '<meta property="og:description" content="' .  $post->post_excerpt . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
		
	} else if(is_category()){ //is a category page
		$html .= '<meta property="og:url" content="' . $current_url . '/' . '"/>';
		$html .= '<meta property="og:type" content="blog"/>';
		$html .= '<meta property="og:title" content="' . get_the_category()[0]->cat_name . ' Posts"/>';		
		$html .= '<meta property="og:description" content="' .  wp_strip_all_tags(category_description()) . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';	
	}
	
	else if(is_search()){ //is a search page
		$html .= '<meta property="og:url" content="' . $current_url . '"/>';
		$html .= '<meta property="og:type" content="blog"/>';
		$html .= '<meta property="og:title" content="Category: ' . get_the_category()[0]->cat_name . '"/>';		
		$html .= '<meta property="og:description" content="' . $post->post_excerpt . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';	
		
	} else if(is_date()){  //is an archive page
		$html .= '<meta property="og:url" content="' . $current_url . '"/>';
		$html .= '<meta property="og:type" content="blog"/>';
		$html .= '<meta property="og:title" content="Posts of ' . get_the_archive_title() . '"/>';		
		$html .= '<meta property="og:description" content="' . $post->post_excerpt . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
	}
	
	else if(is_tag()){ //is a tag page
		$html .= '<meta property="og:url" content="' . $current_url . '"/>';
		$html .= '<meta property="og:type" content="blog"/>';
		$html .= '<meta property="og:title" content="' . single_tag_title('Tag: ', false) . '"/>';		
		$html .= '<meta property="og:description" content="' . wp_strip_all_tags(term_description()) . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
	} else if(is_404()){
		$html .= '<meta property="og:url" content="' . $current_url . '"/>';
		$html .= '<meta property="og:type" content="website"/>';
		$html .= '<meta property="og:title" content="Page Not Found"/>';		
		$html .= '<meta property="og:description" content="Page Not Found"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';
	}
	
	else{ //is another thing
		$html .= '<meta property="og:url" content="' . $current_url . '/' . '"/>';
		$html .= '<meta property="og:type" content="blog"/>';
		$html .= '<meta property="og:title" content="' .  wp_title('') . '" />';
		$html .= '<meta property="og:description" content="' . get_bloginfo('description') . '"/>';
		$html .= '<meta property="og:image" content="' . $post_image_url . '"/>';				
	}
	//facebook following etc
	$html .= '<meta property="fb:app_id" content="927041417421957"/>';
	echo $html;
}

add_action('wp_head', 'insert_fb_in_head', 5);

//Modify excerpt
function change_excerpt($output) {
	global $post;
	return $output . '<a href="' . get_permalink($post->ID) . '" class="rounded-button red-button" title="Read More">Read More</a>';
}

add_filter('the_excerpt','change_excerpt');

function new_excerpt_more($more) {
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

//Widgets areas
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

// Footer widgets areas
register_sidebar(array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer-sidebar-1',
    'description' => 'First Footer Widget Area',
    'before_widget' => '<div class="col-md-3 widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer-sidebar-2',
    'description' => 'Second Footer Widget Area',
    'before_widget' => '<div class="col-md-3 widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer-sidebar-3',
    'description' => 'Third Footer Widget Area',
    'before_widget' => '<div class="col-md-3 widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => 'Footer Sidebar 4',
    'id' => 'footer-sidebar-4',
    'description' => 'Forth Footer Widget Area',
    'before_widget' => '<div class="col-md-3 widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));

//custom comments html
function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link">< ?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            		<div class="comment-body">
            			<div class="comment-meta">
							<div class="author vcard">
								<?php echo get_avatar($comment, 56, '', false, array('class' => 'img-circle')); ?>
								<b class="author-name"><?php comment_author(); ?></b>
							</div><!-- .vcard -->
           			        <div class="comment-metadata">
								<time <?php comment_time( 'c' ); ?> class="comment-time">
									<?php comment_date(); ?>
									<?php comment_time(); ?>
								</time>
							</div>
            			</div>
						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
						<div class="reply">
							<?php 
								comment_reply_link(array_merge( $args, array( 
									'reply_text' => '<button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Reply</button>',
									'after' => '', 
									'depth' => $depth,
									'max_depth' => $args['max_depth'] 
								)));
							?>
						</div>
          			</div>
        <?php
        break;
    endswitch;
}

//Social networks customizer
function dspc_social_media_array() {
	//store social site names in array
	$social_sites = array('email', 'facebook', 'instagram', 'twitter', 'youtube', 'linkedin'); 
	return $social_sites;
}

function dspc_social_sites_customizer($wp_customize) {
 
	$wp_customize->add_section('my_social_settings', array(
			'title'    => __('Social Media', 'text-domain'),
			'priority' => 35,
	) );
 
	$social_sites = dspc_social_media_array();
	$priority = 5;
 
	foreach($social_sites as $social_site) {
 
		$wp_customize->add_setting("$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		));
 		
		$temp = ucfirst($social_site);
		$wp_customize->add_control($social_site, array(
				'label'    => __("$temp URL:", 'text-domain'),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		));
 
		$priority = $priority + 5;
	}
}

add_action('customize_register', 'dspc_social_sites_customizer');

/*
 * Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

?>