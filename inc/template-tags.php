<?php

//Display navigation to next/previous comments when applicable.
if(!function_exists('dspc_comment_nav')) :

	function dspc_comment_nav() {
		// Are there comments to navigate through?
		if(get_comment_pages_count() > 1 && get_option( 'page_comments' )) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<ul class="pager">
				<li class="previous">
					<?php
						if ($prev_link = get_previous_comments_link(__('<span aria-hidden="true">&larr;</span> Older Comments', 'dspc' ))) :
							printf($prev_link);
						endif;
					?>
				</li>
				<li class="next">
					<?php
						if ($next_link = get_next_comments_link(__('Newer Comments <span aria-hidden="true">&rarr;</span>', 'dspc' ))) :
							printf($next_link);
						endif;
					?>
				</li>
			</ul><!-- .nav-links -->
		</nav><!-- .comment-navigation -->
		<?php
		endif;
	}
endif;

//Custom logo tag
function dspc_the_custom_logo() {
	if (function_exists('the_custom_logo')){
		the_custom_logo();
	}
}

//Print social media icons
function dspc_social_media_icons(){
 
    $social_sites = dspc_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if(strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
    if(!empty($active_sites)){
		echo "<h3 class='widget-title'>Socialize</h3>";
    	echo "<ul class='social-media-icons'>";
			foreach ( $active_sites as $active_site ) {
	            /* setup the class */
		        $class = 'fa fa-' . $active_site;
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot(is_email(get_theme_mod($active_site))); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                            <span><?php echo ucfirst($active_site); ?></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr($class); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site); ?>"></i>
                            <span><?php echo ucfirst($active_site); ?></span>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
	}
}


?>