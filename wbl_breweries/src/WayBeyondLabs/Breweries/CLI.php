<?php

namespace WayBeyondLabs\Breweries;

class CLI {

    /**
	 * Import data from the Open Brewery API
	 *
	 * @since  0.0.1
	 * @author Andrei de Oliveira Mosman
	 */
    public function import() {
        \WP_CLI::line( 'Importing!' );

        $api = \OpenBreweries\ApiClient::getInstance();
        $breweries = $api->getIterator();

        $fieldSuffix = "wbl_b_";

        while($breweries->valid()) {
            $brewery = $breweries->current();

            $slug = is_numeric($brewery['id']) ? sanitize_title($brewery['name']) : $brewery['id'];

            $postData = [
                'post_title' => $brewery['name'],
                'post_status' => 'publish',
                'post_type' => 'brewery',
                'post_name' => $slug,
            ];

            if( post_exists($postData['post_title']) ) {
                \WP_CLI::line( 'Post already exists: ' . $postData['post_title'] );
            } else {
                $postId = wp_insert_post($postData);

                if( $postId ) {
                    \WP_CLI::line( 'Created post: ' . $postData['post_title'] );

                    foreach($brewery as $key => $value) {
                        update_field($fieldSuffix . $key, $value, $postId);
                    }
                } else {
                    \WP_CLI::line( 'Failed to create post: ' . $postData['post_title'] );
                }
            }

            $breweries->next();
            
        }


    }

}
