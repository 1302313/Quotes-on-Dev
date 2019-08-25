<?php

/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="content-area">
            <!-- Page Title -->
            <header class="entry-header">
                <h1 class="page-archives-post-title"><?php the_title(); ?></h1>
            </header>

            <!-- Page Archives Post Container -->
            <div class="page-archives-posts">

                <h2>Quote Authors</h2>

                <!-- The Post Loop -->
                <ul>
                    <?php
                    $posts = get_posts('posts_per_page=-1');
                    foreach ($posts as $post) : setup_postdata($post); ?>

                    <li>
                        <a href=" <?php the_permalink(); ?> ">
                            <?php the_title();  ?>
                        </a>
                    </li>

                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </div>
            <!-- The Category Loop -->
            <div class="page-archives-categories">
                <h2>Categories</h2>

                <ul>
                    <?php wp_list_categories('title_li='); ?>
                </ul>

            </div>
            <!-- The Tag Loop -->
            <div class="page-archives-tags">

                <h2>Tags</h2>
                <!-- Set tag parameter size and format -->
                <?php
                $args = array(
                    'smallest' => 1,
                    'largest' => 1,
                    'unit' => 'rem',
                    'format' => 'list'
                );
                // Add Tag List (Cloud)
                wp_tag_cloud($args);
                ?>

            </div>

        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>