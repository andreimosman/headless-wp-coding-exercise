<?php

namespace OpenBreweries;

class ApiClient {
    private static $instance;
    private $data;
    const API_URL = 'https://api.openbrewerydb.org/breweries';

    public function getInstance() {
        if(!self::$instance) {
            self::$instance = new ApiClient();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    private function getData() {
        if(!$this->data) {
            $this->data = $this->fetchData();
        }
        return $this->data;
    }

    private function fetchData() {
        $data = wp_remote_get(self::API_URL);
        if(is_wp_error($data)) {
            throw new \Exception('Error fetching data from API');
        }
        $data = json_decode($data['body'], true);
        return $data;
    }

    public function getIterator(): BreweriesIterator {
        return new BreweriesIterator($this->getData());
    }


}
