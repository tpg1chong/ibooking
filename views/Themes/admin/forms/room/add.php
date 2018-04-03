<?php

$form = new Form();
$form = $form->create()->elem('div')->addClass('form-insert');
/*->style('horizontal')*/

$form   ->field("name")->label( 'Room Name' )->addClass('inputtext');
$form   ->field("total")->label( 'จำนวนห้องพัก' )->addClass('inputtext');
$form   ->field("guests")->label( 'จำนวนผู้เข้าพัก' )->addClass('inputtext');
$form   ->field("price")->label( 'ราคาเริ่มต้น/คืน' )->addClass('inputtext');
$form   ->field("group_price ")->label( 'ราคาเหมากลุ่ม (Min-Max = Price)/คืน' )->text(''.

	'<table><tr>'.
		'<td style="width:60px"><input style="width:100%;padding-right:0;" class="inputtext" type="number" name="group_price[min][]"></td>'.
		'<td>-</td>'.
		'<td style="width:60px"><input style="width:100%;padding-right:0;" class="inputtext" type="number" name="group_price[max][]"></td>'.
		'<td>=</td>'.
		'<td><input class="inputtext" type="number" name="group_price[price][]"></td>'.
		'<td style="white-space: nowrap;">'.
			'<button style="width:20px;height:20px;border-ra;display: inline-block;font-size: 11px;border-radius: 50%;border: 1px solid #ccc;background-color: #fff;color: #666;margin-left: 2px;" type="button" class=""><i class="icon-plus"></i></button>'.
			'<button style="width:20px;height:20px;border-ra;display: inline-block;font-size: 11px;border-radius: 50%;border: 1px solid #ccc;background-color: #fff;color: #666;margin-left: 2px;" type="button" class=""><i class="icon-remove"></i></button>'.
		'</td>'.
	'</tr></table>'.

'');

$form   ->field("offers")->label( 'สิ่งอำนวยความสะดวกในห้องพัก' )->type('checkbox')->items( $this->offersList );
$form   ->field("size")->label( 'ขนาดห้องพัก' )->addClass('inputtext');

$formRoom = $form->html();

# title
$arr['title'] = 'Create Room';


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

# fotter: button
$arr['button'] = '<button type="submit" class="btn btn-primary btn-submit"><span class="btn-text">'.Translate::val('Save').'</span></button>';
$arr['bottom_msg'] = '<a class="btn" data-action="close"><span class="btn-text">'.Translate::val('Cancel').'</span></a>';

$arr['width'] = 950;

echo json_encode($arr);