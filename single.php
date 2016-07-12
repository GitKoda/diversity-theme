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
						<div class="post-time">
							<p><?php the_time('F j, Y'); ?> on <?php the_category(', ') ?></p>
						</div>
						<div class="post-image">	
							<?php if (has_post_thumbnail()) : ?>
								<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>
						</div>

						<div class="post-data">
							<?php the_content(); ?>
						</div>
						<div class="post-tags">
							<p><?php the_tags(); ?></p>
						</div>	
						<div class="social-data">
							<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
						</div>
						<div class="post-comments">	
						<?php 
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}	
						?>
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
		</div>

<?php get_footer(); ?>