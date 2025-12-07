<?php get_template_part('template-parts/header'); ?>

<?php
$video_id = get_theme_mod('hero_video_id');
$hero_title = get_theme_mod('hero_title', 'TASTE MAGAZINE');
?>

<!-- Hero video (change id on wp-admin -> appearance-customisation to change to new video bg) -->
<section class="hero-section">
    <?php if($video_id): ?>
        <div class="video-bg">
            <iframe
                src="https://www.youtube-nocookie.com/embed/
                <?php echo esc_attr($video_id); ?>?autoplay=1&mute=1&controls=0&loop=1&playlist=<?php echo esc_attr($video_id); ?>&playsinline=1&rel=0"
                title="Background Video"
                frameborder="0"
                allow="autoplay; fullscreen"
                allowfullscreen>
            </iframe>
        </div>
        <div class="video-overlay"></div>
    <?php endif; ?>

    <?php if($hero_title): ?>
        <div class="hero-text">
            <h1><?php echo esc_html($hero_title); ?></h1>
        </div>
    <?php endif; ?>
</section>

<main class="main-content">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_template_part('template-parts/footer'); ?>
