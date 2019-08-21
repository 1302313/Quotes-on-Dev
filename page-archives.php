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
            <header class="entry-header">

                <h1 class="page-archives-post-title"><?php the_title(); ?></h1>
            </header>
            <div class="page-archives-posts-container">
                <h2>Quote Authors</h2>
                <!-- The Loop -->
                <ul>
                    <?php
                    $posts = get_posts('posts_per_page=-1');
                    foreach ($posts as $post) : setup_postdata($post);
                        ?>

                    <li>
                        <a href=" <?php the_permalink(); ?> ">
                            <?php the_title();  ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>


                </ul>

            </div>

            <div class="page-archives-categories">
                <h2>Categories</h2>
                <!-- The Category Loop -->
                <ul>
                    <?php wp_list_categories('title_li='); ?>
                </ul>
            </div>

            <div class="page-archives-tags">
                <h2>Categories</h2>
                <!-- The Tag Loop -->

                <?php

                $args = array(
                    'smallest' => 1,
                    'largest' => 1,
                    'unit' => 'rem',
                    'smallest' => 'list'
                );
                // Add Tag List
                wp_tag_cloud($args);
                ?>

            </div>

            <!-- wp_tag_cloud -->

        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
