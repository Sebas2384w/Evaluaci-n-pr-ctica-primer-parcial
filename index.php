<?php get_header(); ?>
<style>
/* Existing styles */
.card-with-hover {
    transition: transform 0.3s ease-in-out;
}

.card-with-hover:hover {
    transform: scale(1.05);
}

.productos__container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.productos__card {
    flex: 0 0 calc(33.333% - 20px);
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.productos__img {
    height: 200px;
    object-fit: cover;
}

.productos__info {
    padding: 20px;
}

.productos__titulo {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.productos__precio {
    font-size: 16px;
    color: #28a745;
    margin-bottom: 10px;
}

.productos__descripcion {
    font-size: 14px;
    color: #666;
}

.productos__link {
    display: inline-block;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.productos__link:hover {
    background-color: #0056b3;
}

/* Additional styles */
.productos__card {
    background: repeating-linear-gradient(#71e1b2, #004f67b0);
    border-image: linear-gradient(45deg, #007c32, #007c1b 50%, #6c757d 50%, #6c757d);
    border-image-slice: 1;
    border-style: solid;
    border-radius: 5px;
}
</style>

<div class="productos__container">
    <?php
    $args = array(
        'post_type' => 'producto',
        'posts_per_page' => -1
    );
    $productos_query = new WP_Query($args);
    if ($productos_query->have_posts()) :
        while ($productos_query->have_posts()) :
            $productos_query->the_post();
    ?>
            <div class="productos__card card card-with-hover">
                <?php the_post_thumbnail("post_thumbnail", array("class" => "productos__img card-img-top")); ?>
                <div class="productos__info card-body">
                    <h5 class="productos__titulo card-title"><?php the_title(); ?></h5>
                    <p class="productos__precio">$<?php echo get_post_meta(get_the_ID(), 'precio', true); ?></p>
                    <p class="productos__descripcion"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="productos__link">Ver más</a>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>

<?php get_footer(); ?>
