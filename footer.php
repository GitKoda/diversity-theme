        </main>
        <footer>
            <div class="container">
               	<div class="widgets">
                	<div class="row">
                    	<?php
                        	if(is_active_sidebar('footer-sidebar-1')){
                            	dynamic_sidebar('footer-sidebar-1');
                            }
                            if(is_active_sidebar('footer-sidebar-2')){
                            	dynamic_sidebar('footer-sidebar-2');
                            }
                            if(is_active_sidebar('footer-sidebar-3')){
                               	dynamic_sidebar('footer-sidebar-3');
							}
						?>
               			<div class="col-md-3">	
                			<?php dspc_social_media_icons() ?>
                		</div>
                	</div>
                	<div class="row">

                	</div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                    	<div class="copyright">
                        	<p class="copyright-message text-center"><?php bloginfo('name'); ?>  <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="search">
			<button type="button" class="close">×</button>
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<input type="search" value="" name="s" id="s" placeholder="Search here..." required/>
				<button type="submit" class="search-button" id="searchsubmit" value="Search"><i class="fa fa-search"></i></button>
			</form>
		</div>
        <?php wp_footer(); ?>
    </body>
</html>