<?php 
add_action("wp_enqueue_scripts","hd_assets");
function hd_assets(){
    // Estilos de Bootstrap
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), "5.1.0", "all");
    wp_enqueue_style("estilos", get_template_directory_uri()."/assets/css/style.css", array("bootstrap"), false, "all");

    // Scripts de Bootstrap
    wp_enqueue_script("popper-js", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", array("jquery"), false, true);
    wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js", array("jquery", "popper-js"), false, true);
    wp_enqueue_script("yardsale-js", get_template_directory_uri()."/assets/js/script.js", array("jquery", "bootstrap-js"), false, true);
}

function hd_analytics(){
    // Código de Google Analytics u otros scripts de análisis
}
add_action("wp_body_open", "hd_analytics");

function hd_theme_supports(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'width' => 170,
        'height' => 35,
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action("after_setup_theme", "hd_theme_supports");

function hd_add_menus(){
    register_nav_menus(array(
        'menu-principal' => "Menu principal",
        'menu-responsive' => "Menu responsive"
    ));
}
add_action("after_setup_theme", "hd_add_menus");

function hd_add_sidebar() {
    register_sidebar( array(
        'name' => 'Pie de página',
        'id' => 'pie-pagina',
        'description' => 'Sidebar para el pie de página'
    ) );
}
add_action("widgets_init", "hd_add_sidebar");

function hd_add_custom_post_type(){
    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos'
    );
    register_post_type('producto',$args = array (
        'labels' => $labels,
        'description' => 'Productos para listar en un catálogo',
        'public' => true,
        'publicly_queryable' => true,
        'show_in_menu' => true,
        'rewrite' => array('slug' => 'producto'),
        'query_var' => true,
        'capability_type' => 'post',
        'menu_position' => 5,
        'has_archive' => true,
        'hierarchical' => false,
        'show_in_rest' => true,
        'supports' => array(
            'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats', 'revisions', 'comments'
        ),
        'taxonomies' => true,
        'menu_icon' => 'dashicons-cart'
    ));
}
add_action("init", "hd_add_custom_post_type");
?>
