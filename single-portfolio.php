<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>" media="all">
<?php $template_directory_uri = get_template_directory_uri(); ?>
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap-responsive.css" type="text/css" />


<?php $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="single-portfolio">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$photographer = get_post_meta($post->ID, 'be_photographer_name', true);
$photographerurl = get_post_meta($post->ID, 'be_photographer_url', true);
?>

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">

<?php endif; ?>

<div class="row-fluid post--container">
	<div class="span5">
	
		<div class="photometa">
			<div class="entry-attachment">
			
			<?php the_content(); ?>
			
			</div>
		</div>

	</div> <!--span6-->
	
	
	<div class="span7 att-info">
		<h3 class="att-title"><?php the_title(); ?></h3>
		<div class="att-content"><?php the_excerpt(); ?></div>
		<?php echo do_shortcode('[social_share/]'); ?>
	</div>
	
</div> <!--\row-fluid-->

<div id="tabs">
	<li><a href="#" data-title="tab-01">Nostrud vulputate</a></li>
	<li><a href="#" data-title="tab-02">Blandit qui eros</a></li>
	<li><a href="#" data-title="tab-03">Vero vel elit</a></li>
</div>
	
<div class="row-fluid post--container">
	<div class="span7 tab-content">
		<div class="tab-01">
			<p><?php the_field("tab1"); ?></p>
		</div>
		
		<div class="tab-02">
			<div class="att-addinfo">
				<p><?php the_field("tab2"); ?></p>
			</div>
		</div>
		
		<div class="tab-03">
			<p><?php the_field("tab3"); ?></p>
		</div>
	</div>
	<div class="span5 form-interest"><?= do_shortcode('[contact-form-7 id="1096" title="Review"]'); ?></div>
</div>


<?php endwhile; ?>

<?php endif; ?>


<?php if ( ! $is_page_builder_used ) : ?>
		
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->
<script src="<?php echo $template_directory_uri; ?>/includes/bootstrap/js/bootstrap.js"></script>

<!-- codes for the tabs -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	function hideTabContent(){	$('.tab-content div').hide();	}
	function tabOut(){	$('#tabs li a').removeClass('selected');	}
	function showTabContent(target, tab){
		$(tab).addClass('selected');
		$('.tab-content .'+target)
			.show()
			.addClass('selected'); 
		$('.tab-content .'+target+' div').show(); }
		
	
	hideTabContent();
	showTabContent('tab-02', $('#tabs li a:eq('+1+')'));
	$('#tabs li a').click( function(e){
		e.preventDefault();
		hideTabContent();
		tabOut();
		
		target = $(this).attr('data-title');
		showTabContent(target, $(this));
		});
</script>
<!-- \codes for the tabs -->
<?php get_footer(); ?>