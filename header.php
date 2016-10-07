<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jbyalexa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="main-body">
<div class="container-fluid" id="header-nav">
<div class="container">
      <?php if ( has_nav_menu( 'primary' )  ) : ?>
      <nav class="navbar navbar-dark bg-faded">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
          &#9776;
        </button>
        <div id="exCollapsingNavbar2" class="collapse navbar-toggleable-xs">
        <a class="navbar-brand" href="<?php bloginfo('url')?>"><img src="<?php echo get_template_directory_uri().'/stylesheets/img/logo.png'; ?>"/></a>
        <form class="form-inline pull-xs-right search-header">
          <input class="form-control" type="text" placeholder="<?php _e('Search','jbyalexa'); ?>">
           <button class="btn" type="button"><i class="icon-search"></i></button>
        </form>
      			<?php
               wp_nav_menu([
                    'menu'            => 'primary',
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'container_id'    => 'exCollapsingNavbar2',
                    'container_class' => 'collapse navbar-toggleable-xs',
                    'menu_id'         => false,
                    'menu_class'      => 'nav navbar-nav pull-lg-right pull-md-right',
                    'depth'           => 1,
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
      			?>

        </div>
      </nav>
      <?php endif; ?>
    </div><!-- fin de .container-->
</div>
<div class="container">
  <div class="row">
			<!--	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


			$description = get_bloginfo( 'description', 'display' );-->
