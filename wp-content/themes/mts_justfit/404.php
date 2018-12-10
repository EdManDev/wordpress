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
    <article class="<?php mts_article_class(); ?> single_post">
        <div class="content_box">
			<header>
				<div class="title">
					<h1><?php _e('Error 404 Not Found', 'mythemeshop'); ?></h1>
				</div>
			</header>
			<div class="post-content">
				<p><?php _e('Oops! We couldn\'t find this Page.', 'mythemeshop'); ?></p>
				<p><?php _e('Please check your URL or use the search form below.', 'mythemeshop'); ?></p>
				<?php get_search_form();?>
			</div><!--.post-content--><!--#error404 .post-->
		</div><!--#content-->
	</article>
	<?php get_sidebar(); ?>
	</div><!--#page-->
<?php get_footer(); ?>