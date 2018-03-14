<?php

# import
require_once 'Property/type.php';
require_once 'Property/zone.php';

class Property_Model extends Model{

    public function __construct() {
        parent::__construct();
        
        $this->type = new type();
        $this->zone = new zone();
    }


}