<?php

class Area_model  extends CI_Model
{
	var $id = "";
	var $name = "";
	var $no   = "";
	var $type = "";
	var $pid = "";



    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_areas($id)
    {
    	if($id=='')
    	{
        	$query = $this->db->get('area');
        }
        else
        {
        	$query = $this->db->query("select * from `area` where `id` =". intval($id,10));
       	}
       	return $query;
        
    }

    //根据type查找地区
    public function get_areas_by_type($type)
    {
        if($type=='')
        {
            $query = $this->db->get('area');
        }
        else
        {
            $query = $this->db->query("select * from `area` where `type`='$type'");
        }
        return $query;

    }


    //通过代号查找地区
    public function get_area_by_no($no)
    {
    	if($no == "")
    	{
    		$query = $this->db->get('area');
    	}
    	else
    	{
    		$query = $this->db->query("select * from `area` where `name` = '". $no ."'");
		}
       	return $query;
    }


    //增加地区
    public function add_area($name, $type, $pid)
    {
        	$this->name = $name;

		    $this->type = intval($type,10); 

		    $this->pid = intval($pid, 10); 

        $query = $this->db->insert('area', $this);
		return $query;
    }

    public function edit_area($id, $name, $type, $pid)
    {
			$this->id = intval($id,10);
			$this->name = $name;
		    $this->type = intval($type,10);  
		    $this->pid = intval($pid,10); 

        $query = $this->db->update('area', $this, array('id' => intval($id,10)));
		return $query;
	}

    public function delete_area($id)
    {

        $query = $this->db->query("delete from `area` where `id` =".intval($id,10));
        return $query;
    }
}
