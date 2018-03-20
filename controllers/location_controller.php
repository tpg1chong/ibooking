<?php

class Location_Controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->error();
    }


    /* -- Location Action -- */
    public function add( $action='' ) {

        if( empty($this->me) || $this->format!='json' ) $this->error();
        $path = 'Themes/admin/forms/location';
        $path .= !empty( $action ) ? "/{$action}":'';

        $this->view->setPage('path', $path);
        $this->view->render('add');
    }
    public function edit( $action='location', $id=null )
    {
        if( is_numeric($action) && $id==null ){
            $item = $this->model->get($action);
            $this->view->setData('item', $item);
            $this->add( 'location' );
        }
        else{
            $item = $this->model->{$action}->get($id);
            if( empty($item) ) $this->error();
            $this->view->setData('item', $item);
            $this->add( $action );
        }
    }
    public function save( $action='location' ) {

        if( empty($this->me) || $this->format!='json' || empty($_POST) ) $this->error();



        // Location

        
        if( $action=='places' ) {
            
            $arr['post'] = $_POST;
            // $arr['message'] = '+55555';
        }

        /* Save: region  */
        else if( $action=='region' ) {
            $id = isset($_POST['id']) ? $_POST['id']: null;
            if( !empty($id) ){
                $item = $this->model->region->get($id);
                if( empty($item) ) $this->error();
            }

            try {
                $form = new Form();
                $form->post('region_name')->val('is_empty');

                $form->submit();
                $postData = $form->fetch();

                if( empty($arr['error']) ){

                    if( !empty($item) ){
                        $this->model->region->update( $id, $postData );
                    }
                    else{
                        $this->model->region->insert( $postData );
                        $id = $postData['id'];
                    }

                    $arr['message'] = 'Saved!';
                    $arr['url'] = !empty($_REQUEST['next']) ? $_REQUEST['next'] : 'refresh';
                }

            } catch (Exception $e) {
                $arr['error'] = $this->_getError($e->getMessage());
            }
        }
        /* Save: country  */
        else if( $action=='country' ) {
            $id = isset($_POST['id']) ? $_POST['id']: null;
            if( !empty($id) ){
                $item = $this->model->country->get($id);
                if( empty($item) ) $this->error();
            }

            try {
                $form = new Form();
                $form->post('country_name')->val('is_empty');

                $form->submit();
                $postData = $form->fetch();

                if( empty($arr['error']) ){

                    if( !empty($item) ){
                        $this->model->country->update( $id, $postData );
                    }
                    else{
                        $this->model->country->insert( $postData );
                        $id = $postData['id'];
                    }

                    $arr['message'] = 'Saved!';
                    $arr['url'] = !empty($_REQUEST['next']) ? $_REQUEST['next'] : 'refresh';
                }

            } catch (Exception $e) {
                $arr['error'] = $this->_getError($e->getMessage());
            }
        }
        /* Save: geography  */
        else if( $action=='geography' ) {
            $id = isset($_POST['id']) ? $_POST['id']: null;
            if( !empty($id) ){
                $item = $this->model->geography->get($id);
                if( empty($item) ) $this->error();
            }

            try {
                $form = new Form();
                $form->post('geo_name')->val('is_empty');

                $form->submit();
                $postData = $form->fetch();

                if( empty($arr['error']) ){

                    if( !empty($item) ){
                        $this->model->geography->update( $id, $postData );
                    }
                    else{
                        $this->model->geography->insert( $postData );
                        $id = $postData['id'];
                    }

                    $arr['message'] = 'Saved!';
                    $arr['url'] = !empty($_REQUEST['next']) ? $_REQUEST['next'] : 'refresh';
                }

            } catch (Exception $e) {
                $arr['error'] = $this->_getError($e->getMessage());
            }
        }
        /* Save: city  */
        else if( $action=='city' ) {
            $id = isset($_POST['id']) ? $_POST['id']: null;
            if( !empty($id) ){
                $item = $this->model->city->get($id);
                if( empty($item) ) $this->error();
            }

            try {
                $form = new Form();
                $form->post('city_name')->val('is_empty');

                $form->submit();
                $postData = $form->fetch();

                if( empty($arr['error']) ){

                    if( !empty($item) ){
                        $this->model->city->update( $id, $postData );
                    }
                    else{
                        $this->model->city->insert( $postData );
                        $id = $postData['id'];
                    }

                    $arr['message'] = 'Saved!';
                    $arr['url'] = !empty($_REQUEST['next']) ? $_REQUEST['next'] : 'refresh';
                }

            } catch (Exception $e) {
                $arr['error'] = $this->_getError($e->getMessage());
            }
        }

        /*Save: Location  */
        else if( $action=='location' ){

        }
        else{
            $arr['error'] = 400;
        }


        echo json_encode($arr);
    }
    public function del( $action='location', $id=null ) {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id']: $id;
        $path = 'Themes/admin/forms/location';
        if( is_numeric($action) && $id==null ){
            $item = $this->model->get($action);
        }
        else{
            $path .= "/{$action}";
            $item = $this->model->{$action}->get($id);
        }

        if( empty($item) ) $this->error();

        if( !empty($_POST) ){

            if( !empty($item['permit']['del']) ){

                if( $action=='location' ){
                    $this->model->{$action}->delete( $id );
                }
                else{
                    $this->model->{$action}->delete( $id );
                }

                $arr['message'] = 'Deleted!';
                $arr['url'] = 'refresh';
            }
            else{
                $arr['error'] = 1;
                $arr['message'] = "Can't Delete";
            }

            echo json_encode( $arr );
        }
        else{
            $this->view->setData('item', $item);
            $this->view->setPage('path', $path );
            $this->view->render('del');
        }
    }


    public function placesList() {
        $this->view->setData('results', $this->model->places->find());
        
        $this->view->setPage('path', 'Themes/admin/layouts/places/items/');
        $this->view->render('json');
    }


}
