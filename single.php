<?php get_template_part('template-parts/header'); ?>

<div class="reading-progress-bar"></div>

<div class="single-wrapper">
    <article class="single-post-card">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php if (has_post_thumbnail()): ?>
                <?php
                $thumbnail_id = get_post_thumbnail_id();
                $image_meta = wp_get_attachment_metadata($thumbnail_id);
                $is_vertical = false;
                if ($image_meta && isset($image_meta['width']) && isset($image_meta['height'])) {
                  // Check if the image is vertical (height greater than width)
                  $is_vertical = $image_meta['height'] > $image_meta['width'];
                }

                $image_class = $is_vertical ? 'single-image vertical' : 'single-image';
                ?>
                <div class="<?php echo $image_class; ?>">
                  <?php the_post_thumbnail('large'); ?>
                </div>
              <?php endif; ?>

            <h1 class="single-title"><?php the_title(); ?></h1>

            <div class="single-meta">
                <?php
                $category = get_the_category();
                if (!empty($category)) {
                    echo esc_html($category[0]->name);
                }
                ?>
                · <?php echo get_the_date(); ?> · <?php the_author(); ?>
            </div>

            <div class="single-content dropcap-enabled">
                <?php
            // Remove additional images inside content
            $content = preg_replace('/<img[^>]+>/i', '', get_the_content());
            echo wp_kses_post($content);
            ?>
            </div>
            </div>



        <?php endwhile; endif; ?>

    </article>
</div>

<?php get_template_part('template-parts/footer'); ?>

<script>
// Progress bar
window.addEventListener('scroll', function() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.querySelector('.reading-progress-bar').style.width = scrolled + '%';
});
</script>
