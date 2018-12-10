<?php

/*-----------------------------------------------------------------------------------

    Plugin Name: MyThemeShop calculator
    Description: A widget for Calculator Box
    Version: 1.0

-----------------------------------------------------------------------------------*/


// load widget
add_action( 'widgets_init', 'mts_calculator' );

// Register widget
function mts_calculator() {
    register_widget( 'mts_calculator' );
}

// Widget class
class mts_calculator extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
    
function __construct() {

    // Widget settings
    $widget_ops = array(
        'classname' => 'mts-calorie-calculator',
        'description' => __('A widget for Calculator', 'mythemeshop')
    );

    // Widget control settings
    $control_ops = array(
        'width' => 300,
        'height' => 350,
        'id_base' => 'mts_calculator'
    );

    // Create the widget
    parent::__construct( 'mts_calculator', __('MyThemeShop: Calorie Calculator', 'mythemeshop'), $widget_ops, $control_ops );
    
}

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    
function widget( $args, $instance ) {
    extract( $args );

    // Variables from the widget settings
    $title = apply_filters('widget_title', $instance['title'] );
    $unit = $instance['unit'];
    $metric = $instance['metric'];
    $imperial = $instance['imperial'];
    $age = $instance['age'];
    $height = $instance['height'];
    $weight = $instance['weight'];
    $goal = $instance['goal'];
    $button_text = $instance['button_text'];

    $error = $instance['error'];
    $result = $instance['result'];
    $footer = $instance['footer'];
    
    // Before widget (defined by theme functions file)
    echo $before_widget;

    // Display the widget title if one was input
    if ( $title )
        echo $before_title . $title . $after_title;
        
    // Display a containing div

    ?>
<div class="calculator_wrap">
<form>
      <div class="input-field change-unit"><?php if ( $unit ) { ?><span class="text"><?php echo $unit; ?></span><?php } ?>
        <div><input type="radio" name="unit" value="metric" id="cc-unit-metric"><label for="cc-unit-metric"><?php if ( $metric ) { ?><?php echo $metric; ?><?php } ?></label></div>
        <div><input type="radio" name="unit" value="imperial" id="cc-unit-imperial" checked="checked"><label for="cc-unit-imperial"><?php if ( $imperial ) { ?><?php echo $imperial; ?><?php } ?></label></div>
      </div>
      <div class="input-field">
        <?php if ( $age ) { ?><span class="text"><?php echo $age; ?></span><?php } ?>
        <span class="dropdown">
          <select name="age" id="cc-age">
            <?php
              for ($i=1; $i < 100; $i++) { 
                echo '<option value="'.$i.'"'.selected( $i, 24, 0 ).'>'.$i.'</option>';
              }
            ?>
          </select>
        </span>
      </div>
      <div class="input-field"><?php if ( $height ) { ?><span class="text"><?php echo $height; ?></span><?php } ?>
          <div class="imperial"><input type="text" name="feet" id="cc-feet" placeholder="ft'"><input type="text" name="inches" id="cc-inches" placeholder="inches''" class="input-2"></div>
          <div class="metric" style="display: none;"><input type="text" name="cm" id="cc-cm" placeholder="cm"></div>
      </div>
      <div class="input-field"><?php if ( $weight ) { ?><span class="text"><?php echo $weight; ?></span><?php } ?>
        <div class="imperial"><input type="text" name="weight" id="cc-lbs" placeholder="lbs."></div>
        <div class="metric" style="display: none;"><input type="text" id="cc-kg" name="weight_kg" placeholder="kg"></div>
      </div>

      <div class="input-field"><?php if ( $goal ) { ?><span class="text"><?php echo $goal; ?></span><?php } ?>
        <div class="imperial"><input type="text" id="cc-goal-lbs" name="goal" placeholder="lbs."></div>
        <div class="metric" style="display: none;"><input type="text" id="cc-goal-kg" name="goal" placeholder="kg"></div>
      </div>
      <div class="calculate"><a href="#"><?php if ( $button_text ) { ?><?php echo $button_text; ?><?php } ?></a></div>
</form>

<div class="calculator-results">

</div>

<div class="calculator-error">
    
</div>

<div class="calculator-footer">
    <?php if ( $footer ) { ?><?php echo $footer; ?><?php } ?>
</div>

</div>


    <?php
   
    // After widget (defined by theme functions file)
    echo $after_widget;

    wp_register_script( 'calorie-calculator', get_template_directory_uri() . '/js/caloriecalculator.js', array('jquery') );
    wp_localize_script( 'calorie-calculator', 'mts_calorie_calculator', array(
        'error' => $error,
        'result' => $result
    ) );
    wp_enqueue_script( 'calorie-calculator' );
}


