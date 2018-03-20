<form data-plugins="formPlacesCreate" class="form-places-create uiBoxWhite" action="<?=URL?>location/save/places" method="post">

	<div class="form-places-create-header cleafix">
		<div class="form-places-create-title"><i class="icon-plus mrs"></i>Places Create</div>
	</div>
	<?php
	$fristStep = 'location';

	$step = array();
	$step[] = array('text'=>'Location', 'name'=>'location');
	$step[] = array('text'=>'Basic Info', 'name'=>'basic');
	$step[] = array('text'=>'Details', 'name'=>'detail');
	$step[] = array('text'=>'Rooms', 'name'=>'room');

	echo '<div data-ref="step">';
		echo $this->fn->stepList($step, $fristStep);
	echo '</div>';

	?>	

	<input id="options_type" type="hidden" name="options[type]" value="<?=$fristStep?>">
	<div class="form-places mbm">
		<?php

		foreach ($step as $key => $value) {

			$path = __DIR__. "/create/{$value['name']}.php";
			if( file_exists($path) ){

				$active = $fristStep==$value['name'] ? ' active':'';
				echo '<div class="form-places-section'.$active.'" data-section="'.$value['name'].'">';
				require_once "create/{$value['name']}.php";
				echo '</div>';
			}

			
		}

		?>
	</div>

	<div class="uiBorderTop pvm clearfix">
		<div class="lfloat">
			<button data-action="prev" type="button" class="btn">Back</button>
		</div>
		<div class="rfloat">
			<button type="submit" class="btn btn-blue">Next</button>
		</div>
	</div>

</div>