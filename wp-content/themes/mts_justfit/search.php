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
    <div class="<?php mts_article_class(); ?>">
        <div class="content_box">
			<h1 class="postsby">
				<span><?php _e("Search Results for:", "mythemeshop"); ?></span> <?php the_search_query(); ?>
			</h1>
			<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="latestPost excerpt  <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>" itemscope itemtype="http://schema.org/BlogPosting">
					<?php mts_archive_post(); ?>
				</article><!--.post excerpt-->
			<?php endwhile; else: ?>
				<div class="no-results">
					<h2><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></h2>
					<?php get_search_form(); ?>
				</div><!--noResults-->
			<?php endif; ?>

			<?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
				<?php mts_pagination(); ?>
			<?php } ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>