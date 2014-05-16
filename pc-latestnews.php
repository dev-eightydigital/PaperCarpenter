<?php
/*
* Template Name: PC Latest News
*/
global $more; //since this is a custom template, we need to declare this to allow more... on this page
// further code $more=0 inside the loop to allow texts before more tag... $more=1 shows all texts
get_header();
?>
<?php $template_directory_uri = get_template_directory_uri(); ?>
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo $template_directory_uri; ?>/includes/bootstrap/css/bootstrap-responsive.css" type="text/css" />

<div class="et_pb_section">
			<div class="et_pb_row">
					<?php
						$loop = new WP_QUERY( array(
							'post_type' => 'post',
							'posts_per_page' => 2, 
							'paged' => $paged
						) );
						if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();
							?>
							<div class="row-fluid post--container">
								<div class="span3"><?php the_post_thumbnail('PaperCarp-featimg'); ?></div>
								<div class="span9">
									<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
									<div class="meta"><?php et_divi_post_meta(); ?></div>
									<div class="the_content"><?php $more = 0; the_content('read more'); ?></div>
								</div>
							</div>
							<?php
						endwhile; endif;
					?>
			</div>
		</div>
		
<div class="et_pb_row">
	<center class="pc-pagin">
	<?php 
	$total = $loop->max_num_pages;
	// only bother with the rest if we have more than 1 page!
	if ( $total > 1 )  {
		 // get the current page
		 if ( !$current_page = get_query_var('paged') )
			  $current_page = 1;
		 // structure of "format" depends on whether we're using pretty permalinks
		 $format = get_option('permalink_structure') ? 'page/%#%' : 'page/%#%/';
		 echo paginate_links(array(
			  'base' => get_pagenum_link(1) . '%_%',
			  'format' => $format,
			  'current' => $current_page,
			  'total' => $total,
			  'mid_size' => 4,
			  'type' => 'list'
		 ));
	}
	?>	
	</center>
</div>
<script src="<?php echo $template_directory_uri; ?>/includes/bootstrap/js/bootstrap.js"></script>
<?php
get_footer();
?>