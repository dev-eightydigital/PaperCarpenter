<?php
/*
* Template Name: PC Latest News
*/

get_header();
?>

<?php
	$loop = new WP_QUERY( array(
		'post_type' => 'post'
	) );
	if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();
		?>
		<div class="et_pb_section">
			<div class="et_pb_row">
				
				<div class="row-fluid">
					<div class="span3">dsfd</div>
					<div class="span9">uytre</div>
				</div>
				
			</div>
		</div>
		
		<?php
	endwhile; endif;
?>

<?php
get_footer();
?>