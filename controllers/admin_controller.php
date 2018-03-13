<?php

class Admin_Controller extends Controller
{
	
	public function __construct( $a ) {
        parent::__construct();

        $this->setPage( array(
            'theme' => 'admin',
            'theme_options' => array(
                'head' => true,
                'leftMenu' => true,
            ),
            'loggedOn' => true,
            'render' => !empty($a[1]) ?$a[1]:'', 
        ) );
    }

    public function navTrigger() {
        if( $this->format!='json' ) $this->error();
        if( isset($_REQUEST['status']) ){
            Session::init();                          
            Session::set('isPushedLeft', $_REQUEST['status']);
        }
    }

    public function index($value='') {
        $this->error();
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