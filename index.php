<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = velocitytheme_option('justg_container_type', 'container');
?>

<div class="container">
    <div class="row">
        <div class="col-12 pt-1">
            <div class="border shadow-sm bg-light mt-2">
                <?php $carousel_home = velocitytheme_option('cat_carousel_home');
                velocity_post_carousel($carousel_home);?>
            </div>
        </div>
        <div class="col-12">
            <div class="row border shadow-sm bg-light my-3 mx-0">
                <div class="col-md-6 px-0">
                    <?php $args_slider = array(
                        'showposts' => 5,
                        'post_type' => array('post'),
                    );
                    $slider_posts = get_posts($args_slider);
                    $i = 1;
                    if($slider_posts){
                        echo '<div id="velocity-home-slider" class="carousel slide" data-bs-ride="carousel">';
                        echo '<div class="carousel-inner">';
                            foreach($slider_posts as $post){
                                $no = $i++;
                                $class = $no == 1 ? ' active' : '';
                                $post_id = $post->ID;
                                echo '<div class="text-center carousel-item'.$class.'">';
                                    echo do_shortcode('[resize-thumbnail width="480" height="320" linked="true" class="w-100" post_id="'.$post_id.'"]');
                                    echo '<div class="bg-white bg-opacity-75 position-absolute bottom-0 start-0 w-100">';
                                        echo '<a href="'.get_the_permalink($post_id).'" class="d-inline-block py-2 px-3 text-dark fw-bold">'.$post->post_title.'</a>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            echo '<button class="carousel-control-prev" type="button" data-bs-target="#velocity-home-slider" data-bs-slide="prev">';
                                echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                                echo '<span class="visually-hidden">Previous</span>';
                            echo '</button>';
                            echo '<button class="carousel-control-next" type="button" data-bs-target="#velocity-home-slider" data-bs-slide="next">';
                                echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                                echo '<span class="visually-hidden">Next</span>';
                            echo '</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-md-6 px-0">
                    <?php $args_popular = array(
                        'showposts' => 5,
                        'post_type' => array('post'),
                        'meta_key' => 'hit',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                    );
                    $popular_posts = get_posts($args_popular);
                    $i = 1;
                    if($popular_posts){
                        echo '<div class="bg-color-theme fs-6 fw-bold py-2 px-3 text-white mb-2">';
                            echo 'Popular Posts';
                        echo '</div>';
                        foreach($popular_posts as $post){
                            velocity_post_list($post->ID);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <?php $args_news = array(
                        'showposts' => 5,
                        'post_type' => array('post'),
                    );
                    $recent_posts = get_posts($args_news);
                    if($recent_posts){
                        echo '<div class="mb-4">';
                            echo velocity_cat_name();
                            foreach($recent_posts as $post){
                                velocity_post_loop($post->ID);
                            }
                        echo '</div>';
                    }
                    
                    $args_news = array(
                        'showposts' => 10,
                        'post_type' => array('post'),
                    );
                    $posts_left_home  = velocitytheme_option('cat_posts_left_home');
                    if(!empty($posts_left_home)){
                        $args_news['cat'] = $posts_left_home;
                    }
                    $recent_posts = get_posts($args_news);
                    if($recent_posts){
                        echo '<div class="mb-4">';
                            echo velocity_cat_name($posts_left_home);
                            foreach($recent_posts as $post){
                                velocity_post_list($post->ID);
                            }
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-md-4 ps-md-0">
                    <?php $args1 = array(
                        'showposts' => 6,
                        'post_type' => array('post'),
                    );
                    $posts_middle_home1  = velocitytheme_option('cat_posts_middle_home1');
                    if(!empty($posts_middle_home1)){
                        $args1['cat'] = $posts_middle_home1;
                    }
                    $posts_middle1 = get_posts($args1);
                    if(!empty($posts_middle1)){
                        echo velocity_cat_name($posts_middle_home1);
                        echo '<div class="mb-4">';
                            echo '<div class="mb-2 pb-2 border-bottom">';
                            foreach(array_slice($posts_middle1, 0,1) as $post) {
                                $post_id = $post->ID;
                                echo do_shortcode('[resize-thumbnail width="410" height="280" linked="true" class="w-100" post_id="'.$post_id.'"]');
                                echo '<small class="d-block mt-2 mb-1 text-color-theme">';
                                    velocity_post_date($post_id);
                                echo '</small>';
                                echo '<div class="mb-1">';
                                    echo '<a class="secondary-font fw-bold text-color-theme" href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                                echo '</div>';
                                echo do_shortcode('[velocity-excerpt count="100" post_id="'.$post_id.'"]');
                            }
                            echo '</div>';
                            echo '<div class="w-100">';
                                foreach(array_slice($posts_middle1, 1,6) as $post) {                        
                                    velocity_post_list($post->ID, false);
                                }
                            echo '</div>';
                        echo '</div>';
                    }


                    $args2 = array(
                        'showposts' => 5,
                        'post_type' => array('post'),
                    );
                    $posts_middle_home2  = velocitytheme_option('cat_posts_middle_home2');
                    if(!empty($posts_middle_home2)){
                        $args2['cat'] = $posts_middle_home2;
                    }
                    $posts_middle2 = get_posts($args2);
                    if(!empty($posts_middle2)){
                        echo velocity_cat_name($posts_middle_home2);
                        foreach($posts_middle2 as $post) {
                            $post_id = $post->ID;
                            echo '<div class="velocity-post-content text-muted mb-2 pb-2 border-bottom">';
                            echo '<div class="row mb-4 mb-md-0">';
                                echo '<div class="col-3 col-md-4 pe-0">';
                                    echo do_shortcode('[resize-thumbnail width="300" height="250" linked="true" class="w-100" post_id="'.$post_id.'"]');
                                echo '</div>';
                                echo '<div class="col-9 col-md-8">';
                                    echo '<small class="d-block text-color-theme mb-1">';
                                        echo get_the_date('',$post_id);
                                    echo '</small>';
                                    echo '<div class="mb-1">';
                                        echo '<a class="secondary-font fw-bold text-color-theme" href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_sidebar('main');?>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-2 col-sm-3 d-none d-sm-block">
            <div class="velocity-title mb-0">Kategori</div>
            <?php velocity_categories(); ?>
            <?php get_berita_iklan('iklan_home'); ?>
        </div>
        <div class="col-md-10 col-sm-9 ps-sm-0">
            <?php 
            $args_footer_home1 = array(
                'showposts' => 4,
                'post_type' => array('post'),
            );
            $posts_footer_home1  = velocitytheme_option('cat_posts_footer_home1');
            if(!empty($posts_footer_home1)){
                $args_footer_home1['cat'] = $posts_footer_home1;
            }
            $recent_posts = get_posts($args_footer_home1);
            if($recent_posts){
                echo velocity_cat_name($posts_footer_home1);
                echo '<div class="row row-vd mb-3">';
                    foreach($recent_posts as $post){
                        velocity_post_grid($post->ID);
                    }
                echo '</div>';
            }


            $args_footer_home2 = array(
                'showposts' => 4,
                'post_type' => array('post'),
            );
            $posts_footer_home2  = velocitytheme_option('cat_posts_footer_home2');
            if(!empty($posts_footer_home2)){
                $args_footer_home2['cat'] = $posts_footer_home2;
            }
            $recent_posts = get_posts($args_footer_home2);
            if($recent_posts){
                echo velocity_cat_name($posts_footer_home2);
                echo '<div class="row row-vd mb-3">';
                    foreach($recent_posts as $post){
                        velocity_post_grid($post->ID);
                    }
                echo '</div>';
            }


            $args_footer_home3 = array(
                'showposts' => 4,
                'post_type' => array('post'),
            );
            $posts_footer_home3  = velocitytheme_option('cat_posts_footer_home3');
            if(!empty($posts_footer_home3)){
                $args_footer_home3['cat'] = $posts_footer_home3;
            }
            $recent_posts = get_posts($args_footer_home3);
            if($recent_posts){
                echo velocity_cat_name($posts_footer_home3);
                echo '<div class="row row-vd mb-3">';
                    foreach($recent_posts as $post){
                        velocity_post_grid($post->ID);
                    }
                echo '</div>';
            }

            ?>
        </div>
    </div>
</div>

<?php
get_footer();