<?php
/**
 * Plugin Name: Campus Agenda
 * Plugin URI: https://agenda.campus-party.corg/
 * Description: Plugin de gestão da agenda do Campus Agenda
 * Version: 1.0
 * Author: Marciano & Polles
 * Author URI: https://www.evstarts.com
 * Requires at least: 4.0
 * Tested up to: 4.6
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function register_campus_agenda() {
 
    $labels = array(
        'name' => _x( 'Campus Agenda', 'campus_agenda' ),
        'singular_name' => _x( 'Campus Agenda', 'campus_agenda' ),
        'add_new' => _x( 'Adicionar', 'campus_agenda' ),
        'add_new_item' => _x( 'Adicionar novo item', 'campus_agenda' ),
        'edit_item' => _x( 'Editar item', 'campus_agenda' ),
        'new_item' => _x( 'Novo item na agenda', 'campus_agenda' ),
        'view_item' => _x( 'Ver', 'campus_agenda' ),
        'search_items' => _x( 'Procurar itens', 'campus_agenda' ),
        'not_found' => _x( 'Nenhum item foi encontrado', 'campus_agenda' ),
        'not_found_in_trash' => _x( 'Não foi encontrado nada no lixo', 'campus_agenda' ),
        'parent_item_colon' => _x( 'Item similar:', 'campus_agenda' ),
        'menu_name' => _x( 'Campus Agenda', 'campus_agenda' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Filtrar categorias por gênero',
        'supports' => array( 'title', 'editor','custom-fields', 'revisions' ),
        'taxonomies' => array( 'Eventos' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'campus_agenda', $args );
}
 
add_action( 'init', 'register_campus_agenda' );

function eventos_taxonomy() {
    register_taxonomy(
        'Eventos',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'label' => 'Eventos',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'eventos',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'eventos_taxonomy');

