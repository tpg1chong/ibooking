<?php


$this->pageURL = URL.'admin/location/';
$this->count_nav = 0;
$menu = array();


$sub = array();
$sub[] = array('key'=>'place', 'text'=>'Place', 'url' => $this->pageURL.'place');
$this->count_nav+=count($sub);
$menu[] = array('text' => '', 'url' => '', 'sub' => $sub);


/*location*/
$sub = array();
$sub[] = array('key'=>'region', 'text'=>'Region', 'url' => $this->pageURL.'region');
$sub[] = array('key'=>'country', 'text'=>'Country', 'url' => $this->pageURL.'country');
$sub[] = array('key'=>'geography', 'text'=>'Geography', 'url' => $this->pageURL.'geography'); //ภูมิภาค
$sub[] = array('key'=>'city', 'text'=>'City', 'url' => $this->pageURL.'city');




$this->count_nav+=count($sub);
$menu[] = array('text' => 'Locations', 'url' => '', 'sub' => $sub);
