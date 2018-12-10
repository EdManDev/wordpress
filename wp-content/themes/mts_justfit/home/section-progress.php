<?php
$mts_options = get_option(MTS_THEME_NAME); ?>
<div class="Justfit-Progress" style="background-image:url(<?php echo $mts_options['mts_progress_background_image']; ?>); background-repeat: no-repeat; background-size: cover;">
  <div class="Justfit-heading">
    <div class="container">  
      <?php if ($mts_options['mts_progress_title'] != '') { ?><h3 class=""><?php echo $mts_options['mts_progress_title']; ?></h3><?php } ?>
      <?php if ($mts_options['mts_progress_description'] != '') { ?><div class="subheading"><?php echo $mts_options['mts_progress_description']; ?></div><?php } ?>
    </div>
  </div>  
  <div class="container">
    <div class="Justfit-Progress-Videos">
      <?php if(!empty($mts_options['mts_progress']))
      {
      ?>
        <?php foreach( $mts_options['mts_progress'] as $slide ) : ?>
          <div class="Justfit-Progress-Video">
            <a href="<?php echo $slide['mts_progress_link']; ?>" class="popup-link"><?php echo wp_get_attachment_image( $slide['mts_progress_image'], 'full', false, array('title' => '') ); ?>
              <span class="play-icon"><i class="fa fa-play"></i></span>
            </a>
          </div>
        <?php endforeach; ?>
      <?php } ?>
    </div>
    <?php if(!empty($mts_options['mts_progress_button']))
    {
    ?>
      <div class="buttons">
        <?php foreach( $mts_options['mts_progress_button'] as $button ) : ?>
          <div class="readMore" ><a style="background:<?php echo $button['mts_progress_color']; ?>;" href="<?php echo $button['mts_progress_button_link']; ?>" rel="nofollow"><?php echo $button['mts_progress_button_label']; ?></a></div>
        <?php endforeach;  ?>
      </div>
    <?php  }
    ?>
  </div>
</div>