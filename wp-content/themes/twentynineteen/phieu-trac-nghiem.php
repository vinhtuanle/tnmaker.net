<?php
/*
Template Name: Phieu Trac Nghiem
*/
get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        get_template_part('template-parts/content/content', 'jspdf');
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
