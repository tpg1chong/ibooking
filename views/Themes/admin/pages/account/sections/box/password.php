<div class="box user-box">
	<div class="title-box"><div class="title">Update Your Password</div></div>
	<?php
		$form = new Form();
		$form = $form->create()
			->style('horizontal')
			->attr('data-plugins', 'changeForm')
			->addClass('form-insert box-content');


		$form   ->field("user_name")
		        ->label( 'Current Password' )
		        ->autocomplete('off')
		        ->addClass('inputtext')
		        ->placeholder('')
		        ->value( '' );

		$form   ->field("Last Name")
		        ->label('New Password')
		        ->autocomplete('off')
		        ->addClass('inputtext');

		$form   ->field("Profile Image")
		        ->label('Retype New Password')
		        ->autocomplete('off')
		        ->addClass('inputtext');

		$form   ->submit()
				->addClass('btn btn-blue btn-submit')
		        ->value('Save Changes');

		echo $form->html();
	?>
</div>