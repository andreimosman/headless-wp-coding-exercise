<?php

namespace WayBeyondLabs\Breweries;

class Plugin {

    public static function setup() {
        add_action( 'init', [ __CLASS__, 'register_brewery_post_type' ] );
        add_action( 'acf/init', [ __CLASS__, 'register_brewery_custom_fields' ] );
        add_action( 'cli_init', [ __CLASS__, 'register_commands' ] );
    }

    public static function register_commands() {
        \WP_CLI::add_command( 'breweries', 'WayBeyondLabs\\Breweries\\CLI' );
    }

    public static function register_brewery_post_type() {
        $labels = [
            'name'               => _x( 'Breweries', 'post type general name', 'wbl-breweries' ),
            'singular_name'      => _x( 'Brewery', 'post type singular name', 'wbl-breweries' ),
            'menu_name'          => _x( 'Breweries', 'admin menu', 'wbl-breweries' ),
            'name_admin_bar'     => _x( 'Brewery', 'add new on admin bar', 'wbl-breweries' ),
            'add_new'            => _x( 'Add New', 'brewery', 'wbl-breweries' ),
            'add_new_item'       => __( 'Add New Brewery', 'wbl-breweries' ),
            'new_item'           => __( 'New Brewery', 'wbl-breweries' ),
            'edit_item'          => __( 'Edit Brewery', 'wbl-breweries' ),
            'view_item'          => __( 'View Brewery', 'wbl-breweries' ),
            'all_items'          => __( 'All Breweries', 'wbl-breweries' ),
            'search_items'       => __( 'Search Breweries', 'wbl-breweries' ),
            'parent_item_colon'  => __( 'Parent Breweries:', 'wbl-breweries' ),
            'not_found'          => __( 'No breweries found.', 'wbl-breweries' ),
            'not_found_in_trash' => __( 'No breweries found in Trash.', 'wbl-breweries' )
        ];

        $args = [
            'labels'             => $labels,
            'description'        => __( 'Description.', 'wbl-breweries' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => [ 'slug' => 'brewery' ],
            'supports'           => [ 'title' ],
            'has_archive'        => true,
        ];

        register_post_type( 'brewery', $args );
    }

    public static function register_brewery_custom_fields() {

        if( function_exists('acf_add_local_field_group') ) {
            acf_add_local_field_group(array(
                'key' => 'group_brewery_details',
                'title' => 'Brewery Details',
                'fields' => array(
                    array(
                        'key' => 'field_brewery_id',
                        'label' => 'Id',
                        'name' => 'brewery_id',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_name',
                        'label' => 'Name',
                        'name' => 'brewery_name',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_type',
                        'label' => 'Type',
                        'name' => 'brewery_type',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_street',
                        'label' => 'Street',
                        'name' => 'brewery_street',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_address_2',
                        'label' => 'Address 2',
                        'name' => 'brewery_address_2',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_address_3',
                        'label' => 'Address 3',
                        'name' => 'brewery_address_3',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_city',
                        'label' => 'City',
                        'name' => 'brewery_city',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_state',
                        'label' => 'State',
                        'name' => 'brewery_state',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_county_province',
                        'label' => 'County/Province',
                        'name' => 'brewery_county_province',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_postal_code',
                        'label' => 'Postal Code',
                        'name' => 'brewery_postal_code',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_country',
                        'label' => 'Country',
                        'name' => 'brewery_country',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_longitude',
                        'label' => 'Longitude',
                        'name' => 'brewery_longitude',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_latitude',
                        'label' => 'Latitude',
                        'name' => 'brewery_latitude',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_phone',
                        'label' => 'Phone',
                        'name' => 'brewery_phone',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_website_url',
                        'label' => 'Website URL',
                        'name' => 'brewery_website_url',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_updated_at',
                        'label' => 'Updated At',
                        'name' => 'brewery_updated_at',
                        'type' => 'date_time_picker',
                        'instructions' => '',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_brewery_created_at',
                        'label' => 'Created At',
                        'name' => 'brewery_created_at',
                        'type' => 'date_time_picker',
                        'instructions' => '',
                        'required' => 0,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'brewery',
                        ),
                    ),
                ),

            ));
                    
        }

    }



}
