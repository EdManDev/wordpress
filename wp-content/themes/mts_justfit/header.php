<!DOCTYPE html>

<?php $mts_options = get_option(MTS_THEME_NAME); ?>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php mts_meta(); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body id="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">       

	<div class="main-container">

		<header class="main-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

		 	<div id="header"> 

		   		<div class="container"> 

		   			<div class="logo-wrap">

						<?php if ($mts_options['mts_logo'] != '') { ?>

							<?php if( is_front_page() || is_home() || is_404() ) { ?>

								<h1 id="logo" class="image-logo" itemprop="headline">

									<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if (!empty($mts_options['mts_logo2x'])) { echo ' data-at2x="'.$mts_options['mts_logo2x'].'"'; } ?>></a>

								</h1><!-- END #logo -->

							<?php } 

							else { ?>

								<h2 id="logo" class="image-logo" itemprop="headline">

									<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"<?php if (!empty($mts_options['mts_logo2x'])) { echo ' data-at2x="'.$mts_options['mts_logo2x'].'"'; } ?>></a>

								</h2><!-- END #logo -->

							<?php } ?>

						<?php } 

						else { ?>

							<?php if( is_front_page() || is_home() || is_404() ) { ?>

								<h1 id="logo" class="text-logo" itemprop="headline">

									<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>

								</h1><!-- END #logo -->

							<?php } 

							else { ?>

								<h2 id="logo" class="text-logo" itemprop="headline">

									<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>

								</h2><!-- END #logo -->

							<?php } ?>

						<?php } ?>

					</div>

					

					<?php if ( $mts_options['mts_show_cart_buttons'] == '1' ) { 

						mts_cart();

					}



					if ( $mts_options['mts_show_primary_nav'] == '1' ) { ?>

			    		<div class="primary-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

					 		<a href="#" id="pull" class="toggle-mobile-menu"><?php _e( 'Menu', 'mythemeshop' ); ?></a>

							<nav id="navigation" class="clearfix mobile-menu-wrapper">

								<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>

									<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>

								<?php } else { ?>

									<ul class="menu clearfix">

										<?php wp_list_pages('title_li='); ?>

									</ul>

								<?php } ?>

							</nav>

			       		</div>

					<?php } ?>

				</div>

			</div>

		</header>