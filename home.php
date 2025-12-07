<?php get_template_part('template-parts/header'); ?>

<!-- Huvudomslag för sidlayout: Vänster innehåll, Höger sidopanel -->
<div class="page-layout-wrapper">

    <!-- Vänster kolumn: Magazine Layout -->
    <div class="main-content-area">

        <div class="magazine-layout">
            <!-- Inläggs-rutnät -->
            <section class="posts-masonry">
                <div class="masonry-wrapper">
                    <div class="masonry-grid">
                        <?php
                        $colors = array('#E8F5E9', '#FFF9C4', '#E3F2FD', '#FFCCBC', '#F3E5F5');
                        $color_index = 0;

                        if(have_posts()):
                            while(have_posts()): the_post();
                                $bg_color = $colors[$color_index % count($colors)];
                                $color_index++;
                        ?>
                            <!-- Inläggskort -->
                            <article class="masonry-item" style="background-color: <?php echo $bg_color; ?>">
                                <a href="<?php the_permalink(); ?>" class="masonry-link">
                                    <!-- Utvald bild -->
                                    <div class="masonry-image">
                                        <?php if(has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('large'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Inläggsinnehåll -->
                                    <div class="masonry-content">

                                        <!-- Kategori -->
                                        <div class="post-category">
                                            <?php
                                            $category = get_the_category();
                                            if ($category) {
                                                echo '<span>' . esc_html($category[0]->name) . '</span>';
                                            }
                                            ?>
                                        </div>

                                        <h3><?php the_title(); ?></h3>

                                        <!-- Metadata: Datum och författare -->
                                        <p class="post-meta">
                                            <?php echo get_the_date(); ?> • <?php the_author(); ?>
                                        </p>

                                        <span class="read-more-btn">Läs mer</span>
                                    </div>
                                </a>
                            </article>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                  <!-- pagination -->
                                    <div class="pagination">
                                        <?php
                                        the_posts_pagination(array(
                                            'mid_size'  => 2,
                                            'end_size'  => 1,
                                            'prev_text' => __('PREV', 'blogez-theme'),
                                            'next_text' => __('NEXT', 'blogez-theme'),
                                            'type'      => 'list',
                                        ));
                                        ?>
                                    </div>


                </div>
            </section>

            <!-- Nyhetsbrev-sektion -->
            <section class="newsletter-magazine">
                <div class="newsletter-magazine-wrapper">
                    <div class="newsletter-text">
                        <p class="newsletter-label"> Häng med!</p>
                        <h2 class="newsletter-heading">
                            Gillar du våra artiklar? Då är nyhetsbrevet något för dig.
                        </h2>

                        <!-- Nyhetsbrevformulär -->
                        <div class="newsletter-form-magazine">
                            <div class="form-row">
                                <input type="text" placeholder="First name" class="form-input">
                                <input type="text" placeholder="Last name" class="form-input">
                            </div>
                            <input type="email" placeholder="Email address" class="form-input full">
                            <button class="form-submit">Skicka</button>
                        </div>
                    </div>

                    <div class="newsletter-image-card">
                        <div class="newsletter-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/newsletter-image.jpg" alt="Food image">
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <!-- Höger kolumn: Sidopanel -->
    <?php get_sidebar(); ?>

</div>

<?php get_template_part('template-parts/footer'); ?>
