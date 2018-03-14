<?php

$this->pageURL = URL.'admin/property/';
$this->count_nav = 0;
$menu = array();



$sub = array();
$sub[] = array('key'=>'available', 'text'=>'Available', 'url' => $this->pageURL.'available');
$sub[] = array('key'=>'not_available', 'text'=>'Not Available', 'url' => $this->pageURL.'not_available');
$sub[] = array('key'=>'drafts', 'text'=>'Drafts', 'url' => $this->pageURL.'drafts');
$sub[] = array('key'=>'promotions', 'text'=>'Promotions', 'url' => $this->pageURL.'promotions');

$sub[] = array('key'=>'building', 'text'=>'Building', 'url' => $this->pageURL.'building');


$this->count_nav+=count($sub);
$menu[] = array('text' => 'Property', 'url' => '', 'sub' => $sub);


/* System */
$sub = array();

$sub[] = array('key'=>'type', 'text'=>'Property type', 'url' => $this->pageURL.'type'); // ประเภทกจิการ
$sub[] = array('key'=>'zone', 'text'=>'Property zone', 'url' => $this->pageURL.'zone'); // ย่าน
$sub[] = array('key'=>'facilities', 'text'=>'Property facilities', 'url' => $this->pageURL.'facilities'); // บริการ สถานที่

$sub[] = array('key'=>'amenities', 'text'=>'Room amenities', 'url' => $this->pageURL.'amenities'); // สิ่งอำนวยความสะดวก
$sub[] = array('key'=>'offers', 'text'=>'Room offers', 'url' => $this->pageURL.'offers'); // บริการ

$sub[] = array('key'=>'payment_options', 'text'=>'Payment options', 'url' => $this->pageURL.'payment_options'); // การชำระเงิน
$sub[] = array('key'=>'transportation', 'text'=>'Transportation', 'url' => $this->pageURL.'transportation'); // ใกล้ ขนส่ง

$this->count_nav+=count($sub);
$menu[] = array('text' => 'Management', 'url' => '', 'sub' => $sub);

