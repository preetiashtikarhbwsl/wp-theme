<?php
// Template Name:Home Page
get_header();
?>
<div class="slider-container">
    <div class="slider">
        <div class="slides">
            <div id="slides__1" class="slide">
                <div class="slide-content ">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-image.png" alt="img" class="slide-img">
                    <div class="slide-text">
                        <span>
                            <h1 class="slide-title">Gearing up the ideas</h1>
                            <p class="slide-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus alias, illo tempora recusandae consequatur molestias quis cumque iure, repudiandae earum, asperiores perspiciatis officia mollitia.</p>
                        </span>
                    </div>
                </div>
                <a class="slide__prev" href="#slides__4" title="Next"></a>
                <a class="slide__next" href="#slides__2" title="Next"></a>
            </div>
            <div id="slides__2" class="slide">
                <div class="slide-content ">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-image.png" alt="img" class="slide-img">
                    <div class="slide-text">
                        <span>
                            <h1 class="slide-title">Gearing up the ideas</h1>
                            <p class="slide-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus alias, illo tempora recusandae consequatur molestias quis cumque iure, repudiandae earum, asperiores perspiciatis officia mollitia.</p>
                        </span>
                    </div>
                </div>
                <a class="slide__prev" href="#slides__1" title="Prev"></a>
                <a class="slide__next" href="#slides__3" title="Next"></a>
            </div>
            <div id="slides__3" class="slide">
                <div class="slide-content ">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-image.png" alt="img" class="slide-img">
                    <div class="slide-text">
                        <span>
                            <h1 class="slide-title">Gearing up the ideas</h1>
                            <p class="slide-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus alias, illo tempora recusandae consequatur molestias quis cumque iure, repudiandae earum, asperiores perspiciatis officia mollitia.</p>
                        </span>
                    </div>
                </div>
                <a class="slide__prev" href="#slides__2" title="Prev"></a>
                <a class="slide__next" href="#slides__1" title="Next"></a>
            </div>
        </div>
        <div class="slider__nav">
            <a class="slider__navlink" href="#slides__1"></a>
            <a class="slider__navlink" href="#slides__2"></a>
            <a class="slider__navlink" href="#slides__3"></a>
            <a class="slider__navlink" href="#slides__4"></a>
        </div>
    </div>
</div>
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

<!-- PORTFOLIO -->
<section class="gallery">
    <div class="gallery__label">
        <h3 class="gallery__heading">D'SING IS THE SOUL</h3>
        <button href="http://localhost/wordpress/portfolio/" class="btn gallery__button">view all</button>
    </div>
    <div class="gallery__grid container">
        <?php
        $wpportfolio    = array(
            'post_type'   => 'portfolio',
            'post_status' => 'publish',
        );
        $portfolioquery = new Wp_Query($wpportfolio);
        while ($portfolioquery->have_posts()) {
            $portfolioquery->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

        ?>
            <a href="<?php echo $imagepath[0]; ?>" data-lightbox="image-1">
                <img class="hover__image" src="<?php echo $imagepath[0]; ?>" alt="gallery">
                <!-- <?php $actual__img__path = $imagepath[0]; ?> -->

                <!-- <script>console.log("yo")</script> -->
            </a>

        <?php
        }
        ?>
    </div>
</section>

<?php
get_footer();
?>