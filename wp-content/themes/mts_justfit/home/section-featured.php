<?php
$mts_options = get_option(MTS_THEME_NAME); ?>
<?php if (!empty($mts_options['mts_featured_area_slides'])) { ?>
<div class="primary-slider">
<?php } ?>
    <div class="header-join" style="background:url(<?php if ($mts_options['mts_featured_background'] != '') { echo $mts_options['mts_featured_background']; } ?>) center center; background-color:#000;">
        <div class="join-description">
            <div class="container">
                <?php if ($mts_options['mts_featured_area_title'] != '') { ?><h2 class="title"><?php echo $mts_options['mts_featured_area_title']; ?> </h2><?php } ?>
                <?php if(!empty($mts_options['mts_featured_area_button'])) { ?>
                    <div class="buttons">
                        <?php foreach( $mts_options['mts_featured_area_button'] as $button ) : ?>
                            <div class="readMore" ><a style="background:<?php echo $button['mts_featured_area_button_color']; ?>;" href="<?php echo $button['mts_featured_area_button_link']; ?>" rel="nofollow"><?php echo $button['mts_featured_area_button_label']; ?></a></div>
                        <?php endforeach;  ?>
                    </div>
                <?php  } ?>
            </div> 
        </div>
    </div>
    <?php if (!empty($mts_options['mts_featured_area_slides']) && is_array($mts_options['mts_featured_area_slides'])) { 
        foreach ($mts_options['mts_featured_area_slides'] as $slide) { ?>
             <div class="header-join" style="background:url(<?php if ($slide['mts_featured_area_slide_image'] != '') { echo $slide['mts_featured_area_slide_image']; } ?>) center center; background-color:#000;">
                <div class="join-description">
                    <div class="container">
                        <?php if ($slide['mts_featured_area_slide_title'] != '') { ?><h2 class="title"><?php echo $slide['mts_featured_area_slide_title']; ?> </h2><?php } ?>
                        <?php if ( !empty($slide['mts_featured_area_slide_button_label'])) : ?>
                            <div class="buttons">
                                <div class="readMore" ><a style="background:<?php echo $slide['mts_featured_area_slide_button_color']; ?>;" href="<?php echo $slide['mts_featured_area_slide_button_link']; ?>" rel="nofollow"><?php echo $slide['mts_featured_area_slide_button_label']; ?></a></div>
                            </div>
                        <?php endif;  ?>
                    </div> 
                </div>
            </div>
         <?php } ?>
    <?php } ?>
<?php if (!empty($mts_options['mts_featured_area_slides'])) { ?>
</div>
<?php } ?>