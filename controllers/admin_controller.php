<?php

class Admin_Controller extends Controller
{
	
	public function __construct() {
        parent::__construct();
    }

    public function index($value='')
    {
        echo 'This Admin';

        $this->view->setData('ssss', '111');
        $this->view->setPage('ssss', '111');
        $this->view->elem('body')->addClass('hone');
        // print_r($this->page);die;

        $this->view->render('index');
    }


    /* -- authorization -- */
    public function authorization() {
        
        $this->view->setPage('on', 'authorization' );

        $this->view->setData('roles', $this->model->query('users')->roles());
        $users = $this->model->query('users')->lists();
        
        $this->view->setData('data', $users['lists']);

        $this->view->render("authorization/display");
    }
}