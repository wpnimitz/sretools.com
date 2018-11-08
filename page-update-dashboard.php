<?php
/**
 Author = Nimitz Batioco
 Template Name: Updated Dashboard
*/

//custom variables
$user_first_name = $current_user->user_firstname;
$full_name = $current_user->user_firstname . " " . $current_user->user_lastname;
$avatar = get_avatar_url( $current_user->ID, $size = '50' );
$kb_url = get_post_meta(get_the_ID(), 'page_member_knowledgebase', true);
$profile_url = get_post_meta(get_the_ID(), 'page_profile_url', true);



get_header(); ?>


<div class="member-content-area">
	<div id="main" class="site-main" role="main">
		<div class="member-dashboard-header">
			<div class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="kb">
				<a href="<?php echo $kb_url; ?>"><span class="fontawesome"><i class="icon-search"></i></span></a>
			</div>
			<div class="user-info">
				<div class="user-fullname">
					<a href="<?php echo $kb_url; ?>"><?php echo $full_name; ?></a>
				</div>
				<div class="user-image">
					<?php if($avatar) { ?>
					<a href="<?php echo $kb_url; ?>"><img src="<?php echo $avatar; ?>"></a>
					<?php } else {?>
					<span class="fontawesome"><i class="icon-user"></i></span>
					<?php } ?>
				</div>
			</div>
		</div>
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="page-section">
					<?php the_content(); ?>
			</div>
			<!--/.page-section-->
			
		<?php endwhile; ?>

	</div>
	<!--/.site-main-->
</div>
<!--/.content-area-->

<?php get_footer(); ?>