<?php get_header(); ?>
	<div class="video-wrapper">
		<video autoplay="autoplay" loop poster="<?php bloginfo('template_directory'); ?>/videos/abcd.jpg">
			<source src="<?php bloginfo('template_directory'); ?>/videos/abcd.webm" type="video/webm"> Your browser does not support the video tag. I suggest you upgrade your browser.
			<source src="<?php bloginfo('template_directory'); ?>/abcd.mp4" type="video/mp4"> Your browser does not support the video tag. I suggest you upgrade your browser.
			<source src="<?php bloginfo('template_directory'); ?>/abcd.ogv" type="video/ogv"> Your browser does not support the video tag. I suggest you upgrade your browser.
		</video>
		<div class="title-container">
        	<div class="headline">
          		<?php dspc_the_custom_logo(); ?>
                <h1 class="page-title"><?php bloginfo('name'); ?></h1>
                <h3 class="page-description"><?php bloginfo('description'); ?></h3>
            </div>
        </div>
		<div class="arrow">
        	<a data-scroll class="arrow-link" href="#content">
            	<h1 class="white-arrow">
                	<i class="fa fa-angle-down"></i>
                </h1>
            </a>
		</div>
	</div>
	<div id="content" class="container">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-md-12">
					<article class="post">
						<div class="post-content">
							<div class="post-title">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<h2><?php the_title(); ?></h2></a>
							</div>
							<div class="post-time">
								<p><?php the_time('F j, Y'); ?></p>
							</div>
							<div class="post-category">
								<p><?php the_category(', ') ?></p>
							</div>
							<?php if (has_post_thumbnail()) : ?>
								<div class="post-image">	
									<a class="thumbnail" href="<?php the_permalink(); ?>"  rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="post-data">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</article>
				</div>

			<?php endwhile; ?>
			<?php else: ?>
				<div class="col-md-12">
					<div class="posts-not-found">
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
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