<?php
$mts_options = get_option(MTS_THEME_NAME); ?>
<div class="pagehome clearfix" id="home_meal">
    <div class="content_box">
        <div class="Justfit-ambition Justfit-meals Justfit-benefit-sections" style="background-image:url(<?php echo $mts_options['mts_meal_background_image']; ?>); background-repeat: no-repeat; background-size: cover;">
            <?php if ($mts_options['mts_meal_image'] != '') { ?>
                <div class="ambition-image"><img src="<?php echo $mts_options['mts_meal_image']; ?>" width="456" height="252"  ></div>
            <?php } ?>
                <?php if ($mts_options['mts_meal_title'] != '') { ?><h3 class=""><?php echo $mts_options['mts_meal_title']; ?></h3><?php } ?>
                <?php if ($mts_options['mts_meal_description'] != '') { ?><div class="subheading"><?php echo $mts_options['mts_meal_description']; ?></div><?php } ?>
            <?php if(!empty($mts_options['mts_meal'])) { ?>
                <?php foreach( $mts_options['mts_meal'] as $slide ) : ?>
                    <div class="Justfit-benefit-section">
                        <span class="benefit-icon"><?php if ( !empty( $slide['mts_meal_icon'] ) ) { ?><i class="fa fa-<?php echo $slide['mts_meal_icon']; ?>" ></i><?php } ?></span>
                        <header>
                            <h2 class="title front-view-title" itemprop="headline"><a href="<?php echo $slide['mts_meal_link']; ?>" ><?php echo $slide['mts_meal_text']; ?></a></h2>
                            <div class="front-view-content">
                                <?php echo $slide['mts_meal_description']; ?>
                            </div>
                        </header>
                    </div>
                <?php endforeach; ?>
            <?php } ?>
            <?php if(!empty($mts_options['mts_meal_button'])) { ?>
                <div class="buttons">
                    <?php foreach( $mts_options['mts_meal_button'] as $button ) : ?>
                        <div class="readMore" ><a style="background:<?php echo $button['mts_meal_button_color']; ?>;" href="<?php echo $button['mts_meal_button_link']; ?>" rel="nofollow"><?php echo $button['mts_meal_button_label']; ?></a></div>
                    <?php endforeach;  ?>
                </div>
            <?php } ?>
        </div>  <!--End of Justfit Meal-->
    </div>
</div>