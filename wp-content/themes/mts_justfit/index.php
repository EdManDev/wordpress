<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php if ( is_array( $mts_options['mts_homepage_layout'] ) && array_key_exists( 'enabled', $mts_options['mts_homepage_layout'] ) ) {
    $homepage_layout = $mts_options['mts_homepage_layout']['enabled'];
} else {
    $homepage_layout = array();
}
get_header(); ?>
<?php foreach( $homepage_layout as $key => $section ) { get_template_part( 'home/section', $key ); } ?>
<?php get_footer(); ?>