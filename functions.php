<?php
# Register menu
function menu_register() {
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
        )
        );
}
add_action('init', 'menu_register');
/*============================================================================================*/
//ADD li class for menu bar
function add_additional_class_on_li($classes, $item, $args){

    if(isset($args->add_li_class)){
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1,3);

/*=============================================================================================*/
//ADD a class for menu bar
function add_additional_class_on_a($classes, $item, $args){

    if(isset($args->add_a_class)){
        $classes[] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_a', 1,3);
 /*========================================================================================*/
 //register custom post type for unique categories
 function slider_custom_post_type() {
    register_post_type( 'sliders', array(
            'labels' => array(
                'name' => __( 'Sliders' ),
                'singular_name' => __( 'sliders' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'sliders'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies' => array('category' ),
        )
    );
 }
add_action( 'init', 'slider_custom_post_type' );


add_theme_support( 'post-thumbnails' );
/*=====================================================================*/


?>