<?php

/* -- import --*/

# Places
require_once 'Property/category.php';
require_once 'Property/type.php';
require_once 'Property/facilities.php';
require_once 'Property/payment.php';
require_once 'Property/transportation.php';

require_once 'Property/facilities.php';
require_once 'Property/Facility_Types.php';

# Room
require_once 'Property/RoomType.php';
require_once 'Property/amenities.php';
require_once 'Property/offers.php';


require_once 'Property/Room_Category.php';
require_once 'Property/Room_Offer_Types.php';
require_once 'Property/Room_Offers.php';



class Property_Model extends Model{

    public function __construct() {
        parent::__construct();

        # Places
        $this->category = new category();
        $this->type = new type();
        $this->facilities = new facilities();

        $this->facility = new facilities();
        $this->facility_types = new Facility_Types();
        
        $this->payment_options = new payment();
        $this->transportation = new transportation();


        # Room
        $this->room_type = new RoomType();
        $this->amenities = new amenities();
        $this->offers = new offers();


        $this->room_category = new Room_Category();
        $this->room_offer_types = new Room_Offer_Types();
        $this->room_offers = new Room_Offers();

    }


}
