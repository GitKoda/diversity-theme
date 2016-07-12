<?php get_header(); ?>

<div class="page-header-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header-content">
					<div class="page-title"> 
						<h2><?php single_tag_title(); ?></h2>
					</div>
					<div class="page-description"> 
						<?php echo tag_description(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>  
</div>
	
<div id="content" class="container">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-12">
				<div class="post">
					<div class="post-content">
						<div class="post-title text-center">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<h2><?php the_title(); ?></h2></a>
						</div>
						<div class="post-time">
							<p><?php the_time('F j, Y'); ?></p>
						</div>
						<div class="post-category">
							<p><?php the_category(', ') ?></p>
						</div>
						<div class="post-data">
							<p><?php the_excerpt(); ?></p>
						</div>	
					</div>
				</div>
			</div>

		<?php endwhile; ?>
		<?php else: ?>
			<div class="col-md-12">	
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			</div>
		<?php endif; ?>
		<?php if (is_paginated()) : ?>
			<div class="col-md-12">
				<nav>
					<ul class="pager">
						<li class="previous">
							<?php next_posts_link('<span aria-hidden="true">&larr;</span> Older posts'); ?>
						</li>
						<li  class="next">
							<?php previous_posts_link('Newer posts <span aria-hidden="true">&rarr;</span>'); ?>
						</li>
					</ul>
				</nav>
			</div>
		<?php endif; ?>			
	</div>     
</div>	
	
<?php get_footer(); ?>