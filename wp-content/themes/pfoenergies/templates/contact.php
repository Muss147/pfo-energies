<?php
/*
Template Name: Contact
*/

get_header();
?>

<div class="max-w-7xl mx-auto py-12 mt-14">
    <h1 class="text-4xl font-bold">
        <?php the_title(); ?>
    </h1>

    <div class="formatted mt-8">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</div>

<?php get_footer(); ?>