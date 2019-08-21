<?php

/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while (have_posts()) : the_post(); ?>

        <section class="quote-submission">
            <header class="entry-header page-submit-header">
                <h1 class="page-submit-header-title"></h1>
            </header>

            <?php if (is_user_logged_in() && current_user_can('edit_posts')) : ?>
            <div class="page-submit-submission-wrapper">

                <form id="quote-submission-form" name="quoteForm">

                    <div>
                        <label for="quote-author">Author of Quote</label>
                        <input type="text" name="quoteAuthor" id="quote-author">
                    </div>

                    <div>
                        <label for="quote-content">Quote</label>
                        <textarea name="quoteName" id="quote-content" cols="20" rows="3" required></textarea>
                    </div>

                    <div>
                        <label for="quote-source">Where did you find this Quote? (E.g. Book or Journal Name)</label>
                        <input type="text" name="quoteSource" id="quote-source">
                    </div>

                    <div>
                        <label for="quote-source-url">Provide the link to the Quote source</label>
                        <textarea name="quoteSourceUrl" id="quote-source-url" cols="20" rows="3" required></textarea>
                    </div>

                    <input type="submit" value="Submit Quote">

                </form>

            </div>

            <?php else : ?>
            <p> Sorry, you must be logged in to submit a quote:( </p>
            <p>
                <a href="<?php echo wp_login_url() ?>">

                </a>

            </p>

            <?php endif; ?>

        </section>

        <?php endwhile; // End of the loop. 
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>