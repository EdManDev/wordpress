<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
    <div class="container">
        <?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
            <?php mts_the_breadcrumb(); ?>
        <?php } ?>
		<div class="header-search">
           	<?php get_search_form(); ?>
        </div>
    </div>
</div> 
<div id="page" class="<?php mts_single_page_class(); ?>">
	<article class="<?php mts_article_class(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
		<?php if (mts_get_thumbnail_url()) : ?>
	        <meta itemprop="image" content="<?php echo mts_get_thumbnail_url(); ?>" />
	    <?php endif; ?>
		<div class="content_box" >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<?php
					// Single post parts ordering
					if ( isset( $mts_options['mts_single_post_layout'] ) && is_array( $mts_options['mts_single_post_layout'] ) && array_key_exists( 'enabled', $mts_options['mts_single_post_layout'] ) ) {
						$single_post_parts = $mts_options['mts_single_post_layout']['enabled'];
					} else {
						$single_post_parts = array( 'content' => 'content', 'related' => 'related', 'author' => 'author' );
					}
					foreach( $single_post_parts as $part => $label ) { 
						switch ($part) {
							case 'content':
								?>
								<div class="single_post">
									<?php $header_animation = mts_get_post_header_effect();
									if ( 'parallax' === $header_animation ) {?>
										<?php if (mts_get_thumbnail_url()) : ?>
									        <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
									    <?php endif; ?>
									<?php } else if ( 'zoomout' === $header_animation ) {?>
										 <?php if (mts_get_thumbnail_url()) : ?>
									        <div id="zoom-out-effect"><div id="zoom-out-bg" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div></div>
									    <?php endif; ?>										
									<?php } ?>

									<header>
										<h1 class="title single-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
										<?php mts_the_postinfo( 'single' ); ?>
									</header><!--.headline_area-->
									<div class="post-single-content box mark-links entry-content">
										<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
											<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
												<div class="topad">
													<?php echo do_shortcode($mts_options['mts_posttop_adcode']); ?>
												</div>
											<?php } ?>
										<?php } ?>
										<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] == 'top') mts_social_buttons(); ?>
										<div class="thecontent" itemprop="articleBody">
											<?php the_content(); ?>
										</div>
										<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
										<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
											<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
												<div class="bottomad">
													<?php echo do_shortcode($mts_options['mts_postend_adcode']); ?>
												</div>
											<?php } ?>
										<?php } ?> 
										<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] !== 'top') mts_social_buttons(); ?>
									</div><!--.post-single-content-->
								</div><!--.single_post-->
								<?php
							break;

							case 'tags':
								?>
								<?php mts_the_tags('<span class="tagtext">'.__('Tags', 'mythemeshop' ).':</span>',', ') ?>
								<?php
							break;

							case 'related':
								mts_related_posts();
							break;

							case 'author':
								?>
								<div class="postauthor">
									<h4><?php _e('About The Author', 'mythemeshop'); ?></h4>
									<div class="author_wrap">
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '91' );  } ?>
										<h5 class="vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow" class="fn"><?php the_author_meta( 'display_name' ); ?></a></h5>
										<?php if(!empty($mts_options['mts_authorbox_email_id'])){ ?><div class="email-box"><a href="mailto:<?php echo get_the_author_meta('email'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></div><?php } ?>
										<p><?php the_author_meta('description') ?></p>
									</div>
								</div>
							<?php break;
						}
					}
					?>
				</div><!--.g post-->
				<?php comments_template( '', true ); ?>
			<?php endwhile; /* end loop */ ?>
		</div>
	</article>
	<?php get_sidebar(); ?>
	</div><!--#page-->
<?php get_footer(); ?>