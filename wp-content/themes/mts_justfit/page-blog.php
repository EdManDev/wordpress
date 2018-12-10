<?php
/**
 * Template Name: Blog
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
<div id="page">
    <div class="<?php mts_article_class(); ?>">
        <div class="content_box">
            <?php 
            $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => $paged,
                'ignore_sticky_posts'=> 1,
            );
            $latest_posts = new WP_Query( $args );

            global $wp_query;
            // Put default query object in a temp variable
            $tmp_query = $wp_query;
            // Now wipe it out completely
            $wp_query = null;
            // Re-populate the global with our custom query
            $wp_query = $latest_posts;

            if ( !is_paged() ) { ?>
                <?php $featured_categories = array();
                if ( !empty( $mts_options['mts_featured_categories'] ) ) {
                    foreach ( $mts_options['mts_featured_categories'] as $section ) {
                        $category_id = $section['mts_featured_category'];
                        $featured_categories[] = $category_id;
                        $posts_num = $section['mts_featured_category_postsnum'];
                        if ( 'latest' == $category_id ) { ?>
                           
                            <?php $j = 0; if( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                                <article class="latestPost excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>" itemscope itemtype="http://schema.org/BlogPosting">
                                    <?php mts_archive_post(); ?>
                                </article>
                            <?php endwhile; endif; ?>
                            
                            <?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
                                <?php mts_pagination(); ?>
                            <?php } ?>
                        <?php } 
                        else { // if $category_id != 'latest':
                            $j = 0;
                            $cat_query = new WP_Query('cat='.$category_id.'&posts_per_page='.$posts_num); ?>
                            <h3 class="featured-category-title"><a href="<?php echo esc_url( get_category_link( $category_id ) ); ?>" title="<?php echo esc_attr( get_cat_name( $category_id ) ); ?>"><?php echo esc_html( get_cat_name( $category_id ) ); ?></a></h3>
                            <?php if ( $cat_query->have_posts() ) : while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
                                <article class="latestPost excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>" itemscope itemtype="http://schema.org/BlogPosting">
                                    <?php mts_archive_post(); ?>
                                </article>
                            <?php
                            endwhile;
                        endif; wp_reset_query();
                        }
                    }
                }

            } else { //Paged

                $j = 0; if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                    <article class="latestPost excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>" itemscope itemtype="http://schema.org/BlogPosting">
                        <?php mts_archive_post(); ?>
                    </article>
                <?php endwhile; endif;
                if ( $j !== 0 ) { // No pagination if there is no posts
                    mts_pagination();
                }
                // Restore original query object
                $wp_query = $tmp_query;
                // Be kind; rewind
                wp_reset_postdata();
            } ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div><!--#page-->
<?php get_footer(); ?>