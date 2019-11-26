<?php defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL ^ E_DEPRECATED);

class Login_model extends CI_Model{
    var $table = 'emp';
	var $menu = 'menu';
    var $column_order = array('eid','email','division','level','menu_id');
    var $column_search = array('eid','email','division','level','menu_id');
    var $order = array('eid' => 'asc');		
	
	function __construct(){
		parent::__construct();
        $this->load->database();
    }
	
	
    private function _get_datatables_data()
    {
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) 
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    function get_datatables()
    {
        $this->_get_datatables_data();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();       
    }	
	
    function count_filtered()
    {
        $this->_get_datatables_data();
        $query = $this->db->get();
        return $query->num_rows();
    }	
	
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }		
    
    function checkUser($email){
		/*
		select a.email, a.name, a.division,a.menu_id, b.nm_lvl from emp a 
		left join level b on a.level = b.id
		where a.level is not null and a.email = ''
		*/
		$query = $this->db->query("select a.email, a.name, a.division,a.menu_id, b.nm_lvl from emp a 
		left join level b on a.level = b.id
		where a.level is not null and a.email = '".$email."'");
		//$result = $query->result_array();
        return $query; 
    }
	
	function get_menu(){
		$query = $this->db->query("select * from menu");
		$result = $query;
        return $result;
		
	}
	
	function menu_reload($menuid){
		$query = $this->db->query("select * from menu where id in (".$menuid.")");
		$result = $query;
        return $result;
	}

}