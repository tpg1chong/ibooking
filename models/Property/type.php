<?php 

class Type extends Model
{
	public function __construct() {
		parent::__construct();
    }


    private $_table = 'property_type';
    private $_field = '*';
    private $_prefixField = 'type_';


    public function get($id)
	{
		$sth = $this->db->prepare("SELECT {$this->_field} FROM {$this->_table} WHERE type_id=:id LIMIT 1");
        $sth->execute( array( ':id' => $id  ) );
        return $sth->rowCount()==1 ? $this->convert( $sth->fetch( PDO::FETCH_ASSOC ) ): array();
	}

	public function findById($id)
	{
		$this->get($id);
	}
    public function find($options=array())
    {
    	$options = array_merge(array(
            /*'pager' => isset($_REQUEST['pager'])? $_REQUEST['pager']:1,
            'limit' => isset($_REQUEST['limit'])? $_REQUEST['limit']:50,*/
            'more' => true,

            'sort' => isset($_REQUEST['sort'])? $_REQUEST['sort']: 'name',
            'dir' => isset($_REQUEST['dir'])? $_REQUEST['dir']: 'ASC',
            
            'time'=> isset($_REQUEST['time'])? $_REQUEST['time']:time(),
            // 'enabled'=> isset($_REQUEST['enabled'])? $_REQUEST['enabled']:true,

        ), $options);

        $condition = "";
        $params = array();

        if( isset($options['enabled']) ){
        	$condition = "type_enabled=:enabled";
        	$params[':enabled'] = $options['enabled'];
        }


        $arr['total'] = $this->db->count($this->_table, $condition, $params);


        $limit = !empty($options['limit']) && !empty($options['pager']) ? $this->limited( $options['limit'], $options['pager'] ):'';
        $orderby = $this->orderby( $this->_prefixField.$options['sort'], $options['dir'] );
        $where = !empty($condition) ? "WHERE {$condition}":'';
        $sql = "SELECT {$this->_field} FROM {$this->_table} {$where} {$orderby} {$limit}";

        $arr['items'] = $this->buildFrag( $this->db->select($sql, $params), $options );


        if( !empty($options['limit']) ){
        	if( ($options['pager']*$options['limit']) >= $arr['total'] ) $options['more'] = false;
        }
        else{
        	$options['more'] = false;
        }
        
        $arr['options'] = $options;
        return $arr;
    }
    /* -- convert data -- */
    public function buildFrag($results, $options=array()) {
        $data = array();
        foreach ($results as $key => $value) { if( empty($value) ) continue; $data[] = $this->convert( $value ); }
        return $data;
    }
    public function convert($data){

        $data = $this->__cutPrefixField($this->_prefixField, $data);
        // $data['access'] = $this->setAccess( $data['role_id'] );
        return $data;
    }

	public function insert(&$data)
	{
		if( !isset($data['type_enabled']) ) $data['type_enabled'] = 1;

		$this->db->insert($this->_table, $data);
        $data['id'] = $this->db->lastInsertId();
	}
	
	public function update($id, $data)
	{
		$this->db->update($this->_table, $data, "{$this->_prefixField}id={$id}");
	}

	
}