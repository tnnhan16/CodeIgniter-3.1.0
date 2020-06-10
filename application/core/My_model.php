<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_model extends CI_Model {
	
	// Ten table
	var $table = '';
	
	// Key chinh cua table
	var $key = 'id';
	
	// Order mac dinh (VD: $order = array('id', 'desc))
	//sap xep gia tri
	var $order = '';
	
	// Cac field select mac dinh khi get_list (VD: $select = 'id, name')
	var $select = '';
	
	/**
	 * Them row moi
	 * $data : du lieu ma ta can them
	 */
	function create($data = array())
	{
		if($this->db->insert($this->table, $data))
		{
		   return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/**
	 * Cap nhat row tu id
	 * $id : khoa chinh cua bang can sua
	 * $data : mang du lieu can sua
	 */
	function update($id, $data)
	{
		if (!$id)
		{
			return FALSE;
		}
		
		$where = array();
	 	$where[$this->key] = $id;
		$this->db->where($this->key, $id);
		$this->db->update($this->table,$data); 
	 	return TRUE;
	}
	/**
	 * Xoa row tu id
	 * $id : gia tri cua khoa chinh
	 */
	function delete($id)
	{
		if (!$id)
		{
			return FALSE;
		}
		$this->db->where($this->key, $id);
		$this->db->delete($this->table);   
		
		return TRUE;
	}
	/**
	 * Lay thong tin cua row tu id
	 * $id : id can lay thong tin
	 * $field : cot du lieu ma can lay
	 */
	function get_info($id, $field = '')
	{
		if (!$id)
		{
			return FALSE;
		}
		$this->db->where($this->key, $id);
		$query = $this->db->get($this->table);
	 	return $query->result()[0];
	}
	/**
	 * Lay tong so
	 */
	function get_total($input = array())
	{
		$this->get_list_set_input($input);
		
		$query = $this->db->get($this->table);
		
		return $query->num_rows();
	}
		
	/**
	 * Lay danh sach
	 * $input : mang cac du lieu dau vao
	 */
	function get_list($limit, $start)
	{
	    //xu ly ca du lieu dau vao
		$this->db->limit($limit, $start);
		
		//thuc hien truy van du lieu
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $query->result();
	}
	
	/**
	 * Gan cac thuoc tinh trong input khi lay danh sach
	 * $input : mang du lieu dau vao
	 */
	
	protected function get_list_set_input($input = array())
	{	
		// Thêm điều kiện cho câu truy vấn truyền qua biến $input['where'] 
		//(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
		if ((isset($input['where'])) && $input['where'])
		{
			$this->db->where($input['where']);
		}
	}
	
	/**
	 * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
	 * $where : mang du lieu dieu kien
	 */
    function check_exists($where = array())
    {
	    $this->db->where($where);
	    //thuc hien cau truy van lay du lieu
		$query = $this->db->get($this->table);
		
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/**
	 * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
	 * $where : mang du lieu dieu kien
	 */
    function check_exists_not_in($where = array(), $where_not_in =  array())
    {
		$this->db->where($where);
		if($where_not_in){
			foreach($where_not_in as $key => $value){
				$this->db->where_not_in($key, $value);
			}
		}
	    //thuc hien cau truy van lay du lieu
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteMulti($idList)
	{
		if (!empty($idList)) {
			$this->db->where_in('id', $idList);
			return $this->db->delete($this->table);
		}
		return false;
	}
}
?>