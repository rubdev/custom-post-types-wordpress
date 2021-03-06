<?php
/**
 * Plugin Name: Gourmet Post Types
 * Plugin URI:
 * Description: Agrega Customs Post Types al sitio web de Gourmet
 * Author: Rubén Segura
 * Author URI: https://github.com/rubdev
 * License: GLP2
 * License URI: https://gnu.org/licenses/gpl-2.0.html
 */


/**
 * A continuación se registra el cpt
 */
function crear_post_type_recetas() {
    

    // etiquetas para el posttype
    $labels = array (
        'name' => _x('Recetas', 'Post Type General Name'),
        'singular_name' => _x('Receta', 'Post Type Singular Name'),
        'menu_name' => __('Recetas'),
        'parent_item_colon' => __('Recetas Padre'),
        'all_items' => __('Todas las recetas'),
        'view_items' => __('Ver Receta'),
        'add_new_item' => __('Agregar Nueva Receta'),
        'add_new' => __('Agregar Nueva Receta'),
        'edit_item' => __('Editar Receta'),
        'update_item' => __('Actualizar Receta'),
        'search_items' => __('Buscar Receta'),
        'not_found' => __('No encontrado'),
        'not_found_in_trash' => __('No encontrado en la papelera'),
    );

    // otras opciones para el posttype
    $args = array(
        'label' => __('recetas'),
        'description' => __('Recetas para cocina'),
        'labels' => $labels,
        'supports' => array('title','editor','thumbnail','revisions'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-pressthis',
    );

    // registrar el post type
    register_post_type('recetas',$args);
}

add_action('init','crear_post_type_recetas');

function crear_post_type_eventos() {
    

    // etiquetas para el posttype
    $labels = array (
        'name' => _x('Eventos', 'Post Type General Name','gourmet-artist'),
        'singular_name' => _x('Evento', 'Post Type Singular Name','gourmet-artist'),
        'menu_name' => __('Eventos','gourmet-artist'),
        'parent_item_colon' => __('Eventos Padre','gourmet-artist'),
        'all_items' => __('Todos los eventos','gourmet-artist'),
        'view_items' => __('Ver Evento','gourmet-artist'),
        'add_new_item' => __('Agregar Nueva Evento','gourmet-artist'),
        'add_new' => __('Agregar Nuevo Evento','gourmet-artist'),
        'edit_item' => __('Editar Evento','gourmet-artist'),
        'update_item' => __('Actualizar Evento','gourmet-artist'),
        'search_items' => __('Buscar Evento','gourmet-artist'),
        'not_found' => __('No encontrado','gourmet-artist'),
        'not_found_in_trash' => __('No encontrado en la papelera','gourmet-artist'),
    );

    // otras opciones para el posttype
    $args = array(
        'label' => __('eventos','gourmet-artist'),
        'description' => __('Eventos de la empresa','gourmet-artist'),
        'labels' => $labels,
        'supports' => array('title','editor','thumbnail','revisions'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-calendar-alt',
    );

    // registrar el post type
    register_post_type('eventos',$args);
}

/**
 * Añadimos la función a una acción (hook) al inicio
 * que se verá en el panel de admin de wp
 */

 add_action('init','crear_post_type_eventos');


/**
 * A continuación se registra la taxonomía
 */

 function taxonomia_tipo_receta() {
    $labels = array (
        'name' => _x('Tipo de comida', 'taxonomy general name'),
        'singular_name' => _x('Tipo de comida', 'taxonomy singular name'),
        'search_items' => __('Buscar tipo de comida'),
        'all_items' => __('Todos los tipos de comida'),
        'parent_item' => __('Tipo de comida padre'),
        'parent_item_colon' => __('Tipo de comida Padre:'),
        'edit_item' => __('Editar tipo de comida'),
        'update_item' => __('Editar tipo de comida'),
        'add_new_item' => __('Agregar nuevo tipo de comida'),
        'new_item_name' => __('Nuevo tipo de comida'),
        'menu_name' => __('Tipo de comida')
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tipo-comida')
    );

    // nombre de taxonomia, post type al que se aplica y argumentos
    register_taxonomy('tipo-comida', array('recetas'), $args);
 }

/**
 * añadimos la acción para que inicie en wp la taxonomia
 */

add_action('init','taxonomia_tipo_receta');

?>

