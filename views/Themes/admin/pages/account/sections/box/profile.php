<div class="box user-box">
	<div class="title-box"><div class="title">Update Name or Profile Image</div></div>
	<?php
		$form = new Form();
		$form = $form->create()
			->style('horizontal')
			->attr('data-plugins', 'changeForm')
			->addClass('form-insert box-content');


		$form   ->field("user_name")
		        ->label( 'First Name' )
		        ->autocomplete('off')
		        ->addClass('inputtext')
		        ->placeholder('')
		        ->value( '' );

		$form   ->field("Last Name")
		        ->label('Email Address')
		        ->autocomplete('off')
		        ->addClass('inputtext');

		$form   ->field("Profile Image")
		        ->label('Profile Image')
		        ->text('<div class="anchor anchor96 clearfix image-wrapper">'.
		        	'<div class="avatar lfloat no-avatar mrm"><div class="initials"><i class="icon-user"></i></div></div>'.
		        	'<div class="content"><div class="spacer"></div><div class="massages">'.
		        		'<div class="fsm fcg">For best results, upload a high resolution image</div>'.
		        	'</div></div>'.

		        '</div>');

		$form   ->submit()
				->addClass('btn btn-blue btn-submit')
		        ->value('Save Changes');

		echo $form->html();
	?>
</div>

