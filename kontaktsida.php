<?php
/*
Template name: Kontakt sida
*/
?>

<?php get_template_part('template-parts/header'); ?>
<h1>Kontaktform</h1>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php the_title("<h1>","</h1>");?>
  <?php the_content("<h1>","</h1>");?>
  <?php endwhile; ?>

<?php else: ?>
  <?php endif; ?>

<?php get_template_part('template-parts/footer'); ?>
