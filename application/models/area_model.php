<?php

class Area_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }

    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function findAreaById($id) {
        $query_area = $this->db->where("id = '$id'")->get('area');
        $area = $query_area->row_array();
        if ($area) {
            return $area;
        } else {
            return false;
        }
    }
    
  

    /**
     * 根据区域id 返回父id
     * @param type $id
     * @return boolean
     */
    public function findPidByAreaId($id) {
        $query_area = $this->db->select('pid')->where("id = '$id'")->get('area');
        $area = $query_area->row_array();
        if ($area) {
            return $area['pid'];
        } else {
            return false;
        }
    }

}
