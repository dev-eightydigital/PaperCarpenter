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
	<li><a href="#" data-title="tab-01">Vel ea hendrerit</a></li>
	<li><a href="#" data-title="tab-02">Nostrud enim lobortis</a></li>
	<li><a href="#" data-title="tab-03">Ex illum dignissim</a></li>
</div>
	
<div class="row-fluid post--container">
	<div class="span7 tab-content">
		<div class="tab-01">
			<p>Dignissim facilisi ipsum ullamcorper dolore vulputate ea, suscipit eum duis delenit delenit nostrud. Esse vulputate ut aliquip at, consectetuer ut, volutpat, <strong>molestie autem ut sit lorem</strong> dolore illum ullamcorper zzril nonummy illum, duis accumsan in, augue enim tincidunt.</p>
			 <p>Laoreet commodo elit amet feugiat nulla luptatum <a href="#">duis tincidunt nulla nulla minim</a> velit feugait accumsan, magna minim, feugait nibh. Wisi vero erat duis ea magna eros enim exerci, vel.</p>
		</div>
		
		<div class="tab-02">
			<div class="att-addinfo">
				<ol>
					<li>
						<h6>Nulla esse suscipit luptatum</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
					<li>
						<h6>Volutpat amet vero quis aliquip ex</h6>
						<p>Euismod quis volutpat blandit iusto et duis te nulla duis autem, vero velit suscipit, at sed feugait dignissim ad zzril blandit. Nisl iriure, feugiat vero, feugait, iriure et, nonummy aliquip accumsan velit, dolor praesent accumsan dolore delenit hendrerit amet vero enim dolor in. Et ut consequat, dignissim vel consectetuer molestie dignissim ea ut elit sed, accumsan quis iriure nostrud vulputate.</p>
					</li>
					<li>
						<h6>Augue dolor in qui ut consequat</h6>
						<p>Suscipit qui ea illum luptatum accumsan vel nulla, at ex tincidunt consequat in qui tation eros ex ut, qui. In ad dolore iusto nonummy, euismod, vulputate dolor praesent nulla ut vel augue dignissim consequat ut erat.</p>
					</li>
					<li>
						<h6>Duis consequat ut erat</h6>
						<p>Nibh luptatum, nisl, iusto duis minim ullamcorper blandit nostrud, feugiat blandit esse dolore consequat adipiscing. Vel sit ad, in feugait luptatum eu eros wisi facilisis diam wisi sit, in amet vero quis aliquip ex, te ullamcorper ad qui ea illum luptatum.</p>
					</li>
					<li>
						<h6>Accumsan illum vulputate autem</h6>
						<p>Autem, feugait at minim vero duis accumsan zzril ut illum elit vero in molestie suscipit vulputate feugait, ullamcorper zzril ea delenit blandit dolore minim in.</p>
					</li>
				</ol>
			</div>
		</div>
		
		<div class="tab-03">
			<blockquote>Vel ipsum ut enim magna exerci veniam facilisis facilisis delenit illum, ut nulla ut, in praesent facilisi consectetuer. Euismod quis volutpat blandit iusto et duis te nulla duis autem, vero velit suscipit, at sed feugait dignissim ad zzril blandit.</blockquote>
			<p>Nisl iriure, feugiat vero, feugait, iriure et, nonummy aliquip accumsan velit, dolor praesent accumsan dolore delenit hendrerit amet vero enim dolor in. Et ut consequat, dignissim vel consectetuer molestie dignissim ea ut elit sed, accumsan quis iriure nostrud vulputate. Duis nulla exerci eu hendrerit illum vulputate autem commodo nibh euismod.</p>
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