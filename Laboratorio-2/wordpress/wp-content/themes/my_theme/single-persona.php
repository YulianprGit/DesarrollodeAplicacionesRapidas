<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar'): ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<?php astra_primary_content_top(); ?>

	<?php //astra_content_loop(); ?>

	<?php if (have_posts()):
		while (have_posts()):
			the_post(); ?>
			<h2 class="post-title"><?php the_title(); ?></h2>
			<div>
				<?php the_content(); ?>
				<p> <?php echo get_field('nombre') . " " . get_field('apellido'); ?> </p>
				<!-- <pre><?php //var_dump(get_field('foto')) ?></pre> -->
				<?php $foto = get_field('foto') ?>
				<img class="foto-persona" src="<?php echo $foto['url'] ?>" alt="<?php echo $foto['alt'] ?>" >
			</div>
		<?php endwhile; endif; ?>

	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar'): ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>