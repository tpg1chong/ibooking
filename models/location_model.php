<?php
require_once 'Location/region.php';
require_once 'Location/country.php';
require_once 'Location/geography.php';

class Location_Model extends Model{

  public function __construct() {
    parent::__construct();

    $this->region = new region();
    $this->country = new country();
    $this->geography = new geography();

  }
}
