<?php

class ReportModel extends CI_Model{
    var $tableseller = 'seller';
    var $tablebranch = 'branch';
    var $tableprod = 'prodtype';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_sellercd(){
        $this->db->order_by('SellerName', 'ASC');
        $query = $this->db->get($this->tableseller);
        
        return $query;
    }   
    
    public function get_branch(){
        $query = $this->db->get($this->tablebranch);
        return $query;
    }  

    //--select MI_ID from prodtype group by MI_ID    
    public function get_prod(){
        $this->db->select('mi_id');
        $this->db->group_by('mi_id'); 
        $this->db->order_by('mi_id', 'asc'); 
        $query = $this->db->get($this->tableprod);
        return $query;
    } 
	
	public function get_seller_cd_byEmail($email){
		/*select a.email, b.nm_lvl,c.Sellercd from emp a 
		left join level b on a.level = b.id
		left join seller c on c.email = a.email
		where a.level is not null and a.email = 'mirna.anggraini@trimegah.com'
		*/
		$query = $this->db->query("select a.email, b.nm_lvl,c.Sellercd,a.accessbranch from emp a 
			left join level b on a.level = b.id
			left join seller c on c.email = a.email
			where a.level is not null and a.email = '".$email."'");

		$result = $query->result_array();
        return $result; 
	}
	
	public function get_seller_id_name($accessbranch){
		
		$query = $this->db->query("select sellercd,sellername from seller where sales_id in (".$accessbranch.")");
		$result = $query->result_array();
		//echo $this->db->last_query();die();
		//print_r($result);die();
        return $result;
		
	}
}
?>