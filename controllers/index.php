<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        /*$this->view->elem('body')->addClass('home');
        $this->view->setPage('has_home', 1);

        $this->view->render('design/home');*/

        $this->error();
    }

    public function search($page=null) {


    	// print_r($page); die;
        $this->error();
    }
}
