<?php
/*
Template Name: PaperCarpenter_Homepage2
*/
?>
<?php if ( ! isset( $_SESSION ) ) session_start(); ?>
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

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/fullscreen-style.css" media="all" />
	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<?php $plax_path = $template_directory_uri.'/js/plax/plax.js';?>
    <script type="text/javascript" src="<?php echo $plax_path; ?>"></script>
    <style type="text/css">
      * {
        margin: 0px;
        padding: 0px;
      }
      body {
        position: relative;
      }
      div#shell{
        z-index: 1;
      }
      img#plax-logo {
        position: relative;
        top: -10px;
        left: 0px;
        z-index: 3;
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#shell img').plaxify()
        $.plax.enable()
      })
    </script>
<!----------------- /PLAX -->


	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<div class="container">
		
		<div id="shell">
		<?php
			$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
				? $user_logo
				: $template_directory_uri . '/images/logo.png';
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="241" height="153" data-xrange="20" data-yrange="20" id="plax-logo" />
			</a>
		
			
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
	</div>
	<div class="clear"></div>
	</div>
</header>
	
	
	<?php $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->
	

<footer class="container">
Cardboard Carpentry&trade; is the process of converting a sheet of cardboard into a three-dimensional object that's as creative as you want it to be!
</footer>
	<?php wp_footer(); ?>
</body>
</html>