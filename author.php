<?php get_template_part('template-parts/header'); ?>

<h1><?php the_archive_title(); ?></h1>
<p>Author posts</p>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <h2><a href="<?php the_permalink();?>"><?php the_title();?><a></h2>
  <?php endwhile; ?>

<?php else: ?>
  <p>Inga inlägg hittades</p>
  <?php endif; ?>

<?php get_template_part('template-parts/footer'); ?>
