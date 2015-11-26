<?php

class Service_model extends CI_Model
{
    var $state = '';
    var $type = '';
    var $name = '';
    var $mprice = '';
    var $price = '';
    var $desc = '';
    var $titleId = '';


    function __construct()
    {
        parent::__construct();
    }

    function get_all_services()
    {
        $query = $this->db->get('service');
        return $query;
    }


    //通过服务名称查服务
    function get_service_by_id($id)
    {
        $query = $this->db->query("select * from service where id=" . intval($id, 10));
        return $query;
    }

      function get_service_by_name($name)
    {
        if ($name == "") {
            $query = $this->db->get('service');
        } else {
            $query = $this->db->query("select * from service where name='" . $name . "';");
        }
        return $query;
    }

    function add_service($state, $type, $name, $mprice, $price, $desc, $titleId)
    {
        $this->state = $state;
        $this->type = $type;
        $this->name = $name;
        $this->mprice = $mprice;
        $this->price = $price;
        $this->desc = $desc;
        $this->titleId = intval($titleId, 10);

        $query = $this->db->insert('service', $this);
        return $query;
    }

    function delete_service_by_id($id){
        $query = $this->db->query("delete from service where id='" . $id . "';");
        return $query;
    }

    function saveService($id, $state, $type, $name, $mprice, $price, $desc, $titleId)
    {
        $data = array('state' => $state, 'type' => $type, 'name' => $name, 'mprice' => $mprice, 'price' => $price, 'desc' => $desc, 'titleId' => intval($titleId, 10));

        $where = "id = ".intval($id,10);

        $str = $this->db->update_string('service', $data, $where);

        $query = $this->db->query($str);

        return $query;
    }

}
