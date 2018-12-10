<?php

/*-----------------------------------------------------------------------------------

    Plugin Name: MyThemeShop About Author
    Description: A widget for Author Box
    Version: 1.0

-----------------------------------------------------------------------------------*/


// load widget
add_action( 'widgets_init', 'mts_about_author' );

// Register widget
function mts_about_author() {
    register_widget( 'mts_about_author' );
}

// Widget class
class mts_about_author extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
    
function __construct() {

    // Widget settings
    $widget_ops = array(
        'classname' => 'mts_about_author',
        'description' => __('A widget for About Us', 'mythemeshop')
    );

    // Widget control settings
    $control_ops = array(
        'width' => 300,
        'height' => 350,
        'id_base' => 'mts_about_author'
    );

    // Create the widget
    parent::__construct( 'mts_about_author', __('MyThemeShop: About Us', 'mythemeshop'), $widget_ops, $control_ops );
    
}

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    
function widget( $args, $instance ) {
    extract( $args );

    // Variables from the widget settings
    $title = apply_filters('widget_title', $instance['title'] );
    $img_uri = $instance['img_uri'];
    $description = $instance['description'];

    // Before widget (defined by theme functions file)
    echo $before_widget;

    // Display the widget title if one was input
    if ( $title )
        echo $before_title . $title . $after_title;
        
    // Display a containing div

    ?>

    <div class="aboutus_wrap"> 
        <div class="featured-thumbnail">
            <img src="<?php echo $img_uri; ?>" class="attachment-featured wp-post-image" width="55" height="56">
        </div>  
         
        <?php if ( $description ) { ?><div class="heading"><?php echo $description; ?></div><?php } ?>
    </div> 
    <?php
   
    // After widget (defined by theme functions file)
    echo $after_widget;
}


/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Strip tags to remove HTML (important for text inputs)
    $instance['title'] = strip_tags( $new_instance['title'] );

    // No need to strip tags
    $instance['img_uri'] = $new_instance['img_uri'];
    $instance['description'] = $new_instance['description'];

    return $instance;
}

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
function form( $instance ) {

    // Set up some default widget settings
    $defaults = array(
        'title' => '',
        'img_uri' => get_template_directory_uri()."/images/logo-only.png",
        'description' => 'Nullam laoreet pretium tellus non euismod. Proin nec varius mauris, at porta tellus.',
    );
    
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <!-- Widget Title: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <!-- Ad image url: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'img_uri' ); ?>"><?php _e('image url:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'img_uri' ); ?>" name="<?php echo $this->get_field_name( 'img_uri' ); ?>" value="<?php echo $instance['img_uri']; ?>" />
    </p>
    
    <!-- Ad link url: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Description:', 'mythemeshop') ?></label>
        <input type="textarea" class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo $instance['description']; ?>" />
    </p>
    
    <?php
    }
}
?>