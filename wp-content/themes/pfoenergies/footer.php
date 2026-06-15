    </main>

    <footer class="bg-primary text-white py-12 mt-20 w-full">
        <div class="max-w-350 mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-5 gap-y-12">
            <div class="lg:col-span-1 flex flex-col md:flex-row lg:flex-col items-center md:items-start justify-between lg:justify-start gap-8">
                <a href="<?= home_url('/'); ?>" class="col-span-3 lg:col-span-1 logo" title="<?= __('Homepage', 'pfoenergies') ?>">
                    <img alt="<?= __('Homepage', 'pfoenergies') ?>" src="<?= get_theme_mod('footer_logo') ?>" class="h-11">
                </a>
                <div class="flex flex-col items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <?php if ($facebook = get_theme_mod('facebook')) : ?><a href="<?= esc_url($facebook) ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline"><img alt="Facebook" src="<?= get_template_directory_uri() ?>/assets/img/icon/icon-facebook.png" class="h-7"></a><?php endif; ?>
                        <?php if ($instagram = get_theme_mod('instagram')) : ?><a href="<?= esc_url($instagram) ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline"><img alt="Instagram" src="<?= get_template_directory_uri() ?>/assets/img/icon/icon-instagram.png" class="h-7"></a><?php endif; ?>
                        <?php if ($youtube = get_theme_mod('youtube')) : ?><a href="<?= esc_url($youtube) ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline"><img alt="Youtube" src="<?= get_template_directory_uri() ?>/assets/img/icon/icon-youtube.png" class="h-7"></a><?php endif; ?>
                        <?php if ($linkedin = get_theme_mod('linkedin')) : ?><a href="<?= esc_url($linkedin) ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline"><img alt="LinkedIn" src="<?= get_template_directory_uri() ?>/assets/img/icon/icon-linkedIn.png" class="h-7"></a><?php endif; ?>
                        <?php if ($twitter = get_theme_mod('twitter')) : ?><a href="<?= esc_url($twitter) ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline"><img alt="X / Twitter" src="<?= get_template_directory_uri() ?>/assets/img/icon/icon-twitter.png" class="h-7"></a><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-4 flex flex-wrap md:flex-nowrap items-start justify-center md:justify-between lg:justify-end gap-8">
                <?php dynamic_sidebar('footer') ?>
            </div>
        </div>
    </footer>

    <?php wp_footer() ?>

    </body>
</html>
