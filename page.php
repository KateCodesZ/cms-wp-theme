<?php get_template_part('template-parts/header'); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php the_title("<h1>","</h1>");?>
  <?php the_content("<h1>","</h1>");?>
  <?php endwhile; ?>

<?php else: ?>
  <p>Inga inlägg hittades</p>
  <?php endif; ?>

<?php get_template_part('template-parts/footer'); ?>
