<?php

$this->pageURL = URL.'admin/site/';
$this->count_nav = 5;
$menu = array();



$sub = array();
$sub[] = array('key'=>'alert', 'text'=>'Site Alert', 'url' => $this->pageURL.'site_alert');
$sub[] = array('key'=>'featuredslide', 'text'=>'Featured slides', 'url' => $this->pageURL.'slides');
$sub[] = array('key'=>'banner', 'text'=>'Banner', 'url' => $this->pageURL.'banner');



$this->count_nav+=count($sub);
$menu[] = array('text' => 'Design', 'url' => '', 'sub' => $sub);


/* System */
$sub = array();
// $sub[] = array('key'=>'overview', 'text'=>'Overview', 'url' => $this->pageURL.'overview');
// $sub[] = array('key'=>'domain', 'text'=>'Domain', 'url' => $this->pageURL.'domain');
$sub[] = array('key'=>'seo', 'text'=>'SEO', 'url' => $this->pageURL.'seo');
// $sub[] = array('key'=>'favicon', 'text'=>'Favicon', 'url' => $this->pageURL.'favicon');
$sub[] = array('key'=>'localization', 'text'=>'Language & Region', 'url' => $this->pageURL.'localization');
$sub[] = array('key'=>'social', 'text'=>'Social Setup', 'url' => $this->pageURL.'social');
$sub[] = array('key'=>'analytics', 'text'=>'Google Analytics', 'url' => $this->pageURL.'analytics');


$this->count_nav+=count($sub);
$menu[] = array('text' => 'Config', 'url' => '', 'sub' => $sub);

