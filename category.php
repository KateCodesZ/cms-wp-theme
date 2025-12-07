<?php get_template_part('template-parts/header'); ?>

<div class="page-layout-wrapper">
  <div class="main-content-area">
    <h1><?php the_archive_title(); ?></h1>

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <small><?php echo esc_html(get_the_date()); ?> • <?php echo esc_html(get_the_author()); ?></small>
          <p><?php echo esc_html(get_the_excerpt()); ?></p>
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
      <p class="no-results"><?php _e('Inga inlägg hittades.', 'blogez-theme'); ?></p>
    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</div>
<?php get_template_part('template-parts/footer'); ?>
