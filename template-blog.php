<?php

/**
 * Template Name: Blog Page
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="main-middle-content">
		<div class="blog-post">
			<div class="blog-page-title">
				<p>LET'S BLOG</p>
			</div>
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();
			?>
				<div class="blog-element">
					<h2 class="blog-title"><?php the_title(); ?></h2>
					<div class="blog-content">
						<div class="blog-item">
							<?php the_post_thumbnail(array(220, 153)); ?>
						</div>
						<div class="blog-content-des">
							<p class="post-date"><?php the_date(); ?></p>
							<p class="post-short-des"><?php the_excerpt(); ?></p>
							<a class="post-content" href="<?php the_permalink(); ?>" target="_blank">Read More</a>
						</div>
						<h1>Test</h1>

					</div>

				</div>

			<?php
			endwhile;
			?>
		</div>
		<div class="blog-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</section>
</main><!-- #main -->
<?php
get_footer();
