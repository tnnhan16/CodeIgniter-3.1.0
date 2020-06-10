<?php 
	class UserModel extends My_model
	{
		function __construct()
		{
			parent::__construct();
			$this->table = 'user';
        }
        
        // Read data using username and password
        public function login($data) {

            $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }

        function insertSql($data){
            $result = $this->db->insert_batch($this->table, $data);
            if($result){
                return true;
            }
            return false;
        }
	}
?>

