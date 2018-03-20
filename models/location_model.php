<?php


/* -- import --*/

require_once 'Location/region.php';
require_once 'Location/country.php';
require_once 'Location/geography.php';
require_once 'Location/city.php';


# Places
require_once 'Location/Places.php';

class Location_Model extends Model{

	public function __construct() {
		parent::__construct();

		$this->region = new region();
		$this->country = new country();
		$this->geography = new geography();
		$this->city = new city();

		$this->places = new Places();

	}
}
