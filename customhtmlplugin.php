<?php
/*
Plugin Name: Custom HTML Plugin
Description: This plugin allows you to place custom HTML in any place you want in your site
Author: Syed Affan Hamdani
Website: www.affanhamdani.me
*/
/*  Functions Start*/
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'custom_html_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget 
class custom_html_widget extends WP_Widget {
 
    function __construct() {
    parent::__construct(
     
    // Base ID of your widget
    'custom_html_widget', 
     
    // Widget name will appear in UI
    __('Custom HTML Widget', 'affanhamdani.me'), 
     
    // Widget description
    array( 'description' => __( 'Sample for custom HTML Tutorial', 'affanhamdani.me' ), ) 
    );
    }
    // Creating widget front-end
 
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
     
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
     
    // This is where you run the code and display the output
    echo __( 'Hello, World!', 'affanhamdani.me' );
    echo $args['after_widget'];
    }
             
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    $text = $instance['text'];

    }
    else {
    $title = __( 'New Title', 'affanhamdani.me' );
    }
    // Widget admin form
     
    }
         
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
        }
} // Class ends here

/* Stop Adding Functions Below this Line */
?>