/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Strip tags to remove HTML (important for text inputs)
    $instance['title'] = strip_tags( $new_instance['title'] );

    // No need to strip tags
    $instance['unit'] = $new_instance['unit'];
    $instance['metric'] = $new_instance['metric'];
    $instance['imperial'] = $new_instance['imperial'];
    $instance['age'] = $new_instance['age'];
    $instance['height'] = $new_instance['height'];
    $instance['weight'] = $new_instance['weight'];
    $instance['goal'] = $new_instance['goal'];
    $instance['button_text'] = $new_instance['button_text'];

    $instance['error'] = $new_instance['error'];
    $instance['result'] = $new_instance['result'];
    $instance['footer'] = $new_instance['footer'];

    return $instance;
}

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
function form( $instance ) {

    // Set up some default widget settings
    $defaults = array(
        'title' => '',
        'unit' => __('Unit', 'mythemeshop'),
        'metric' => __('Metric', 'mythemeshop'),
        'imperial' => __('Imperial', 'mythemeshop'),
        'age' => __('Age', 'mythemeshop'),
        'weight' => __('Weight', 'mythemeshop'),
        'height' => __('Height', 'mythemeshop'),
        'goal' => __('Goal', 'mythemeshop'),
        'button_text' => __('Calculate', 'mythemeshop'),

        'error' => __('Please fill in all fields!', 'mythemeshop'),
        'result' => __('The estimated number of calories you burn a day is %1$s. You can reach your goal weight in %2$s weeks with a %3$s cal/day diet.', 'mythemeshop'),
        'footer' => __('This is an estimate based on a moderate activity level.  This tool is not relevant to children or pregnant women.', 'mythemeshop')
    );
    
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <!-- Widget Title: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'unit' ); ?>"><?php _e('Unit Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'unit' ); ?>" name="<?php echo $this->get_field_name( 'unit' ); ?>" value="<?php echo $instance['unit']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'metric' ); ?>"><?php _e('Metric Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'metric' ); ?>" name="<?php echo $this->get_field_name( 'metric' ); ?>" value="<?php echo $instance['metric']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'imperial' ); ?>"><?php _e('Imperial Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'imperial' ); ?>" name="<?php echo $this->get_field_name( 'imperial' ); ?>" value="<?php echo $instance['imperial']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'age' ); ?>"><?php _e('Age Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'age' ); ?>" name="<?php echo $this->get_field_name( 'age' ); ?>" value="<?php echo $instance['age']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'weight' ); ?>"><?php _e('Weight Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'weight' ); ?>" name="<?php echo $this->get_field_name( 'weight' ); ?>" value="<?php echo $instance['weight']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'goal' ); ?>"><?php _e('My Goal Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'goal' ); ?>" name="<?php echo $this->get_field_name( 'goal' ); ?>" value="<?php echo $instance['goal']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e('Button Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo $instance['button_text']; ?>" />
    </p>


    <p>
        <label for="<?php echo $this->get_field_id( 'error' ); ?>"><?php _e('Error Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error' ); ?>" name="<?php echo $this->get_field_name( 'error' ); ?>" value="<?php echo $instance['error']; ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'result' ); ?>"><?php _e('Result Text:', 'mythemeshop') ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'result' ); ?>" name="<?php echo $this->get_field_name( 'result' ); ?>"><?php echo esc_textarea( $instance['result'] ); ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'footer' ); ?>"><?php _e('Footer Text:', 'mythemeshop') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'footer' ); ?>" name="<?php echo $this->get_field_name( 'footer' ); ?>" value="<?php echo $instance['footer']; ?>" />
    </p>
    <!-- Ad image url: Text Input -->
    
    <?php
    }
}
?>