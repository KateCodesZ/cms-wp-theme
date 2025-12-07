<?php
// Sidebar template: Categories + Archives widgets
?>
<aside id="secondary" class="sidebar-area" role="complementary">
    <?php if (is_active_sidebar('blog-sidebar')) : ?>
        <?php dynamic_sidebar('blog-sidebar'); ?>
    <?php else : ?>
        <section class="widget widget_categories">
            <h2 class="widget-title"><?php _e('Kategorier', 'blogez-theme'); ?></h2>
            <ul>
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </section>
        <section class="widget widget_archive">
            <h2 class="widget-title"><?php _e('Arkiv', 'blogez-theme'); ?></h2>
            <ul>
                <?php wp_get_archives(array('type' => 'monthly')); ?>
            </ul>
        </section>
    <?php endif; ?>
</aside>
