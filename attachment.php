<?php get_header(); ?>
<?php $template_directory_uri = get_template_directory_uri(); ?>
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap-responsive.css" type="text/css" />

<?php $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="main-content">
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
				<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
				<p class="attachment">
					<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
						<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
					</a>
				</p>
				
				<?php else : ?>
					<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
				<?php endif; ?>
				
			</div>
		</div>

	</div> <!--span6-->
	
	
	<div class="span7 att-info">
		<h3 class="att-title"><?php the_title(); ?></h3>
		<div class="att-content"><?php echo nl2br($post->post_content); ?></div>
		<?php echo do_shortcode('[social_share/]'); ?>
	</div>
	
</div> <!--\row-fluid-->

<div id="tabs">
	<li><a href="#" data-title="tab-01">Vel ea hendrerit</a></li>
	<li><a href="#" data-title="tab-02">Additional Information</a></li>
	<li><a href="#" data-title="tab-03">Ex illum dignissim</a></li>
</div>
	
<div class="row-fluid post--container">
	<div class="span7 tab-content">
		<div class="tab-01">Dignissim facilisi ipsum ullamcorper dolore vulputate ea, suscipit eum duis delenit delenit nostrud. Esse vulputate ut aliquip at, consectetuer ut, volutpat, molestie autem ut sit lorem dolore illum ullamcorper zzril nonummy illum, duis accumsan in, augue enim tincidunt. Laoreet commodo elit amet feugiat nulla luptatum duis tincidunt nulla nulla minim velit feugait accumsan, magna minim, feugait nibh. Wisi vero erat duis ea magna eros enim exerci, vel.</div>
		
		<div class="tab-02">
			<h3 class="tabHead">Vel ea hendrerit molestie</h3>
			
			<div class="att-addinfo">
				<ol>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
				</ol>
			</div>
		</div>
		
		<div class="tab-03">Vel ea hendrerit molestie, accumsan zzril, iusto facilisis, eu tation odio iriure minim et elit nostrud dolore, te. Ex illum dignissim, ut blandit consequat ex blandit praesent hendrerit nostrud dolor nonummy suscipit facilisi. Feugait ullamcorper dolore vulputate ea, suscipit eum duis delenit. Iriure nostrud qui vulputate ut aliquip at, consectetuer ut, volutpat, molestie autem ut sit lorem dolore illum ullamcorper. Dolor nonummy illum, duis accumsan in, augue enim tincidunt wisi commodo elit amet feugiat nulla luptatum duis tincidunt nulla nulla minim velit feugait accumsan, magna minim. Ad nibh, sed vero erat duis ea magna eros enim exerci, vel ipsum, dignissim volutpat iusto wisi molestie vulputate.</div>
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

<?php get_footer(); ?>