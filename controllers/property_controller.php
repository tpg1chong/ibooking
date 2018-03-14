<?php

class Property_Controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->error();
    }


    /* -- Property Action -- */
    public function add( $action='property' ) {

        if( empty($this->me) || $this->format!='json' ) $this->error();

        if( $action=='type' ){
            $this->view->setPage('path', 'Themes/admin/forms/property/type');
            $this->view->render('add');
        }
        else if($action=='property'){
            $this->view->setPage('path', 'Themes/admin/forms/property');
            $this->view->render('add');
        }        
    }
    public function edit( $action='property', $id=null )
    {
        if( is_numeric($action) && $id==null ){
            $item = $this->model->get($id);
            $this->view->setData('item', $item);
            $this->add( 'property' );
        }
        else if( $action=='type' ){
            $item = $this->model->type->get($id);
            $this->view->setData('item', $item);
            $this->add( $action );
        }
    }
    public function save( $action='property' ) {

        if( empty($this->me) || $this->format!='json' || empty($_POST) ) $this->error();


        /* Save: type  */
        if( $action=='type' ) {
            $id = isset($_POST['id']) ? $_POST['id']: null;
            if( !empty($id) ){
                $item = $this->model->type->get($id);
                if( empty($item) ) $this->error();
            }

            try {

                $form = new Form();
                $form   ->post('type_code')
                        ->post('type_name')->val('is_empty');

                $form->submit();
                $postData = $form->fetch();

                /*$has_code = true;
                if( $this->model->is_code( $postData['type_code'] ) && !empty($has_code) ){
                    $arr['error']['type_code'] = 'Code already exist !';
                }*/

                if( empty($arr['error']) ){

                    if( !empty($item) ){
                        $this->model->type->update( $id, $postData );
                    }
                    else{
                        $this->model->type->insert( $postData );
                        $id = $postData['id'];
                    }

                    $arr['message'] = 'Saved!';
                    $arr['url'] = !empty($_REQUEST['next']) ? $_REQUEST['next'] : 'refresh';
                }

            } catch (Exception $e) {
                $arr['error'] = $this->_getError($e->getMessage());
            }
        }

        /* Save: Property  */
        else if( $action=='property' ){

        }
        else{
            $arr['error'] = 400;
        }
        

        echo json_encode($arr);
    }


}
