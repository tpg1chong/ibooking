<div style="max-width: 750px;padding-top: 24px;">

	<form class="mbl" data-action-contact="search">
		<table>
			<tbody><tr>
				<td style="width: 100%">
					<h3 class="fwn">Property Venues</h3>
					<?=!empty($this->roomsList) ? '<div class="fsm" style="margin-top: 2px">'.count( $this->roomsList ).' results</div>': '<span class="fss">Results Not Found</span>'; ?>
				</td>
				<td><a data-plugins="lightbox" href="<?=URL?>property/add/room?building=<?=$this->item['id']?>&category=<?= !empty($_GET['category']) ? $_GET['category']: '' ?>" class="btn btn-blue"><i class="icon-plus mrs"></i><span>New Room</span></a></td>
			</tr>
		</tbody></table>
	</form>

<?php 


$i = 0;
foreach ($this->roomsList as $key => $val) {
	$i++;

?>
<div class="section-table-item">
	<div class="sequence-float"><?=$i?></div>
	<header class="section-table-item-header clearfix">

		<!-- <div class="title anchor clearfix">
			<div class="lfloat mrm pic">
				
			</div>
			<div class="content"><div class="spacer"></div><div class="massages">
				
				<div class="subname">Super Admin</div>
			</div></div>

		</div> -->
		<div class="title">
			<h3><?=$val['name']?></h3>
		</div>

		<div class="actions">
			<a class="btn-icon" data-plugins="lightbox" href="<?=URL?>property/edit/room/<?=$val['id']?>"><i class="icon-pencil"></i></a>
			<a class="btn-icon" data-plugins="lightbox" href="<?=URL?>property/del/room/<?=$val['id']?>"><i class="icon-trash-o"></i></a>
		</div>
	</header>


	<div class="section-table-item-desc">
		<table class="section-table-item-table"><tbody>
			
			<tr>
				<td style="width:300px;padding: 10px;">
					<div class="pic" style="display: block;height: 0;width: 100%;overflow: hidden;position: relative;padding-top: 56.25%;background-color: #f0f0f0;"></div>
				</td>

				<td>

					<table class="table-data-info">
						<tr>
							<td class="td-label">Status:</td>
							<td colspan="2">
								<span class="ui-status">Available</span>
							</td>
						</tr>
						<tr>
							<td class="td-label">ห้องพักทั้งหมด:</td>
							<td class="td-data"><p><?= !empty($val['room_total']) ? $val['room_total']: '-' ?></p></td>
							<td class="text-hind">ห้อง</td>
						</tr>
						<tr>
							<td class="td-label">ผู้เข้าพักที่รับได้:</td>
							<td class="td-data"><?= !empty($val['guests']) ? $val['guests']: '-' ?></td>
							<td class="text-hind">ท่าน/ห้อง</td>
						</tr>
						<tr>
							<td class="td-label">ขนาดห้องพัก:</td>
							<td class="td-data" colspan="2">
								
								<span><?= $val['living_area_sqm']>0 ? round($val['living_area_sqm']): '-' ?></span> <span class="text-hind">m²</span> / <span><?= $val['living_area_foot']>0 ? round($val['living_area_foot']): '-' ?></span> <span class="text-hind">ft²</span>
							</td>
						</tr>
						<tr>
							<td class="td-label">ราคา:</td>
							<td class="td-data"><strong class="fwxl fcr"><?= !empty($val['price']) ? number_format($val['price']): '-' ?></strong></td>
							<td class="text-hind">/ห้อง/คืน</td>
						</tr>

						<tr>
							<td class="td-label" colspan="3">
								<?php

								if( !empty($val['group_price']) ){
									echo '<label>ราคาเหมารวมกลุ่ม:</label>';
									echo '<table class="table-groupprice"><tbody>';
									foreach ($val['group_price'] as $key => $value) {
										
										echo '<tr>';
											echo '<td class="td-min">'.$value['min'].'</td>';
											echo '<td class="td-debar">-</td>';
											echo '<td class="td-max">'.$value['max'].'</td>';
											echo '<td class="td-debar">=</td>';
											echo '<td class="td-price">'. number_format($value['price']).'</td>';
											echo '<td class="td-actions">/ห้อง/คืน</td>';
										echo '</tr>';
									}
									echo '</tbody></table>';
								}

							?>
							</td>
						</tr>
					</table>
					
				</td>
				<td width="width: 20%"></td>
			</tr>

			
			<tr>
				<td colspan="2">
					<label>สิ่งอำนวยความสะดวกในห้องพัก:</label>

					<ul class="uiList list-checkbox"><?php

					$val['offers'] = !empty($val['offers']) ? $val['offers']: array();
					foreach ($this->offersList as $value) {
							
						$icon = in_array($value['id'], $val['offers']) ? 'check': 'remove';
						echo '<li><i class="icon-'.$icon.'"></i><span>'.$value['name'].'</span></li>';
					}
					?>
					</ul>
				</td>
				<td>
					<label>อัพเดทข้อมูลล่าสุด:</label>

					<div>
						<?php
						if( !empty($val['updated']) ){

							echo '<p>'. $this->fn->q('time')->live($val['updated']).'</p>';

							if( !empty($val['user_update_username']) ){
								echo '<div style="font-size: 11px;">By '.$val['user_update_username'].'</div>';
							}
						}
						else{
							echo '<p>-</p>';
						}
						
						?>
					</div>
				</td>
				
			</tr>
		</tbody></table>
	</div>
</div>

<?php } ?>

</div>