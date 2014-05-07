<?php 
define('FULLSCREEN_HOMEPAGE', 763);
if ( ! isset( $_SESSION ) ) session_start(); ?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->
	
	<?php if( is_page(FULLSCREEN_HOMEPAGE) ): //page id of homepage set for the fullscreen background ?>
		<link rel="stylesheet" href="<?= $template_directory_uri?>/fullscreen-style.css" media="all" />
	<?php endif;?>
	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="main-header">
		<div class="container clearfix">
			<div id="shell">
				<?php
					$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
						? $user_logo
						: $template_directory_uri . '/images/logo.png';
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img id="logo" src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					</a>
					<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
					<div id="et-top-navigation">
						<nav id="top-menu-nav">
						<?php
							$menuClass = 'nav';
							if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
							$primaryNav = '';
		
							$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );
		
							if ( '' == $primaryNav ) :
						?>
						<?php wp_nav_menu('Paper Carpenter'); ?>
							<ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
								<?php //if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
									<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
								<?php //}; ?>
		
								<?php show_page_menu( $menuClass, false, false ); ?>
								<?php show_categories_menu( $menuClass, false ); ?>
							</ul>
						<?php
							else :
								echo( $primaryNav );
							endif;
						?>
						</nav>
						
						<div id="et_top_search">
							<span id="et_search_icon"></span>
							<form role="search" method="get" class="et-search-form et-hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
								printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
									esc_attr_x( 'Search &hellip;', 'placeholder', 'Divi' ),
									get_search_query(),
									esc_attr_x( 'Search for:', 'label', 'Divi' )
								);
							?>
							</form>
						</div>
						<div class="social-icons">
						<ul>
						<li><a href="#" class="icon-fb"></a></li>
						<li><a href="#" class="icon-tw"></a></li>
						<li><a href="#" class="icon-yt"></a></li>
						<li><a href="#" class="icon-ig"></a></li>
						</ul>
						</div>
		
						<?php do_action( 'et_header_top' ); ?>
						<div class="clear"></div>
					</div> <!-- #et-top-navigation -->
			</div>
		</div> <!-- .container -->
	</header> <!-- #main-header -->
	
<script type="text/javascript">
var templateUrl = '<?= get_bloginfo("template_url"); ?>';
</script>