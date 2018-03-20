<?php

$form = new Form();
$form = $form->create()
	->elem('div')->style('horizontal')
	->addClass('pal');

$form   ->field("building_type")
        ->name( 'building[type]' )
        ->label( 'ประเภท' )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->select(  $this->typeList )
        ->value( isset($_GET['name']) ? $_GET['name']: '' );


$form   ->field("building_name")
        ->name( 'building[name]' )
        ->label('Place Name')
        ->autocomplete('off')
        ->addClass('inputtext');


echo $form->html();
