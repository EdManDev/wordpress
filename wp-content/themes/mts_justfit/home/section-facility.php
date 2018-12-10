<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div class="pagehome clearfix" id="home_facility">
    <div class="content_box">
        <div class="Justfit-facility-sections Justfit-benefit-sections">
          <?php if ($mts_options['mts_facility_title'] != '') { ?><h3 class=""><?php echo $mts_options['mts_facility_title']; ?></h3><?php } ?>
          <?php if ($mts_options['mts_facility_description'] != '') { ?><div class="benefit-subheading facility-subheading"><?php echo $mts_options['mts_facility_description']; ?></div><?php } ?>
          <?php if(!empty($mts_options['mts_facility'])) { ?>
              <?php foreach( $mts_options['mts_facility'] as $slide ) : ?>
                <div class="Justfit-facility-section">
                    <?php echo wp_get_attachment_image( $slide['mts_facility_image'], 'facility', false, array('title' => '') ); ?>
                    <header>
          	            <h2 class="title front-view-title" itemprop="headline">
                          <?php if($slide['mts_facility_link']) { ?>
                            <a href="<?php echo $slide['mts_facility_link']; ?>">
                          <?php } ?>
                            <?php echo $slide['mts_facility_text']; ?>
                          <?php if($slide['mts_facility_link']) { ?>
                            </a>
                          <?php } ?>
                        </h2>
          	            <div class="front-view-content">
          		              <?php echo $slide['mts_facility_description']; ?>
          		          </div>
        	          </header>
      	        </div> 
      	      <?php endforeach; ?>
          <?php } ?>
    	  </div> <!--End of facility sections-->
    </div>
</div>