<?php

$this->pageURL = URL.'manage/';

$image = '';
if( !empty($this->me['image_url']) ){
	$image = '<div class="avatar lfloat mrm"><img class="img" src="'.$this->me['image_url'].'" alt="'.$this->me['fullname'].'"></div>';
}
else{
	$image = '<div class="avatar lfloat no-avatar mrm"><div class="initials"><i class="icon-user"></i></div></div>';
}

echo '<div class="navigation-main-bg navigation-trigger"></div>';
echo '<nav class="navigation-main" role="navigation"><a class="navigation-btn-trigger navigation-trigger"><span></span></a>';

echo '<div class="navigation-main-header"><div class="anchor clearfix">'.$image.'<div class="content"><div class="spacer"></div><div class="massages"><div class="fullname">'.$this->me['name'].'</div></div></div></div></div>';

echo '<div class="navigation-main-content">';


$overview[] = array('key'=>'overview', 'text'=> 'Overview', 'link'=>$this->pageURL.'overview', 'icon'=>'area-chart');
foreach ($overview as $key => $value) {
	if( $value['key']=='view_website' ) continue;
	if( empty($this->permit[$value['key']]['view']) ) unset($overview[$key]);
}
if( !empty($overview)){
	// echo $this->fn->manage_nav($overview, $this->getPage('on'));
}


// 
$site[] = array('key'=>'plan', 'text'=> Translate::Menu('Site Alert'), 'link'=>$this->pageURL.'plan', 'icon'=>'bell-o');
$site[] = array('key'=>'banner', 'text'=> Translate::Menu('Banners'), 'link'=>$this->pageURL.'banner', 'icon'=>'picture-o');
// $site[] = array('key'=>'agency', 'text'=> 'หน่วยงานที่เกี่ยวข้อง', 'link'=>$this->pageURL.'agency', 'icon'=>'address-book-o');
// $menu[] = array('key'=>'site_location', 'text'=> Translate::Menu('Locations'), 'link'=>$this->pageURL.'blog', 'icon'=>'map-o');
foreach ($site as $key => $value) {
	if( $value['key']=='view_website' ) continue;
	if( empty($this->permit[$value['key']]['view']) ) unset($site[$key]);
}
if( !empty($site)){
	echo $this->fn->manage_nav($site, $this->getPage('on'));
}




// $menu[] = array('key'=>'category', 'text'=> Translate::Menu('Category'), 'link'=>$this->pageURL.'category', 'icon'=>'code-fork');

$menu[] = array('key'=>'forum', 'text'=> Translate::Val('Blog Forum'), 'link'=>$this->pageURL.'forum', 'icon'=>'list-alt');
$menu[] = array('key'=>'category', 'text'=> Translate::Val('Blog Category'), 'link'=>$this->pageURL.'category', 'icon'=>'code-fork');
$menu[] = array('key'=>'topic', 'text'=> Translate::Val('Blog'), 'link'=>$this->pageURL.'blog', 'icon'=>'newspaper-o');
foreach ($menu as $key => $value) {
	if( empty($this->permit[$value['key']]['view']) ) unset($menu[$key]);
}
if( !empty($menu)){
	echo $this->fn->manage_nav($menu, $this->getPage('on'));
}


/*foreach ($eBook as $key => $value) {
	if( empty($this->permit[$value['key']]['view']) ) unset($eBook[$key]);
}
if( !empty($eBook)){
	echo $this->fn->manage_nav($eBook, $this->getPage('on'));
}
*/

/*$inbox[] = array('key'=>'inbox', 'text'=> Translate::Menu('Inbox'), 'link'=>$this->pageURL.'blog', 'icon'=>'envelope-open-o');
foreach ($inbox as $key => $value) {
	if( empty($this->permit[$value['key']]['view']) ) unset($inbox[$key]);
}
if( !empty($inbox)){
	echo $this->fn->manage_nav($inbox, $this->getPage('on'));
}*/


#Menu
// $cog[] = array('key'=>'site', 'text'=> Translate::Menu('Site Manager'), 'link'=>$this->pageURL.'site', 'icon'=>'desktop');
$cog[] = array('key'=>'view_website', 'text'=> Translate::Menu('View Website'), 'link'=>URL, 'icon'=>'level-up', 'target'=>'_web' );
// $cog[] = array('key'=>'settings','text'=> 'Basic Info','link'=>$this->pageURL.'settings','icon'=>'cog');
$cog[] = array('key'=>'business', 'text'=> 'Company Info','link'=>$this->pageURL.'business','icon'=>'cog');

foreach ($cog as $key => $value) {
	if( empty($this->permit[$value['key']]['view']) ) unset($cog[$key]);
}
if( !empty($cog)){
	echo $this->fn->manage_nav($cog, $this->getPage('on'));
}


#Menu
$social[] = array('key'=>'seo', 'text'=> 'Google Seo', 'link'=>$this->pageURL.'seo', 'icon'=>'google' );
$social[] = array('key'=>'analytics','text'=> 'Google Analytic','link'=>$this->pageURL.'analytics','icon'=>'line-chart');
$social[] = array('key'=>'social','text'=> 'Social Media','link'=>$this->pageURL.'social','icon'=>'globe');
echo $this->fn->manage_nav($social, $this->getPage('on'));


$authorization[] = array('key'=>'authorization', 'text'=> 'Roles & Permissions', 'link'=>$this->pageURL.'authorization','icon'=>'users' );
foreach ($authorization as $key => $value) {
	if( empty($this->permit[$value['key']]['view']) ) unset($authorization[$key]);
}
if( !empty($cog)){
	echo $this->fn->manage_nav($authorization, $this->getPage('on'));
}



echo '</div>';

	echo '<div class="navigation-main-footer">';


echo '<ul class="navigation-list">'.

	'<li class="clearfix">'.
		'<div class="navigation-main-footer-cogs">'.
			'<a data-plugins="dialog" href="'.URL.'logout/?next='.URL.'manage"><i class="icon-power-off"></i><span class="visuallyhidden">Log Out</span></a>'.
			// '<a href="'.URL.'logout/admin"><i class="icon-cog"></i><span class="visuallyhidden">Settings</span></a>'.
		'</div>'.
		'<div class="navigation-brand-logo clearfix"><img class="lfloat mrm" src="'.IMAGES.'favicon.png">'.( !empty( $this->system['title'] ) ? $this->system['title']:'' ).'</div>'.
	'</li>'.
'</ul>';

echo '</div>';


echo '</nav>';