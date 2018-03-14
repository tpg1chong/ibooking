<?php


$this->dataList = array();

?><div class="setting-header cleafix">

	<div class="rfloat">

		<a class="btn btn-blue" data-plugins="dialog" href="<?=$url?>add"><i class="icon-plus mrs"></i><span><?=Translate::Val('Add New')?></span></a>

	</div>

	<div class="setting-title"><i class="icon-at mrs"></i>Transportation</div>
</div>

<section class="setting-section">
	<table class="settings-table admin"><tbody>
		<tr>
			<th class="name">Transportation</th>
			<th class="status">เปิดใช้งาน</th>
			<th class="actions"></th>

		</tr>

		<?php foreach ($this->dataList as $key => $item) { ?>
		<tr data-id="<?=$item['id']?>">
			<td class="name fwb"><?php

				echo '<a href="'.$url.'edit/'.$item['id'].'" data-plugins="dialog">'.$item['name'].'</a>';
			?></td>
		

			<td class="status">
				<label class="checkbox"><input data-action="change" type="checkbox" name="forum_enabled"<?=( !empty($item['enabled'])? ' checked':'' )?>></label>
			</td>

			<td class="actions whitespace">
				<?php

				$dropdown = array();

				$dropdown[] = array(
	                'text' => Translate::Val('Edit'),
	                'href' => $url.'edit/'.$item['id'],
	                'attr' => array('data-plugins'=>'dialog'),
	                // 'icon' => 'pencil'
	            );

				$dropdown[] = array(
	                'text' => Translate::Val('Delete'),
	                'href' => $url.'del/'.$item['id'],
	                'attr' => array('data-plugins'=>'dialog'),
	                // 'icon' => 'remove'
	            );

	            if( !empty($dropdown) ){

	            
				echo '<a data-plugins="dropdown" class="btn btn-no-padding" data-options="'.$this->fn->stringify( array(
                        'select' => $dropdown,
                        'settings' =>array(
                            'axisX'=> 'right',
                            'parent'=>'.setting-main'
                        ) 
                    ) ).'"><i class="icon-ellipsis-v"></i></a>';

				}


				?>
					
			</td>

		</tr>
		<?php } ?>
	</tbody></table>
</section>