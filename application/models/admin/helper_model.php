<?php

class Helper_model extends CI_Model
{
    var $name = '';
    var $phoneNo = '';
    var $coordinate = '';
    var $carId = '';
    var $logo = '';


    function __construct()
    {
        parent::__construct();
    }

    //查找全部技师
    function get_all_helpers()
    {
        $query = $this->db->get('helper');
        return $query;
    }

    //通过手机号查技师
    function get_helper_by_id($ID)
    {
        $query = $this->db->query("select * from helper where id='" . $ID . "';");
        return $query;
    }

    //通过手机号查技师
    function get_helper_by_phone($phone)
    {
        if ($phone == "") {
            $query = $this->db->get('helper');
        } else {
            $query = $this->db->query("select * from helper where phoneNo='" . $phone . "';");
        }
        return $query;
    }

    //通过姓名查技师
    function get_helper_by_name($name)
    {
        if ($name == "") {
            $query = $this->db->get('helper');
        } else {
            $query = $this->db->query("select * from helper where name='" . $name . "';");
        }
        return $query;
    }


    function add_helper($name, $phoneNo, $coordinate, $carId, $logo)
    {
        $this->name = $name;
        $this->phoneNo = $phoneNo;
        $this->coordinate = $coordinate;
        $this->carId = $carId;
        $this->logo = $logo;

        $query = $this->db->insert('helper', $this);
        return $query;
    }

    function saveHelper($id, $name, $phoneNo, $coordinate, $carId, $logo)
    {
        $data = array('name' => $name, 'phoneNo' => $phoneNo, 'coordinate' => $coordinate, 'carId' => $carId, 'logo' => $logo);

        $where = "id = '" . $id . "'";

        $str = $this->db->update_string('helper', $data, $where);

        $query = $this->db->query($str);

        return $query;
    }

}
