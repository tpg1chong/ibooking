<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $this->view->render('home/display');
    }

    public function search($page=null) {
        $this->error();
    }
}
