<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4"><?php the_title(); ?></h1>
            <div class="col-12 col-md-6">
                <?php the_content(); ?>
            </div>
            <div class="col-12 col-md-6">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
