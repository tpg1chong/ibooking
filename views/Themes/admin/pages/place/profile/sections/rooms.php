


<div style="max-width: 750px;padding-top: 24px;">

	<form class="mbl" data-action-contact="search">
		<table>
			<tbody><tr>
				<td style="width: 100%">
					<h3 class="fwn">Property Rooms</h3>
					<div class="fsm" style="margin-top: 2px">1 results</div>
				</td>
				<td><a data-plugins="lightbox" href="<?=URL?>place/add_room/" class="btn btn-blue"><i class="icon-plus mrs"></i><span>New Room</span></a></td>
			</tr>
		</tbody></table>
	</form>

<?php 


$this->clientList[] = array('name'=>'ดีลักซ์ (Deluxe)', );
$this->clientList[] = array('name'=>'ดีลักซ์ วิวสวนสาธารณะ (Deluxe Park View)', );
$this->clientList[] = array('name'=>'King or Double Room with Lounge Access', );

$i = 0;
foreach ($this->clientList as $key => $val) {
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
			<a class="btn-icon"><i class="icon-pencil"></i></a>
			<a class="btn-icon"><i class="icon-trash-o"></i></a>
		</div>
	</header>


	<div class="section-table-item-desc">
		<table><tbody>
			
			<tr>
				<td style="width: 40%">
					<label>รูป:</label>
					<p><?php
					if( !empty($val['create_date']) ){

						echo '<span>'. date('F j, Y', strtotime($val['create_date'])).'</span>';
						if( !empty($val['user_create_username']) ){
							echo '<span class="fcg"> - By '.$val['user_create_username'].'</span>';
						}
					}
					else{
						echo '-';
					}
					
					?></p>
				</td>

				<td style="width: 20%">
					<label>จำนวนห้องพัก:</label>
					<p><?php
					if( !empty($val['create_date']) ){

						echo '<span>'. date('F j, Y', strtotime($val['create_date'])).'</span>';
						if( !empty($val['user_create_username']) ){
							echo '<span class="fcg"> - By '.$val['user_create_username'].'</span>';
						}
					}
					else{
						echo '-';
					}
					
					?></p>
				</td>

				<td style="width: 20%;white-space: nowrap;">
					<label>จำนวนผู้เข้าพัก:</label>
					<p><?= !empty($val['budget']) ? number_format($val['budget']).' ฿': '-' ?></p>
				</td>

				<td style="width: 20%">
					<label>Status:</label>
					<p><?= !empty($val['status_name']) ? $val['status_name']: '-' ?></p>
				</td>
			</tr>

			
			<tr>
				<td rowspan="2" colspan="3">
					<label>สิ่งอำนวยความสะดวกในห้องพัก:</label>
					<p><?= !empty($val['note']) ? $val['note']: '-' ?></p>
				</td>
				<td>
					<label>Price:</label>
					<p><?= !empty($val['status_name']) ? $val['status_name']: '-' ?></p>
				</td>
				
			</tr>
			<tr>
				<td>

					<label>อัพเดทข้อมูลล่าสุด:</label>

					<div>
						<?php
						if( !empty($val['update_date']) ){

							echo '<p>'.$val['update_date'].'</p>';
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