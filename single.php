<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				// /*
				// * Include the Post-Type-specific template for the content.
				// * If you want to override this in a child theme, then include a file
				// * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				// */
				// get_template_part( 'template-parts/content', get_post_type() );
				?>
				<div class="blog-element">
				<div class="single-post-title">
					<h2 ><?php the_title();?></h2>
				</div>
				<div class="single-post-info">
					<p>by <span class="author-name"><?php the_author(); ?></span> on <?php the_date(); ?></p>
					<p><span class="comment-count"><?php comments_number('No comment', '1 comment', '% comments'); ?></span></p>
				</div>
				<div class="single-post-shrtdes">
					<p><?php the_excerpt()?></p>
				</div>
				<div class="single-post-thumbnail">
				<?php 
					$imagepath = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					?>
					<img src="<?php echo $imagepath[0]?>" width="620px">
				</div>
				<div class="single-post-main-content">
				<p><?php the_content();?></p>
				</div>
				<div class="single-post-tags">
					<p><?php the_tags()?></p>
				</div>
				<div class="single-post-comment-title">
					<p>Comments</p>
				</div>
				<div class="single-post-comment">
					<?php comments_template();?>
				</div>
					
					
				</div>

			<?php
			endwhile;
			?>
			</div>
			<div class="blog-sidebar">
				<?php get_sidebar();?>
			</div>
			</section>
	</main><!-- #main -->

<?php
get_footer();