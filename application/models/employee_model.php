<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-8 16:54:10 by caowenpeng , caowenpeng1990@126.com
 */
class Employee_model extends LM_Model {

    public function __construct() {
        parent::__construct();
    }

    
    /**
     * 店员处理订单统计图
     * @param type $time
     * @param type $where
     * @return string
     */
    public function getChartData($time, $where) {
        $query_data = $this->db->query(
                "select count(seo.order_id) as orderNums , seo.employee_id,se.employee_no,se.truename
                    from store_employee_order seo
                    join store_employee se
                    on se.id = seo.employee_id
                    where $where
                    group by seo.employee_id"
        );
        $data = $query_data->result_array();
        $Xcategories = [];
        $Ytext = '处理订单';
        $valueSuffix = '个';
        $series = array();
        $series[0]['name'] = $time;
        foreach ($data as $value) {     
            $Xcategories[] = $value['truename'] . '(' . $value['employee_no'] . ')';
            $series[0]['data'][] = intval($value['orderNums']);
        }

        $response = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $response;
    }

}
