<?php get_template_part('template-parts/header'); ?>

<?php
// Ensure access the main query object
global $wp_query;
?>

<div class="page-layout-wrapper">
    <div class="main-content-area">

        <h1>
            <?php printf(__('Sökresultat för: "%s"', 'blogez-theme'), get_search_query()); ?>
        </h1>

        <?php if (have_posts()) : ?>
            <p><?php printf(__('Vi hittade %s resultat', 'blogez-theme'), $wp_query->found_posts); ?></p>

            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p>
                        <small>
                            <?php _e('Av', 'blogez-theme'); ?> <?php the_author(); ?> |
                            <?php echo get_the_date(); ?>
                        </small>
                    </p>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>

                        <div class="pagination">
                                <?php the_posts_pagination(array(
                                    'mid_size' => 1,
                                    'prev_text' => __('Föregående', 'blogez-theme'),
                                    'next_text' => __('Nästa', 'blogez-theme'),
                                )); ?>
                        </div>

        <?php else : ?>
            <p><?php _e('Inga resultat hittades. Försök söka efter något annat.', 'blogez-theme'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>

        </div>

        <?php get_sidebar(); ?>
</div>

<?php get_template_part('template-parts/footer'); ?>
