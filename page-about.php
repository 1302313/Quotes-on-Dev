<?php

/**
 * Template part for displaying about page content.php.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="page-about">
    <main id="main" class="site-main" role="main">

        <?php while (have_posts()) : the_post(); ?>

        <!-- About Page Title -->
        <h1> <?php the_title() ?> </h1>

        <!-- About Page Information -->
        <div class="about-info">
            <p>Quotes on Dev is a project site for the RED Academy Web Developer Professional program. It’s used to experiment with Ajax, WP API, jQuery, and other cool things. 🙂</p>
        </div>

        <div class="reference">
            <p>
                This site is heavily inspired by Chris Coyier’s
                <a href="http://quotesondesign.com/" target="_blank" rel="noopener noreferrer">
                    Quotes on Design
                </a>
            </p>
        </div>

        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>