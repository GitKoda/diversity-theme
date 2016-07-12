<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="page-header-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header-content">
						<div class="page-title">
							<h2><?php the_title(); ?></h2>
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
					<div class="post-data">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
<?php endwhile;?>
<?php else: ?>
		<div class="row">
			<div class="col-md-8">
				<div class="post">
					<p><?php _e('Sorry, this page does not exist.'); ?></p>
				</div>
			</div>
		</div>
<?php endif; ?>
	</div>

<?php get_footer(); ?>