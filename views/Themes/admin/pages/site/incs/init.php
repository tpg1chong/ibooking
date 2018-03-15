<?php

$this->pageURL = URL.'admin/site/';
$this->count_nav = 5;
$menu = array();


$sub = array();
$sub[] = array('key'=>'font', 'text'=>'Font', 'url' => $this->pageURL.'font');
// $sub[] = array('key'=>'alert', 'text'=>'Site Alert', 'url' => $this->pageURL.'site_alert');
$sub[] = array('key'=>'slide', 'text'=>'Slide Deck Strip', 'url' => $this->pageURL.'slide');
$sub[] = array('key'=>'banner', 'text'=>'Banner', 'url' => $this->pageURL.'banner');

$this->count_nav+=count($sub);
$menu[] = array('text' => 'Design', 'url' => '', 'sub' => $sub);



/* System */
$sub = array();
// $sub[] = array('key'=>'overview', 'text'=>'Overview', 'url' => $this->pageURL.'overview');
// $sub[] = array('key'=>'domain', 'text'=>'Domain', 'url' => $this->pageURL.'domain');
// $sub[] = array('key'=>'favicon', 'text'=>'Favicon', 'url' => $this->pageURL.'favicon');
$sub[] = array('key'=>'seo', 'text'=>'SEO', 'url' => $this->pageURL.'seo');
// $sub[] = array('key'=>'localization', 'text'=>'Language & Region', 'url' => $this->pageURL.'localization');
$sub[] = array('key'=>'social', 'text'=>'Social Setup', 'url' => $this->pageURL.'social');
$sub[] = array('key'=>'analytics', 'text'=>'Google Analytics', 'url' => $this->pageURL.'analytics');


$this->count_nav+=count($sub);
$menu[] = array('text' => 'Config', 'url' => '', 'sub' => $sub);

