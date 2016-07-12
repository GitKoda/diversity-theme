<?php

/*
 * The template for displaying 404 pages (Not Found)
*/

get_header(); ?>
	<div class="page-header-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header-content">
						<div class="page-title">
							<h2><h1 class="page-title"><?php _e('Page Not Found', 'dspc'); ?></h1></h2>
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>
	<div id="content" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post">
					<div class="post-data text-center">
						<h3><?php _e('This is somewhat embarrassing, isn’t it?', 'dspc'); ?></h3>
						<p><?php _e('It looks like nothing was found at this location.', 'dspc'); ?></p>
						<button class="rounded-button red-button" onclick=" window.history.back()" role="button"><i class="fa fa-chevron-left"></i> <?php _e( 'Back', 'dspc' ); ?></button>
						<a class="rounded-button red-button" href="<?php echo get_home_url(); ?>" role="button"><i class="fa fa-home"></i> <?php _e( 'Home', 'dspc' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>