<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mohamednajiub
 */

get_header();
?>

<?php
if (is_home() && !is_front_page()) :
?>
	<header class="page--header" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://via.placeholder.com/1220x400' ?>')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center align-items-center align-content-center">
				<h2 class="page--title"><?php single_post_title() ?></h2>
			</div>
		</div>
	</header>
<?php
endif;
?>

<main>
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center flex-wrap">
				<?php
				if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', get_post_type());

					endwhile;

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>
		</div>
	</section>

	<section class="pagination">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<?php
				the_posts_pagination(
					array(
						'screen_reader_text' => ' ',
						'prev_text' => '<i class="fas fa-chevron-left"></i>',
						'next_text' => '<i class="fas fa-chevron-right"></i>'
					)
				);
				?>
			</div>
		</div>
	</section>
</main>


<?php get_footer(); ?>
