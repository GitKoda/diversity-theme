<?php

/*
 * The template for displaying the header
 * Displays all of the head element and everything up until the main div.
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|',1,'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Le styles -->
        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5shiv.min.js"></script>
        <![endif]-->      
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                        <ul class="nav navbar-nav navbar-right">
                           	<li class="nav-icon">
                           		<a class="nav-icon-link" href="#search">
                           			<i class="fa fa-search nav-i"></i>
                           		</a>
                           	</li>
                            <li class="nav-icon">
                            	<a class="nav-icon-link" href="http://www.diversityschool.org/">
                            		<i class="fa fa-plane nav-i"></i>
                            	</a>
                            </li>
                            <li class="nav-icon">
								<a class="nav-icon-link" href="<?php echo get_home_url(); ?>">
									<i class="fa fa-home nav-i"></i>
								</a>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
        <main>