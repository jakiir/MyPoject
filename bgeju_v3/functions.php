<?php

add_theme_support( 'post-thumbnails' );
add_filter( 'widget_text', 'do_shortcode');


class bgeju_custom_Walker extends Walker_Nav_Menu
    {    
 
        /* Start of the <ul>
         *
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu". 
         *                   So basically add one to what you'd expect it to be
         */        
        function start_lvl(&$output, $depth)
        {
            $tabs = str_repeat("\t", $depth);
            // If we are about to start the first submenu, we need to give it a dropdown-menu class
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
                $output .= "\n{$tabs}<div class=\"rolloverMenu\"><div class=\"rolloverMenuInner\"><ul class=\"dropdown-menu\">\n";
            } else {
                $output .= "\n{$tabs}<ul></div></div>\n";
            }
            return;
        }
 
        /* End of the <ul>
         *
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu". 
         *                   So basically add one to what you'd expect it to be
         */        
        function end_lvl(&$output, $depth) 
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
                $output .= '<!--.dropdown-->';
            }
            $tabs = str_repeat("\t", $depth);
            $output .= "\n{$tabs}</ul>\n";
            return;
        }
 
        /* Output the <li> and the containing <a>
         * Note: $depth is "correct" at this level
         */        
        function start_el(&$output, $item, $depth, $args) 
        {    
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */
            if ($item->hasChildren) {
                $classes[] = 'dropdown';
                // level-1 menus also need the 'dropdown-submenu' class
                if($depth == 1) {
                    $classes[] = 'dropdown-submenu';
                }
            }
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';            
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $item_output = $args->before;
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */
            if ($item->hasChildren && $depth == 0) {
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">';
            } else {
                $item_output .= '<a'. $attributes .'>';
            }
 
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
 
            /* Output the actual caret for the user to click on to toggle the menu */            
            if ($item->hasChildren && $depth == 0) {
                $item_output .= '<b class="caret"></b></a>';
            } else {
                $item_output .= '</a>';
            }
 
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            return;
        }
 
        /* Close the <li>
         * Note: the <a> is already closed
         * Note 2: $depth is "correct" at this level
         */        
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>';
            return;
        }
 
        /* Add a 'hasChildren' property to the item
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633 
         */
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
        {
            // check whether this item has children, and set $item->hasChildren accordingly
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
 
            // continue with normal behavior
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }        
    }
	
	

register_nav_menus( array(
	'main_menu' => __( 'Main Menu' ),
	'footer_menu' => __( 'Footer Menu' )
) );


function MyTheme_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Header Social Links' ),
		'id' => 'header_social_links',
		'description' => __( 'the header social links widget area' ),
		'before_widget' => '<div class="social_network">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Verse From The Quran' ),
		'id' => 'verse_of_quran',
		'description' => __( 'the header verse from the quran widget area' ),
		'before_widget' => '<div class="top_slider"><div id="slideshowWrapper">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
/*	register_sidebar( array(
		'name' => __( 'Header Dialogue &amp; Donate' ),
		'id' => 'header_dialogue_donate',
		'description' => __( 'the header dialogue and donate widget area' ),
		'before_widget' => '<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );*/
	
	register_sidebar( array(
		'name' => __( 'Header Dialogue' ),
		'id' => 'header_dialogue',
		'description' => __( 'the header dialogue widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Header Donate' ),
		'id' => 'header_donate',
		'description' => __( 'the header donate widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );		
	
	register_sidebar( array(
		'name' => __( 'Zakat Chicago On Slider' ),
		'id' => 'zc_prncpl_clctn_dstrbtn',
		'description' => __( 'the zakat chicago on slider widget area' ),
		'before_widget' => '<div class="slider_text">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Zakat Chicago [ For Mobile Devices]' ),
		'id' => 'zc_prncpl_clctn_dstrbtn_fmd',
		'description' => __( 'the zakat chicago for mobile devices widget area' ),
		'before_widget' => '<div class="col-xs-12 col-sm-4"><div class="item">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Learn &raquo; Calculate &raquo; Pay Zakat' ),
		'id' => 'learn_calculate_pay_zakat',
		'description' => __( 'the learn calculate pay zakat widget area' ),
		'before_widget' => '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><div class="item">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'P.I.V' ),
		'id' => 'zc_pa_ia_v',
		'description' => __( 'the PA IA V widget area' ),
		'before_widget' => '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><div class="item">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Zakat Video' ),
		'id' => 'zakat_video',
		'description' => __( 'the zakat video widget area' ),
		'before_widget' => '<div class="youtube_video">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Quick Links' ),
		'id' => 'footer_quick_links',
		'description' => __( 'the footer quick links widget area' ),
		'before_widget' => '<div class="quick_links list">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Zakat Chicago' ),
		'id' => 'footer_zakat_chicago',
		'description' => __( 'the footer zakat chicago widget area' ),
		'before_widget' => '<div class="zakat_chicago">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Get Involved' ),
		'id' => 'footer_get_involved',
		'description' => __( 'the footer get involved widget area' ),
		'before_widget' => '<div class="get_involve list">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Bottom' ),
		'id' => 'footer_bottom',
		'description' => __( 'the footer bottom widget area' ),
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

}
add_action( 'widgets_init', 'MyTheme_widgets_init' );


