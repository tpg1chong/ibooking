<?php

if( !empty($this->item) ){
	$this->building = $this->item['building_id'];
	$arr['hiddenInput'][] = array('name'=>'id','value'=> $this->item['id'] );
}
else{

	if( isset($_GET['building']) ){
		$this->building = $_GET['building'];
	}

	if( isset($_GET['category']) ){
		$this->category = $_GET['category'];
	}
}




$form = new Form();
$form = $form->create()->elem('div')->addClass('form-insert form-room');

$form   ->field("property_name")->label( 'Room Name' )->addClass('inputtext')->value( !empty($this->item['name']) ? $this->item['name']: '' );
$form   ->field("property_room_total")->label( 'จำนวนห้องพักทั้งหมด' )->type('number')->addClass('inputtext')->value( !empty($this->item['room_total']) ? round($this->item['room_total']): '' );
$form   ->field("property_guests")->label( 'จำนวนผู้เข้าพักที่รับได้' )->type('number')->addClass('inputtext')->value( !empty($this->item['guests']) ? round($this->item['guests']): '' );
$form   ->field("property_price")->label( 'ราคาเริ่มต้น' )->type('number')->addClass('inputtext')->hind('/ ห้อง / คืน')->value( !empty($this->item['price']) ? round($this->item['price']): '' );

$form   ->field("property_group_price ")->label( 'ราคาเหมากลุ่ม (Min-Max = ราคา)/ ห้อง / คืน' )->text( '<table data-plugins="groupPrice" class="table-group-price" data-options="'.$this->fn->stringify( array('data'=> !empty($this->item['group_price']) ? $this->item['group_price']: array() ) ).'"><tbody rel="listsbox"></tbody></table>' );

$form   ->field("property_living_area_sqm")->label( 'ขนาดห้องพัก' )->type('number')->addClass('inputtext')->hind('m²')->value( !empty($this->item['living_area_sqm']) ? round($this->item['living_area_sqm']): '' );
$form   ->field("property_living_area_foot")->label('&nbsp;')->type('number')->addClass('inputtext')->hind('ft²')->value( !empty($this->item['living_area_foot']) ? round($this->item['living_area_foot']): '' );
$form   ->field("property_offers")->name('property_offers[]')->label( 'สิ่งอำนวยความสะดวกในห้องพัก' )->type('checkbox')->items( $this->offersList )->value( !empty($this->item['offers']) ? $this->item['offers']: '' );


$formRoom = $form->html();

# title
$arr['title'] = 'Create Room';
$arr['hiddenInput'][] = array('name'=>'property_building_id','value'=> !empty($this->building) ? $this->building: '' );
$arr['hiddenInput'][] = array('name'=>'property_category_id','value'=> !empty($this->category) ? $this->category: '' );

$arr['body'] = '<div style="height: 560px;margin: -20px;">'.

	'<table><tr>'.
		'<td style="background: #eee;padding: 20px;vertical-align: top;">'.$formRoom.'</td>'.
		'<td style="width: 660px;vertical-align: top;"><div style="height: 560px;overflow-y: scroll;padding: 20px;">'.
			'<div class="uiBoxYellow pam mbm">Recommended size 1280x720 px (.JPG)</div>'.
			'<div class="table-insert-picture-wrap" data-plugins="tableInsertPicture" data-options="'.$this->fn->stringify( array(
				'data'=> array(),
				// 'autoupload' => 1,

			) ).'"><div>'.
		'</div></td>'.

	'</tr></table>'.

'</div>';

# set form
$arr['form'] = '<form class="js-submit-form" method="post" action="'.URL. 'property/save/room/"></form>';

# fotter: button
$arr['button'] = '<button type="submit" class="btn btn-primary btn-submit"><span class="btn-text">'.Translate::val('Save').'</span></button>';
$arr['bottom_msg'] = '<a class="btn" data-action="close"><span class="btn-text">'.Translate::val('Cancel').'</span></a>';

$arr['width'] = 950;

echo json_encode($arr);