<?php
/**
 * Template Name: Contact Page
 */
?>
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
						<header>
							<h1 class="title single-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
						</header>
						<div class="post-content box mark-links entry-content">
							<?php the_content(); ?>
							<?php mts_contact_form() ?>
						</div><!--.post-content box mark-links-->
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</article>
	<?php get_sidebar(); ?>
</div><!--#page-->
<?php get_footer(); ?>