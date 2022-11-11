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
 * @package Wp_Theme
 */

get_header();
?>

<div class="mid-container">
    <div class="container inner-mid-container">

        <div class="category-content">
            <div class="category-section-one">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-icon-1.png" alt="" class="category-img" />
            </div>
            <div class="category-section-two">
                <h2 class="category-title">Advertising</h2>
                <p class="category-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        <div class="category-content">
            <div class="category-section-one">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-icon-2.png" alt="" class="category-img" />
            </div>
            <div class="category-section-two">
                <h2 class="category-title">Multimedia</h2>
                <p class="category-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        <div class="category-content">
            <div class="category-section-one">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-icon-3.png" alt="" class="category-img" />
            </div>
            <div class="category-section-two">
                <h2 class="category-title">Photography</h2>
                <p class="category-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

    </div>
</div>

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
				// $imagepath = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				// /*
				// * Include the Post-Type-specific template for the content.
				// * If you want to override this in a child theme, then include a file
				// * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				// */
				// get_template_part( 'template-parts/content', get_post_type() );
			?>
				<div class="blog-element">
					<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php the_title(); ?></h2></a>
					<div class="blog-content">
						<div class="blog-item">
							<?php the_post_thumbnail(array(220, 153)); ?>
						</div>
						<div class="blog-content-des">
							<div class="single-post-info">
								<p>by <span class="author-name"><?php the_author(); ?></span> on <?php the_date(); ?></p>
								<p><span class="comment-count"><?php comments_number('No comment', '1 comment', '% comments'); ?></span></p>
							</div>
							<p class="post-short-des"><?php the_excerpt(); ?></p>
							<a class="post-content" href="<?php the_permalink(); ?>" target="_blank">Read More</a>
						</div>


					</div>

				</div>

			<?php
			endwhile;
			?>
			<?php the_posts_pagination(); ?>
		</div>
		<div class="blog-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</section>
</main><!-- #main -->
<?php
get_footer();
