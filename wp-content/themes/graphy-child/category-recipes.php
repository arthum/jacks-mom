<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Graphy
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
			/* Sort the query by title. */
		
			global $query_string;
			query_posts( $query_string . '&orderby=title&order=ASC' );
		?>
				
		<?php
			/* Do not use pagination. Get all posts. */

			global $wp_query;
			query_posts(
				array_merge(
					$wp_query->query,
					array('posts_per_page' => -1)
				)
			);
		?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header"><h1 class="page-title">Recipes</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>

				<ul>
					<?php while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
