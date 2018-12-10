<?php
$mts_options = get_option(MTS_THEME_NAME); ?>
<div class="pagehome clearfix" id="home_ambition">
    <div class="content_box">
        <div class="Justfit-ambition" style="background-image:url(<?php echo $mts_options['mts_ambition_background_image']; ?>); background-repeat: no-repeat; background-size: cover;">
            <?php if ($mts_options['mts_ambition_image'] != '') { ?>
                <div class="ambition-image"><img src="<?php echo $mts_options['mts_ambition_image']; ?>"  width="514" height="376" ></div>
            <?php } ?>
            <?php if ($mts_options['mts_ambition_title'] != '') { ?><h3 class=""><?php echo $mts_options['mts_ambition_title']; ?></h3><?php } ?>
            <?php if ($mts_options['mts_ambition_description'] != '') { ?><div class="subheading"><?php echo $mts_options['mts_ambition_description']; ?></div><?php } ?>
            <?php if(!empty($mts_options['mts_ambition_button'])) { ?>
                <div class="buttons">
                    <?php foreach( $mts_options['mts_ambition_button'] as $button ) : ?>
                        <div class="readMore" ><a style="background:<?php echo $button['mts_ambition_button_color']; ?>;" href="<?php echo $button['mts_ambition_button_link']; ?>" rel="nofollow"><?php echo $button['mts_ambition_button_label']; ?></a></div>
                    <?php endforeach;  ?>
                </div>
            <?php } ?>
        </div>  <!--End of Justfit Ambitions-->
    </div>
</div>