<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-7-30 11:34:56 by caowenpeng , caowenpeng1990@126.com
 * 用户模型
*/
class Admingroup_model extends LM_Model{
    function __construct() {
        parent::__construct();
    }

    public function fetchAll(){
        return $this->db->get('member')->result_array();
    }
}

