
<?php get_header(); ?>

    <div class="w-full h-168.75 bg-contain bg-center bg-no-repeat bg-fixed mt-14" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_template_directory_uri(); ?>/assets/img/projets/ferke_solar_img2.png');">
        <div class="max-w-350 mx-auto text-white py-14">
            <h1 class="text-4xl uppercase font-semibold">
                <?php post_type_archive_title() ?>
            </h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('Completed projects', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        <form method="GET" class="flex items-center justify-center font-light italic gap-4">
            <label class="relative cursor-pointer text-gray-500
                after:content-['/_'] after:ml-2 
                has-checked:text-primary has-checked:before:content-[''] has-checked:before:absolute has-checked:before:-bottom-1 has-checked:before:bg-primary has-checked:before:w-5/6 has-checked:before:h-0.5" 
                for="all">
                <input type="radio" name="status" id="all" value="all" class="sr-only" <?= ($_GET['status'] ?? 'all') === 'all' ? 'checked' : '' ?> onchange="this.form.submit()"><?= __('All projects', 'pfoenergies') ?>
            </label>
            <label class="relative cursor-pointer text-gray-500
                after:content-['/_'] after:ml-2 
                has-checked:text-primary has-checked:before:content-[''] has-checked:before:absolute has-checked:before:-bottom-1 has-checked:before:bg-primary has-checked:before:w-5/6 has-checked:before:h-0.5" 
                for="en-cours">
                <input type="radio" name="status" id="en-cours" value="en-cours" class="sr-only" <?= ($_GET['status'] ?? '') === 'en-cours' ? 'checked' : '' ?> onchange="this.form.submit()"><?= __('In progress', 'pfoenergies') ?> 
            </label>
            <label class="relative cursor-pointer text-gray-500
                has-checked:text-primary has-checked:before:content-[''] has-checked:before:absolute has-checked:before:-bottom-1 has-checked:before:bg-primary has-checked:before:w-5/6 has-checked:before:h-0.5" 
                for="acheve">
                <input type="radio" name="status" id="acheve" value="acheve" class="sr-only" <?= ($_GET['status'] ?? '') === 'acheve' ? 'checked' : '' ?> onchange="this.form.submit()"><?= __('Completed', 'pfoenergies') ?>
            </label>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-8">
            <?php if (have_posts()) : ?>
                
                <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/project') ?>

                <?php endwhile; ?> 

                <?php pfoenergies_pagination() ?>

            <?php else : ?>
                <h2 class="col-span-3 text-center mt-24"><?= __('No projects found.', 'pfoenergies'); ?></h2>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>

