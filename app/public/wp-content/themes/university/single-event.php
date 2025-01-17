<?php
/**
 * Created by PhpStorm.
 * User: anand
 * Date: 24/03/18
 * Time: 5:24 PM
 */

get_header();

while(have_posts()) {
    the_post();

    pageBanner();
    ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?= get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Events Home</a> <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>

        <div class="generic-content"><?php the_content(); ?></div>

        <?php
        $relatedPrograms = get_field('related_programs');
        if($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
            echo '<ul class="link-list min-list">';
            foreach($relatedPrograms as $relatedProgram) { ?>
                <li><a href="<?= get_the_permalink($relatedProgram); ?>"><?= get_the_title($relatedProgram); ?></a></li>
            <?php }
            echo '</ul>';
        }

        ?>
    </div>
    <?php

}

get_footer();
?>