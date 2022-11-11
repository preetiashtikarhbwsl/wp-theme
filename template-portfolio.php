<?php
// Template Name:Portfolio Page
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

<div class="gallery__label">
	<div class="blogpage__title">
		<h3 class="gallery__heading">D'SING IS THE SOUL</h3>
	</div>

	<div class="category-buttons-container">
		<?php
		$newCat = get_terms(
			array(
				'taxonomy'   => 'portfolio_category',
				'hide_empty' => false,
			)
		);
		foreach ($newCat as $newsCatData) {
		?>
			<div class="category-option">
				<?php $category_name = $newsCatData->name; ?>
				<button class="gallery__button" onclick="toggleHide()"><?php echo $category_name; ?></button>
			</div>
		<?php
		}
		?>
	</div>
</div>


<!-- PORTFOLIO -->
<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<section class="gallery">
	<div class="gallery__grid container">
		<?php
		
		$wpportfolio    = array(
			'post_status' => 'publish',
			'posts_per_page' => 2, // query last 2 posts  
			'post_type' => 'portfolio',
			'paged' => $paged
		);
		$portfolioquery = new Wp_Query($wpportfolio);
		while ($portfolioquery->have_posts()) {
			$portfolioquery->the_post();
			global $post;
			$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

		?>
			<a href="<?php echo $imagepath[0]; ?>" data-lightbox="image-1">
				<img class="hover__image" src="<?php echo $imagepath[0]; ?>" alt="gallery">
				<!-- <?php $actual__img__path = $imagepath[0]; ?> -->

				<!-- <script>console.log("yo")</script> -->
			</a>

		<?php
		}

		wp_reset_query();


		// Step  3 : Call the Pagination Function Here  

		if (function_exists("cpt_pagination")) {

			cpt_pagination($portfolioquery->max_num_pages);
		}
		?>
	</div>
</section>





<?php
get_footer();
?>