<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
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
		<div class="content_box" >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
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
						</header>
						<div class="post-content box mark-links entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
						</div><!--.post-content box mark-links-->
					</div>
				</div>
				<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
		</div>
	</article>
	<?php get_sidebar(); ?>
</div><!--#page-->
<?php get_footer(); ?>