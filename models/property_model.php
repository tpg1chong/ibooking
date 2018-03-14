<?php

# import
require_once 'Property/type.php';
require_once 'Property/zone.php';
require_once 'Property/facilities.php';
require_once 'Property/amenities.php';
require_once 'Property/offers.php';
require_once 'Property/payment.php';
require_once 'Property/transportation.php';

class Property_Model extends Model{

    public function __construct() {
        parent::__construct();

        $this->type = new type();
        $this->zone = new zone();
        $this->facilities = new facilities();
        $this->amenities = new amenities();
        $this->offers = new offers();
        $this->payment = new payment();
        $this->transportation = new transportation();
    }


}
