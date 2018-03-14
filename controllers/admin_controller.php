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
        // $this->view->render('index');
    }
    public function business() {
        $this->view->setPage('on', 'business');

        $this->view->render("business/display");
    }

    /* -- account -- */
    public function account($section='settings')
    {

        if( !in_array($section, array('settings', 'authorization') )) $this->error();

        if( $section=='authorization' ){
            $this->view->setPage('on', 'authorization');
            $this->view->setData('roles', $this->model->query('users')->admin_roles());

            $users = $this->model->query('users')->find();
            $this->view->setData('data', $users['lists']);
        }

        if($section=='settings'){
            $this->view->setPage('on', 'my');
        }

        $this->view->setData('section', $section);
        $this->view->render("account/display");
    }
    public function logout()
    {
        $url = URL.'admin/';
        $this->view->setPage('theme', 'login');

        if( $this->format == 'json' ){
            $this->view->render('confirm_logout');
            exit;
        }

        if( empty($this->me) ){
            header('location:' . $url );
        }

        Session::init();
        Session::destroy();


        $url = !empty($_REQUEST['next'])
            ? $_REQUEST['next']
            : $url;

        Cookie::clear( COOKIE_KEY_ADMIN );
        Cookie::clear( 'login_role' );

        header('location:' . $url);
    }


    /* -- site -- */
    public function site($section='')
    {

        if( $section=='banner' ){
            $this->view->setData('bannersList', array());
        }


        $this->view->setPage('on', 'site_manager');
        $this->view->setData('section', $section);
        $this->view->render("site/display");
    }


    /* -- property -- */
    public function property($section='available')
    {

        $this->view->setPage('on', 'property_manager');
        $this->view->setData('section', $section);


        if( $section=='type' ){
            $results = $this->model->query('property')->type->find();
            $this->view->setData('dataList', $results['items'] );
        }
        elseif( $section=='zone' ){
            $results = $this->model->query('property')->zone->find();
            $this->view->setData('dataList', $results['items'] );
        }
				elseif( $section=='facilities' ){
            $results = $this->model->query('property')->facilities->find();
            $this->view->setData('dataList', $results['items'] );
        }
				elseif( $section=='amenities' ){
            $results = $this->model->query('property')->amenities->find();
            $this->view->setData('dataList', $results['items'] );
        }
				elseif( $section=='offers' ){
            $results = $this->model->query('property')->offers->find();
            $this->view->setData('dataList', $results['items'] );
        }
				elseif( $section=='payment_options' ){
            $results = $this->model->query('property')->payment->find();
            $this->view->setData('dataList', $results['items'] );
        }
				elseif( $section=='transportation' ){
            $results = $this->model->query('property')->transportation->find();
            $this->view->setData('dataList', $results['items'] );
        }


        $this->view->render("property/display");
    }
    public function promotions()
    {
        $this->view->setPage('on', 'promotions');
        $this->error();
    }

    public function blog($section='published')
    {
        if( $section=='forum' ){
            $this->view->setData('forumList', array());
        }

        if( $section=='category' ){
            $this->view->setData('categoryList', array());
        }


        $this->view->setPage('on', 'blog_manager');
        $this->view->setData('section', $section);
        $this->view->render("blog/display");
    }
}
