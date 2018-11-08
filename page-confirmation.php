<?php
/**
 * @package WordPress
 * @subpackage Highend
 * Author = MemberDev

/*
Template Name: Confirmation
*/

// custom fields
// $welcome_video = get_field('welcome_video');
// $welcome_content = get_field('welcome_content');

get_header(); ?>

<div id="primary" class="content-area">
	<div id="main" class="site-main" role="main">
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="page-section section-confirmation">
				<div class="container">
					<div class="rsp-grid">
						<div class="grid-container container-50">
							<h1><?php the_title(); ?></h1>

							<?php the_content(); ?>
						</div>
						<!--/.grid-container-->	
						<div class="grid-container container-50">
							<?php if ( $welcome_video ) : ?>
								<div class="md-video-container">
									<?php echo $welcome_video; ?>
								</div>
								<!--/.md-video-container-->	

								<hr/>
							<?php endif; ?>	

							<?php echo $welcome_content; ?>
						</div>
						<!--/.grid-container-->	
					</div>
					<!--/.rsp-grid-->
				</div>
				<!--/.container-->
			</div>
			<!--/.page-section-->
			
		<?php endwhile; ?>

	</div>
	<!--/.site-main-->
</div>
<!--/.content-area-->

<?php get_footer(); ?>