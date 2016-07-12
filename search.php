<?php get_header(); ?>

<div class="page-header-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header-content">
					<div class="page-title">
						<h2>Search</h2>
					</div>
					<div class="page-description">
						<p>Results for: "<?php the_search_query(); ?>"</p>
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
						<div class="post-title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<h2><?php the_title(); ?></h2></a>
						</div>
						<?php if ($post->post_type == 'post') : ?>
							<div class="post-time">
								<p>
									<?php the_time('F j, Y') ?> on <?php  the_category(', ') ?>
								</p>
							</div>
						<?php endif; ?>
						<div class="post-data">
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>	
				</div>
			</div>

		<?php endwhile; ?>
		<?php else: ?>
			<div class="col-md-12">
				<div class="posts-not-found">
					<div class="post-title">
						<h3>Sorry, no posts matched your criteria</h3>

						<p><?php _e('You can do a new search here:', 'dspc'); ?></p>
					</div>	
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<div class="form-group">
							<input type="search" value="" class="form-control not-found-search-input" name="s" id="s" placeholder="Search here..." required/>
						</div>
						<button type="submit" class="rounded-button red-button mini-button" id="searchsubmit" value="Search"><i class="fa fa-search"></i>	</button>
					</form>
				</div>
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