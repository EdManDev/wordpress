<?php
$mts_options = get_option(MTS_THEME_NAME);
?>
<div class="pagehome clearfix" id="home_benefits">
	<div class="content_box">
		<div class="Justfit-benefit-sections">
			<?php if ($mts_options['mts_benefits_title'] != '') { ?><h3 class=""><?php echo $mts_options['mts_benefits_title']; ?></h3><?php } ?>
			<?php if ($mts_options['mts_benefits_description'] != '') { ?><div class="benefit-subheading"><?php echo $mts_options['mts_benefits_description']; ?></div><?php } ?>
			<?php if(!empty($mts_options['mts_benefits']))
			{
			?>
				<?php foreach( $mts_options['mts_benefits'] as $benefit ) : ?>
					<div class="Justfit-benefit-section">
						<span class="benefit-icon" style="background:<?php echo $benefit['mts_benefits_icon_color']; ?>"><?php if ( !empty( $benefit['mts_benefits_icon'] ) ) { ?><i class="fa fa-<?php echo $benefit['mts_benefits_icon']; ?>" ></i><?php } ?></span>
						<header>
							<h2 class="title front-view-title" itemprop="headline">
								<?php if($benefit['mts_benefits_link']) { ?>
									<a href="<?php echo $benefit['mts_benefits_link']; ?>" >
								<?php } ?>
									<?php echo $benefit['mts_benefits_text']; ?>
								<?php if($benefit['mts_benefits_link']) { ?>
									</a>
								<?php } ?>
							</h2>
							<div class="front-view-content">
								<?php echo $benefit['mts_benefits_description']; ?>
							</div>
						</header>
					</div>
				<?php endforeach; ?>
			<?php } ?>
		</div>
	</div>
</div>