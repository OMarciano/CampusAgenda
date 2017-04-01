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
        'not_found_in_trash' => _x( 'Não foi encontrado nada na lixeira', 'campus_agenda' ),
        'parent_item_colon' => _x( 'Item similar:', 'campus_agenda' ),
        'menu_name' => _x( 'Campus Agenda', 'campus_agenda' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Filtrar categorias',
        'supports' => array( 'title', 'editor','custom-fields', 'revisions' ),
        'taxonomies' => array( 'Eventos', 'Dias', 'Tematica', 'Tipo_de_Atividade', 'Local', 'Area' ),
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
    $labels = array(
    		'name'              => _x( 'Eventos', 'taxonomy general name', 'textdomain' ),
    		'singular_name'     => _x( 'Evento', 'taxonomy singular name', 'textdomain' ),
    		'search_items'      => __( 'Procurar Eventos', 'textdomain' ),
    		'all_items'         => __( 'Todos os Eventos', 'textdomain' ),
    		'parent_item'       => __( 'Evento Pai', 'textdomain' ),
    		'parent_item_colon' => __( 'Evento Pai:', 'textdomain' ),
    		'edit_item'         => __( 'Editar Evento', 'textdomain' ),
    		'update_item'       => __( 'Atualizar Evento', 'textdomain' ),
    		'add_new_item'      => __( 'Adicionar novo Evento', 'textdomain' ),
    		'new_item_name'     => __( 'Nome do Novo Evento', 'textdomain' ),
    		'menu_name'         => __( 'Evento', 'textdomain' ),
    	);

    register_taxonomy(
        'Eventos',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'eventos',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'eventos_taxonomy');

function dias_taxonomy() {
  $labels = array(
  		'name'              => _x( 'Dias', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Dia', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Procurar Dias', 'textdomain' ),
  		'all_items'         => __( 'Todos os Dias', 'textdomain' ),
  		'parent_item'       => __( 'Dia Pai', 'textdomain' ),
  		'parent_item_colon' => __( 'Dia Pai:', 'textdomain' ),
  		'edit_item'         => __( 'Editar Dia', 'textdomain' ),
  		'update_item'       => __( 'Atualizar Dia', 'textdomain' ),
  		'add_new_item'      => __( 'Adicionar novo Dia', 'textdomain' ),
  		'new_item_name'     => __( 'Nome do Novo Dia', 'textdomain' ),
  		'menu_name'         => __( 'Dia', 'textdomain' ),
  	);

    register_taxonomy(
        'Dias',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'dias',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'dias_taxonomy');

function tematicas_taxonomy() {
  $labels = array(
  		'name'              => _x( 'Temáticas', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Temática', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Procurar Temáticas', 'textdomain' ),
  		'all_items'         => __( 'Todas as Temáticas', 'textdomain' ),
  		'parent_item'       => __( 'Temática Pai', 'textdomain' ),
  		'parent_item_colon' => __( 'Temática Pai:', 'textdomain' ),
  		'edit_item'         => __( 'Editar Temática', 'textdomain' ),
  		'update_item'       => __( 'Atualizar Temática', 'textdomain' ),
  		'add_new_item'      => __( 'Adicionar nova Temática', 'textdomain' ),
  		'new_item_name'     => __( 'Nome da Nova Temática', 'textdomain' ),
  		'menu_name'         => __( 'Temática', 'textdomain' ),
  	);

    register_taxonomy(
        'Tematicas',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tematicas',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'tematicas_taxonomy');

function atividades_taxonomy() {
  $labels = array(
  		'name'              => _x( 'Tipos de Atividades', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Tipo de Atividade', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Procurar Tipos de Atividades', 'textdomain' ),
  		'all_items'         => __( 'Todos os Tipos de Atividades', 'textdomain' ),
  		'parent_item'       => __( 'Tipo de Atividade Pai', 'textdomain' ),
  		'parent_item_colon' => __( 'Tipo de Atividade Pai:', 'textdomain' ),
  		'edit_item'         => __( 'Editar Tipo de Atividade', 'textdomain' ),
  		'update_item'       => __( 'Atualizar Tipo de Atividade', 'textdomain' ),
  		'add_new_item'      => __( 'Adicionar novo Tipo de Atividade', 'textdomain' ),
  		'new_item_name'     => __( 'Nome do Novo Tipo de Atividade', 'textdomain' ),
  		'menu_name'         => __( 'Tipo de Atividade', 'textdomain' ),
  	);

    register_taxonomy(
        'Tipo_de_Atividade',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tipo_atividade',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'atividades_taxonomy');

function local_taxonomy() {
  $labels = array(
  		'name'              => _x( 'Locais', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Local', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Procurar Locais', 'textdomain' ),
  		'all_items'         => __( 'Todos os Locais', 'textdomain' ),
  		'parent_item'       => __( 'Local Pai', 'textdomain' ),
  		'parent_item_colon' => __( 'Local Pai:', 'textdomain' ),
  		'edit_item'         => __( 'Editar Local', 'textdomain' ),
  		'update_item'       => __( 'Atualizar Local', 'textdomain' ),
  		'add_new_item'      => __( 'Adicionar novo Local', 'textdomain' ),
  		'new_item_name'     => __( 'Nome do Local', 'textdomain' ),
  		'menu_name'         => __( 'Local', 'textdomain' ),
  	);

    register_taxonomy(
        'Local',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'local',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'local_taxonomy');

function area_taxonomy() {
  $labels = array(
  		'name'              => _x( 'Áreas', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Área', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Procurar Áreas', 'textdomain' ),
  		'all_items'         => __( 'Todos as Áreas', 'textdomain' ),
  		'parent_item'       => __( 'Área Pai', 'textdomain' ),
  		'parent_item_colon' => __( 'Área Pai:', 'textdomain' ),
  		'edit_item'         => __( 'Editar Área', 'textdomain' ),
  		'update_item'       => __( 'Atualizar Área', 'textdomain' ),
  		'add_new_item'      => __( 'Adicionar nova Área', 'textdomain' ),
  		'new_item_name'     => __( 'Nome da Área', 'textdomain' ),
  		'menu_name'         => __( 'Área', 'textdomain' ),
  	);

    register_taxonomy(
        'Area',
        'campus_agenda',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'area',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'area_taxonomy');
