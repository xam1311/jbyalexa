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
      <nav class="navbar navbar-light bg-faded">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
          &#9776;
        </button>
          <a class="navbar-brand" href="<?php bloginfo('url')?>">Jbyalexa</a>
      			<?php
               wp_nav_menu([
                    'menu'            => 'primary',
                    'theme_location'  => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'exCollapsingNavbar2',
                    'container_class' => 'collapse navbar-toggleable-xs',
                    'menu_id'         => false,
                    'menu_class'      => 'nav navbar-nav',
                    'depth'           => 2,
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
      			?>
      </nav>
      <?php endif; ?>
    </div><!-- fin de .container-->
</div>
<div class="container">
  <div class="row">
			<!--	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


			$description = get_bloginfo( 'description', 'display' );-->
