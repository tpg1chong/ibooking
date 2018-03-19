<?php

/* -- import --*/

# Places
require_once 'Property/category.php';
require_once 'Property/type.php';
require_once 'Property/zone.php';
require_once 'Property/facilities.php';
require_once 'Property/payment.php';
require_once 'Property/transportation.php';

# Room
require_once 'Property/RoomType.php';
require_once 'Property/amenities.php';
require_once 'Property/offers.php';


class Property_Model extends Model{

    public function __construct() {
        parent::__construct();

        

        # Places
        $this->category = new category();
        $this->type = new type();
        $this->zone = new zone();
        $this->facilities = new facilities();
        $this->payment_options = new payment();
        $this->transportation = new transportation();


        # Room
        $this->room_type = new RoomType();
        $this->amenities = new amenities();
        $this->offers = new offers();

    }


}
