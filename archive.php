<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package justg
 */

// Exit if accessed directly.

defined('ABSPATH') || exit;
get_header();
?>

<div class="container">
    <div class="row pt-2">
        <div class="col-md-6 order-md-2">	
            <h1 class="velocity-title"><?php wp_title(''); ?></h1>
			<?php if ( have_posts() ) : ?>
                <div class="velocity-first-post">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php velocity_post_loop('',470,420);?>
                    <?php endwhile; ?>
                </div>
		<?php justg_pagination();?>
			<?php else : ?>
				<?php get_template_part( 'loop-templates/content', 'none' ); ?>
			<?php endif; ?>
        </div>
        <div class="col-md-2 order-md-1 d-none d-md-block">
            <div class="velocity-title mb-0">Kategori</div>
            <?php velocity_categories(); ?>
            <?php get_berita_iklan('iklan_home'); ?>
        </div>
        <div class="col-md-4 mt-3 mt-md-0 order-md-3">
            <?php get_sidebar('main');?>
        </div>
    </div>
</div>

<?php
get_footer();
