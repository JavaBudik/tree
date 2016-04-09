<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="site-content-wrap">
	<div class="site-content">


		<div class="site-content-middle ">

			<div class="site-path">
				<?php if ( function_exists('yoast_breadcrumb') )
				{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			</div>
			<div class="h1-style"><h1><span><?php the_title(); ?></span></h1></div>
			<div class="content-box">
				<?php the_content(); ?>
			</div>
                <?php if( is_front_page() ) { ?>
                    <div class="dialog-window">
                        <div id="wrap"></div>
                        <div class="order-main"></div>
                    </div>
               <?php } ?>

		</div>
	</div>
	<aside class="left-sidebar">
		<?php get_sidebar(); ?>
	</aside>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
