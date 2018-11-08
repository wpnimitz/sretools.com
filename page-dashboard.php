<?php
/**
 * @package WordPress
 * @subpackage Highend
 * Author = MemberDev

/*
Template Name: Dashboard
*/

// custom fields
//$welcome_video = get_field('welcome_video');
//$welcome_content = get_field('welcome_content');

get_header(); ?>

<div id="primary" class="content-area">
	<div id="main" class="site-main" role="main">
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="page-section">
				<div class="container">
					<h1><?php the_title(); ?></h1>

					<p class="headline">Welcome back, <?php echo $current_user->user_firstname; ?>!</p>

					<hr class="hr-full" />

					<div class="rsp-grid">
						<div class="grid-container container-50">
							<div class="metric metric-no-icon">
								<label class="metric-label">Current Plan</label>
								<h2 class="metric-title">
									<?php echo mm_member_data(array("name"=>"membershipName")); ?>
								</h2>
							</div>
							<!--/.metric-->
						</div>
						<!--/.grid-container-->
						<div class="grid-container container-25">
							<div class="metric metric-no-icon">
								<label class="metric-label">Customer Since</label>
								<h2 class="metric-title"><i class="fa fa-calendar icon-left"></i> <?php echo mm_member_data(array("name"=>"registrationDate", "dateFormat"=>"m/d/Y")); ?></h2>
							</div>
							<!--/.metric-->
						</div>
						<!--/.grid-container-->
						<div class="grid-container container-25">
							<div class="metric metric-no-icon">
								<label class="metric-label">Membership Status</label>
								<?php if ( mm_member_data(array("name"=>"statusName")) == "Active" ) : ?>
									<h2 class="metric-title color-green"><i class="fa fa-check-circle icon-left"></i> <?php echo mm_member_data(array("name"=>"statusName")); ?></h2>
								<?php else : ?>
									<h2 class="metric-title color-grey"><?php echo mm_member_data(array("name"=>"statusName")); ?></h2>
								<?php endif; ?>
							</div>
							<!--/.metric-->
						</div>
						<!--/.grid-container-->
					</div>
					<!--/.rsp-grid-->

					<hr class="hr-full" />

					<?php the_content(); ?>
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