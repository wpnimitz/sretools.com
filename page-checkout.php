<?php
/**
 * @package WordPress
 * @subpackage Highend
 * Author = MemberDev

/*
Template Name: Checkout
*/

get_header(); ?>

<div id="primary" class="content-area">
	<div id="main" class="site-main" role="main">
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="page-section section-checkout">
				<div class="container">
					<div class="md-checkout checkout-columns">
						<?php the_content(); ?>
					</div>
					<!--/.checkout-container-->
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