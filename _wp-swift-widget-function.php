<?php
/*
Plugin Name:       WP Swift: ACF Starter Widget
Description:       A starter widget for creating widgets using Advanced Custom Fields
Version:           1.0.0
Author:            Gary Swift
License:           GPL-2.0+
Text Domain:       wp-swift-acf-starter-widget

//TODO

1) Find & Replace all of the following (case sensitive, don't use WP Swift or Widget in title):
ACF Starter
_ACF_Starter_
_acf_starter_
-acf-starter-

2)
Change description in header and constructor

3)
Update README.md with new details

4) 
Replace the sample ACf field group included in _acf-field-group.php 
or remove the include and create a new field group using the ACF API.

*/

// Inclide the ACF group
// include "_acf-field-group.php";

class WP_Swift_ACF_Starter_Widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'wp_swift_acf_starter_widget',
            __( 'WP Swift: ACF Starter Widget', 'wp-swift-acf-starter-widget' ),
            array(
                'classname'   => 'wp_swift_acf_starter_widget',
                'description' => __( 'A starter widget for creating widgets using Advanced Custom Fields.', 'wp-swift-acf-starter-widget' )
                )
        );
       
        load_plugin_textdomain( 'wp-swift-acf-starter-widget', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }
 
    /**  
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {    
        include( plugin_dir_path( __FILE__ ) . '_wp-swift-widget.php');
    }
 
  
    /**
      * Sanitize widget form values as they are saved.
      *
      * @see WP_Widget::update()
      *
      * @param array $new_instance Values just sent to be saved.
      * @param array $old_instance Previously saved values from database.
      *
      * @return array Updated safe values to be saved.
      */
    public function update( $new_instance, $old_instance ) {        
        return $instance;
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
    public function form( $instance ) { 
      //The ACF API will handle this
    }
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'WP_Swift_ACF_Starter_Widget' );
});