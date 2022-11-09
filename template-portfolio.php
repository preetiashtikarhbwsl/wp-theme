<?php
// Template Name:Portfolio Page
get_header();
?>
<section id="gallery">
	<div class="gallery__label">
		<div class="blogpage__title">
			<h3 class="gallery__heading">D'SING IS THE SOUL</h3>
		</div>
		
		<?php
			$newCat = get_terms(
				array(
					'taxonomy'   => 'portfollio_category',
					'hide_empty' => false,
				)
			);
			foreach ( $newCat as $newsCatData ) {
				?>
				<div class="category-option">
					<?php $category_name = $newsCatData->name; ?>
					<button class="gallery__button" onclick="toggleHide()"><?php echo $category_name; ?></button>
				</div>
				<?php
			}
			?>
	</div>
		<div id="big__container"class="gallery__grid container">
			<?php
			//  $actual__img__path  = '';
			// 	$i               = 1;
				$wpportfollio    = array(
					'post_type'      => 'portfollio',
					'post_status'    => 'publish',
					'posts_per_page' => 6,
					'paged'          => $paged,
				);
				$portfollioquery = new Wp_Query( $wpportfollio );
				while ( $portfollioquery->have_posts() ) {
					$portfollioquery->the_post();
					$myid      = 'thumbnail-' . $i;
					$imagepath = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					// $demo=$imagepath[0];


					?>
				<div class="gallery-img">
						<!-- TODO: ############################# -->

						<!-- thumbnail image wrapped in a link -->
						<a href="<?php echo $imagepath[0]; ?>" data-lightbox="image-1">
							<img class="hover__image" src="<?php echo $imagepath[0]; ?>" alt="gallery">
						<!-- <?php $actual__img__path = $imagepath[0]; ?> -->
						
						<!-- <script>console.log("yo")</script> -->
						</a>

						<h1 onclick="console.log('from the heading')">Random Heading</h1> -->
					<!-- <div class="overlay__text">
						<div class="text">
						view an image
						</div>
					</div>
				</div>
					<?php

					// $i += 1;
				}
				?>
		</div>      
	</section>
<?php
get_footer();
?>