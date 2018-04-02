<?php

class Place_Model extends Model{

    public function __construct() {
        parent::__construct();
    }

    private $__objType = "property_building";
    private $__table = "property_building";
    private $__field = "*";
    private $__prefixField = "building_";

    /* -- actions -- */
    public function insert(&$data) {

        $data["{$this->__prefixField}created"] = date('c');
        $data["{$this->__prefixField}updated"] = date('c');

        if( isset($data["{$this->__prefixField}pass"]) ){
            $data["{$this->__prefixField}pass"] = Hash::create('sha256', $data["{$this->__prefixField}pass"], HASH_PASSWORD_KEY);
        }

        $this->db->insert($this->__objType, $data);
        $data['id'] = $this->db->lastInsertId();

        $data = $this->cut($this->__prefixField, $data);
    }
    public function update($id, $data) {
        $data["{$this->__prefixField}updated"] = date('c');
        $this->db->update($this->__objType, $data, "{$this->__prefixField}id={$id}");
    }
    public function delete($id) {
        $this->db->delete($this->__objType, "{$this->__prefixField}id={$id}");
    }


    /* -- find -- */
    public function findById($id){
        $sth = $this->db->prepare("SELECT {$this->__field} FROM {$this->__table} WHERE {$this->__prefixField}id=:id LIMIT 1");
        $sth->execute( array( ':id' => $id  ) );
        return $sth->rowCount()==1 ? $this->convert( $sth->fetch( PDO::FETCH_ASSOC ) ): array();
    }
    public function find( $options=array() ) {

        $options = array_merge(array(
            'pager' => isset($_REQUEST['pager'])? $_REQUEST['pager']:1,
            'limit' => isset($_REQUEST['limit'])? $_REQUEST['limit']:50,
            'more' => true,

            'sort' => isset($_REQUEST['sort'])? $_REQUEST['sort']: 'lastvisit',
            'dir' => isset($_REQUEST['dir'])? $_REQUEST['dir']: 'DESC',

            'time'=> isset($_REQUEST['time'])? $_REQUEST['time']:time(),

        ), $options);

        $date = date('Y-m-d H:i:s', $options['time']);

        $condition = "";
        $params = array();


        if( !empty($options['role']) ){
            $condition .= "role=:role";
            $params[':role'] = $options['role'];
        }

        $arr['total'] = $this->db->count($this->__table, $condition, $params);

        $limit = !empty($options['unlimit']) ? '': $this->limited( $options['limit'], $options['pager'] );
        $orderby = $this->orderby( $this->__prefixField.$options['sort'], $options['dir'] );
        $where = !empty($condition) ? "WHERE {$condition}":'';
        $sql = "SELECT {$this->__field} FROM {$this->__table} {$where} {$orderby} {$limit}";

        $arr['lists'] = $this->buildFrag( $this->db->select($sql, $params ), $options );

        if( ($options['pager']*$options['limit']) >= $arr['total'] ) $options['more'] = false;
        $arr['options'] = $options;

        return $arr;
    }


    /* -- convert data -- */
    public function buildFrag($results, $options=array()) {
        $data = array();
        foreach ($results as $key => $value) {
            if( empty($value) ) continue;
            $data[] = $this->convert( $value );
        }

        return $data;
    }
    public function convert($data){

        $data = $this->__cutPrefixField($this->__prefixField, $data);
        return $data;
    }

}
