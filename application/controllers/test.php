<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
    public function index()
    {
    	echo 'index';
    }
    
    public function func()
    {
        echo $this->input->get('aa');
        echo '<br>';
        
        $query = $this->db->query('select * from user');
        foreach ($query->result() as $row)
        {
            echo $row->id;
            echo $row->name;
            echo '<br>';
        }
        echo '<br>';
        echo  'done';
    }
}