function my_bloginfo_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'key' => '',
   ), $atts));
   return get_bloginfo($key);
}
add_shortcode('bloginfo', 'my_bloginfo_shortcode');


add_action( 'init', 'bgeju_slider' );
function bgeju_slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slider', 'post type singular name' ),
		'menu_name'          => _x( 'Slider', 'admin menu' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'slider' ),
		'add_new_item'       => __( 'Add New Slide' ),
		'new_item'           => __( 'New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'view_item'          => __( 'View Slide' ),
		'all_items'          => __( 'All Slides' ),
		'search_items'       => __( 'Search Slides' ),
		'parent_item_colon'  => __( 'Parent Slides:' ),
		'not_found'          => __( 'No slides found.' ),
		'not_found_in_trash' => __( 'No slides found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'slider', $args );
}


add_action( 'init', 'bgeju_featured_news' );
function bgeju_featured_news() {
	$labels = array(
		'name'               => _x( 'Featured News', 'post type general name' ),
		'singular_name'      => _x( 'Featured News', 'post type singular name' ),
		'menu_name'          => _x( 'Featured News', 'admin menu' ),
		'name_admin_bar'     => _x( 'Featured News', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Featured News' ),
		'add_new_item'       => __( 'Add New Featured News' ),
		'new_item'           => __( 'New Featured News' ),
		'edit_item'          => __( 'Edit Featured News' ),
		'view_item'          => __( 'View Featured News' ),
		'all_items'          => __( 'All Featured News' ),
		'search_items'       => __( 'Search Featured News' ),
		'parent_item_colon'  => __( 'Parent Featured News:' ),
		'not_found'          => __( 'No Featured News found.' ),
		'not_found_in_trash' => __( 'No Featured News found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'featured_news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'featured_news', $args );
}

add_action( 'init', 'bgeju_faculty_explorer' );
function bgeju_faculty_explorer() {
	$labels = array(
		'name'               => _x( 'Faculty Explorer', 'post type general name' ),
		'singular_name'      => _x( 'Faculty Explorer', 'post type singular name' ),
		'menu_name'          => _x( 'Faculty Explorer', 'admin menu' ),
		'name_admin_bar'     => _x( 'Faculty Explorer', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Faculty Explorer' ),
		'add_new_item'       => __( 'Add New Faculty Explorer' ),
		'new_item'           => __( 'New Faculty Explorer' ),
		'edit_item'          => __( 'Edit Faculty Explorer' ),
		'view_item'          => __( 'View Faculty Explorer' ),
		'all_items'          => __( 'All Faculty Explorer' ),
		'search_items'       => __( 'Search Faculty Explorer' ),
		'parent_item_colon'  => __( 'Parent Faculty Explorer:' ),
		'not_found'          => __( 'No Faculty Explorer found.' ),
		'not_found_in_trash' => __( 'No Faculty Explorer found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'faculty_explorer' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'faculty_explorer', $args );
}

add_action( 'init', 'bgeju_faculty_stuff' );
function bgeju_faculty_stuff() {
	$labels = array(
		'name'               => _x( 'Office Staff', 'post type general name' ),
		'singular_name'      => _x( 'Office Staff', 'post type singular name' ),
		'menu_name'          => _x( 'Office Staff', 'admin menu' ),
		'name_admin_bar'     => _x( 'Office Staff', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Office Staff' ),
		'add_new_item'       => __( 'Add New Office Staff' ),
		'new_item'           => __( 'New Office Staff' ),
		'edit_item'          => __( 'Edit Office Staff' ),
		'view_item'          => __( 'View Office Staff' ),
		'all_items'          => __( 'All Office Staff' ),
		'search_items'       => __( 'Search Office Staff' ),
		'parent_item_colon'  => __( 'Parent Office Staff:' ),
		'not_found'          => __( 'No Office Staff found.' ),
		'not_found_in_trash' => __( 'No Office Staff found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'faculty_stuff' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'faculty_stuff', $args );
}

add_action( 'init', 'bgeju_latest_news' );
function bgeju_latest_news() {
	$labels = array(
		'name'               => 'News',
		'singular_name'      => 'news',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New News',
		'edit_item'          => 'Edit News',
		'new_item'           => 'New News',
		'all_items'          => 'All News',
		'view_item'          => 'View News',
		'search_items'       => 'Search News',
		'not_found'          => 'No News found',
		'not_found_in_trash' => 'No News found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'News'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'latest_news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'latest_news', $args );
}


add_action( 'init', 'bgeju_upcomingPrograms' );
function bgeju_upcomingPrograms() {
	$labels = array(
		'name'               => 'Upcoming Programs',
		'singular_name'      => 'upcomingPrograms',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Upcoming Programs',
		'edit_item'          => 'Edit Upcoming Programs',
		'new_item'           => 'New Upcoming Programs',
		'all_items'          => 'All Upcoming Programs',
		'view_item'          => 'View Upcoming Programs',
		'search_items'       => 'Search Upcoming Programs',
		'not_found'          => 'No Upcoming Programs found',
		'not_found_in_trash' => 'No Upcoming Programs found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Upcoming Programs'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'upcomingPrograms' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'upcomingPrograms', $args );
}


add_action( 'init', 'bgeju_laboratory' );
function bgeju_laboratory() {
	$labels = array(
		'name'               => 'Laboratory',
		'singular_name'      => 'laboratory',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Laboratory',
		'edit_item'          => 'Edit Laboratory',
		'new_item'           => 'New Laboratory',
		'all_items'          => 'All Laboratory',
		'view_item'          => 'View Laboratory',
		'search_items'       => 'Search Laboratory',
		'not_found'          => 'No Laboratory found',
		'not_found_in_trash' => 'No Laboratory found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Laboratory'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'laboratory' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'laboratory', $args );
}

add_action( 'init', 'bgeju_eventss' );
function bgeju_eventss() {
	$labels = array(
		'name'               => 'Events',
		'singular_name'      => 'Events',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Events',
		'edit_item'          => 'Edit Events',
		'new_item'           => 'New Events',
		'all_items'          => 'All Events',
		'view_item'          => 'View Events',
		'search_items'       => 'Search Events',
		'not_found'          => 'No Events found',
		'not_found_in_trash' => 'No Events found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Events'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'bgeju_events' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'bgeju_events', $args );
}


function remove_wp_width_height($string){
	return preg_replace( '/(width|height)=\"\d*\"\s/', "", $string );
}

function get_page_id($page_slug){
	global $wpdb;
	$page_slug = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_slug."'");
	return $page_slug;
}

function my_custom_post_gallerie() {
	$labels = array(
		'name'               => _x( 'Galleries', 'post type general name' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Gallery' ),
		'add_new_item'       => __( 'Add New Gallery' ),
		'edit_item'          => __( 'Edit Gallery' ),
		'new_item'           => __( 'New Gallery' ),
		'all_items'          => __( 'All Galleries' ),
		'view_item'          => __( 'View Gallery' ),
		'search_items'       => __( 'Search Galleries' ),
		'not_found'          => __( 'No galleries found' ),
		'not_found_in_trash' => __( 'No galleries found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Galleries'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our galleries and gallerie specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments','author' ),
		'has_archive'   => true,
	);
	register_post_type( 'gallerie', $args );


}
add_action( 'init', 'my_custom_post_gallerie' );



function my_taxonomies_gallerie() {
	$labels = array(
		'name'              => _x( 'Gallery Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Gallery Categories' ),
		'all_items'         => __( 'All Gallery Categories' ),
		'parent_item'       => __( 'Parent Gallery Category' ),
		'parent_item_colon' => __( 'Parent Gallery Category:' ),
		'edit_item'         => __( 'Edit Gallery Category' ),
		'update_item'       => __( 'Update Gallery Category' ),
		'add_new_item'      => __( 'Add New Gallery Category' ),
		'new_item_name'     => __( 'New Gallery Category' ),
		'menu_name'         => __( 'Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'gallerie_category', 'gallerie', $args );
}
add_action( 'init', 'my_taxonomies_gallerie', 0 );


remove_shortcode('gallery');
add_shortcode('gallery', 'parse_gallery_shortcode');

function parse_gallery_shortcode($atts) {
 
    global $post;
 
    if ( ! empty( $atts['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $atts['orderby'] ) )
            $atts['orderby'] = 'post__in';
        $atts['include'] = $atts['ids'];
    }
 
    extract(shortcode_atts(array(
        'orderby' => 'menu_order ASC, ID ASC',
        'include' => '',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'medium',
        'link' => 'file'
    ), $atts));
 
 
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
        'orderby' => $orderby
    );
 
    if ( !empty($include) )
        $args['include'] = $include;
    else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }
 
    $images = get_posts($args);
     
    foreach ( $images as $image ) {     
        $caption = $image->post_excerpt;
 
        $description = $image->post_content;
        if($description == '') $description = $image->post_title;
 
        $image_alt = get_post_meta($image->ID,'_wp_attachment_image_alt', true);
 
        // render your gallery here
        echo wp_get_attachment_image($image->ID, $size);        
    }
}

function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';		 
		echo "Home";
		echo "</a>";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo "<span> &#187 ";
				the_title();
				echo "</span>";
			}
		} elseif (is_page()) {
			echo "<span> &#187 ";
			the_title();
			echo "</span>";
		}
		elseif (is_404()) {
			echo "<span> &#187 ";
			the_title();
			echo "Error 404";
			echo "</span>";
		}
	}
}

function trunck_string($str = "", $len = 150, $more = 'true') {
    if ($str == "") return $str;
    if (is_array($str)) return $str;
    $str = strip_tags($str);	
    $str = trim($str);
    // if it's les than the size given, then return it
    if (strlen($str) <= $len) return $str;
    // else get that size of text
    $str = substr($str, 0, $len);
    // backtrack to the end of a word
    if ($str != "") {
      // check to see if there are any spaces left
      if (!substr_count($str , " ")) {
        if ($more == 'true') $str .= "...";
        return $str;
      }
      // backtrack
      while(strlen($str) && ($str[strlen($str)-1] != " ")) {
        $str = substr($str, 0, -1);
      }
      $str = substr($str, 0, -1);
      if ($more == 'true') $str .= "...";
      if ($more != 'true' and $more != 'false') $str .= $more;
    }
    return $str;
}

function qt_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<p id="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<p id="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</p>';
 
  }
} // end qt_custom_breadcrumbs()

/* remove the unnecessary roles */
remove_role('subscriber');
remove_role('editor');
remove_role('author');
remove_role('contributor');


add_role(
    'faculty_explorer',
    __( 'Faculty explorer' ),
    array(
        'read'         => true,
        'edit_posts'   => true,
        'delete_posts' => true
    )
);

add_role(
    'faculty_student',
    __( 'Faculty Student' ),
    array(
        'read'         => true,
        'edit_posts'   => true,
        'delete_posts' => true
    )
);


if (!current_user_can(‘edit_posts’)) {
	show_admin_bar(false);
}

@ini_set( 'upload_max_size' , '64M' );

@ini_set( 'post_max_size', '64M');

@ini_set( 'max_execution_time', '300' );

include(TEMPLATEPATH."/cmb2/metabox.php");