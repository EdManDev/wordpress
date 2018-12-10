<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div class="pagehome clearfix" id="home_trusted">
		<div class="content_box">
		      <div class="Justfit-members-container" style="background: url(<?php if ($mts_options['mts_athletes_background_image'] != '') { ?><?php echo $mts_options['mts_athletes_background_image']; ?><?php } ?>);">
              <div class="Justfit-members">
                  <div class="featured-thumbnail">
                      <?php if ($mts_options['mts_athletes_image'] != '') { ?>
    		                  <img src="<?php echo $mts_options['mts_athletes_image']; ?>" width="311" height="381">
                      <?php } ?>
                  
                      <div class="Justfit-members-description description-1">
                          <?php if ($mts_options['mts_left_athletes_name'] != '') { ?><h2><?php echo $mts_options['mts_left_athletes_name']; ?></h2><?php } ?>
                          <?php if ($mts_options['mts_left_athletes_description'] != '') { ?><div class="front-view-content"><?php echo $mts_options['mts_left_athletes_description']; ?></div><?php } ?>
                      </div>

                      <div class="Justfit-members-description description-2">
                          <?php if ($mts_options['mts_right_athletes_name'] != '') { ?><h2><?php echo $mts_options['mts_right_athletes_name']; ?></h2><?php } ?>
                          <?php if ($mts_options['mts_right_athletes_description'] != '') { ?><div class="front-view-content"><?php echo $mts_options['mts_right_athletes_description']; ?></div><?php } ?>
                      </div>
                  </div>
              </div>
              <div class="Justfit-members-stories">
                  <?php if ($mts_options['mts_athletes_title'] != '') { ?><h2><?php echo $mts_options['mts_athletes_title']; ?></h2><?php } ?>
                  <?php if ($mts_options['mts_athletes_button_link'] != '') { ?><div class="readMore"><a style="background:<?php if ($mts_options['mts_athletes_button_color'] != '') { ?><?php echo $mts_options['mts_athletes_button_color']; ?><?php } ?>;" href="<?php echo $mts_options['mts_athletes_button_link']; ?>" title="Menu widget article" rel="nofollow"><?php echo $mts_options['mts_athletes_button_title']; ?></a></div><?php } ?>
              </div>
          </div>  <!--End of Members Area-->
    </div>
</div>
