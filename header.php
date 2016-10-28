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
<meta name="viewport" content="width=device-width, minimum-scale=1.0,initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="main-body">
<div class="container-fluid" id="header-nav">

      <?php if ( has_nav_menu( 'primary' )  ) : ?>
      <nav class="navbar navbar-dark bg-faded navbar-fixed-top">
      <div class="container">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
          &#9776;
        </button>
        <a class="navbar-brand hidden-sm-up pull-xs-right" href="<?php bloginfo('url')?>"><img src="<?php echo get_template_directory_uri().'/stylesheets/img/logo.png'; ?>"/></a>
        <div id="exCollapsingNavbar2" class="collapse navbar-toggleable-xs">
        <a class="navbar-brand hidden-sm-down" href="<?php bloginfo('url')?>"><img src="<?php echo get_template_directory_uri().'/stylesheets/img/logo.png'; ?>"/></a>
        <form action="<?php bloginfo('url')?>" id="searchform" method="get" role="search" class="form-inline pull-xs-right search-header hidden-sm-down">
           <input class="form-control form-hide" type="text" placeholder="<?php _e('Search','jbyalexa'); ?>" name="s" id="search" value="<?php the_search_query(); ?>">
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
                    'depth'           => 2,
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
      			?>

        </div>
      </div><!-- fin de .container-->
      </nav>
      <?php endif; ?>

</div>
<div class="container">
  <div class="row">
