<?php

class __test extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$this->error();
    }

    public function lightbox($tap=null) {
        

        if( $tap=='form' ){
        	$this->view->setPage('path','Forms/__test/lightbox');
        	$this->view->render("add");
        }
        else{
        	echo json_encode( array(
	        	'body' => 'This Lightbox',
	        	'width' => 200
	        ) );
        }
        
    }

    public function save()
    {
    	echo json_encode( array(
    		'message' => 'Ok'
    	) );
    }
}