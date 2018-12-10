<?php
$mts_options = get_option(MTS_THEME_NAME);
?>
<div class="pagehome clearfix" id="home_training">
	<div class="container">
		<div class="content_box">
			<?php if ($mts_options['mts_training_title'] != '') { ?><h3 class="featured-category-title"><?php echo $mts_options['mts_training_title']; ?></h3><?php } ?>
			<div class="Justfit-train-sections">
				<?php if(!empty($mts_options['mts_training'])) { ?>
					<?php foreach( $mts_options['mts_training'] as $slide ) : ?>
						<div class="Justfit-train-section">
							<?php if($slide['mts_training_link']) { ?>
					  			<a href="<?php echo $slide['mts_training_link']; ?>" rel="nofollow" class="post-image post-image-left">
					  		<?php } ?>
								<div class="featured-thumbnail">
									<?php echo wp_get_attachment_image( $slide['mts_training_image'], 'full', false, array('title' => '') ); ?>
								</div>
								<header>
								   <h2 class="title front-view-title" itemprop="headline"><?php echo $slide['mts_training_text']; ?></h2>
								</header>
							<?php if($slide['mts_training_link']) { ?>
								</a>
							<?php } ?>
							<div class="train-section-hover">
								<div class="hover-image"> <?php echo wp_get_attachment_image( $slide['mts_training_image'], 'full', false, array('title' => '') ); ?></div>
								<header>
									<h2 class="title front-view-title" itemprop="headline"><?php echo $slide['mts_training_text']; ?></h2>
								</header>
								<div class="front-view-content"><?php echo $slide['mts_training_description']; ?></div>
							</div>	
						</div>		   
					<?php endforeach; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>