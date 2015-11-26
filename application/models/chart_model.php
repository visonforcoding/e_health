<?php

class Chart_model extends LM_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param string $time    查询时间
     * @param string $where   条件查询
     * @param bool $mixed   是否混合饼状图
     * @param bool $income  是否是统计营业额
     * @return array
     */
    public function getOrderDataByYear($time, $where = '', $mixed = false, $income = false) {
        $year = date('Y', strtotime($time));
        $Xcategories = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $Ytext = $income ? '营业额（元）' : '订单个数(个)';
        $lastyear = $year - 1;
        $query_data_last = $this->db->select('count(1) as ordercount,sum(amount) as totalprice,year(ctime) as year,month(ctime) as month', true)
                ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$lastyear' " . $where)
                ->group_by(array('year(ctime)', 'month(ctime)'))
                ->get('order');
        $data_last = $query_data_last->result_array();
        $query_data_now = $this->db->select('count(1) as ordercount,sum(amount) as totalprice,year(ctime) as year,month(ctime) as month', false)
                ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' " . $where)
                ->group_by(array('year(ctime)', 'month(ctime)'))
                ->get('order');
        $data_now = $query_data_now->result_array();
        $series = array();
        $series[0]['name'] = $lastyear . '年';
        $series[1]['name'] = $year . '年';


        if ($mixed) {
            $series[0]['type'] = 'line';
            $series[1]['type'] = 'line';
            $series[2]['type'] = 'pie';
            $series[2]['name'] = $income ? $year . '营业额' : $year . '年订单个数';
            if ($income) {
                $query_income = $this->db->select('sum(amount) as totalAmount', false)
                        ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' " . $where)
                        ->get('order');
                $amount_arr = $query_income->row_array();
                $amount = $amount_arr['totalAmount'];  //总营业额

                $query_isVisit_income = $this->db->select('sum(amount) as totalAmount', false)
                        ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' and `type` = '3' " . $where)
                        ->get('order');  //线下营业额
                $isVisit_income_arr = $query_isVisit_income->row_array();
                $isVisit_income = $isVisit_income_arr['totalAmount'];
                $y0 = (int) $isVisit_income;
                $y1 = $amount - $isVisit_income;
            } else {
                $totalCount = $this->db->where("year(ctime) = '$year' " . $where)
                        ->count_all_results('order'); //总条数
                $visitCount = $this->db->where("year(ctime) = '$year' and `type` = '3' " . $where)
                        ->count_all_results('order'); //线下总条数
                $y0 = $visitCount;
                $y1 = $totalCount - $visitCount;
            }
            $pie_array[] = array(
                'name' => '线下',
                'y' => $y0,
                'color' => '#FF5F5F',
            );
            $pie_array[] = array(
                'name' => '线上',
                'y' => $y1,
                'color' => '#64E572'
            );
            $series[2]['data'] = $pie_array;
            $series[2]['center'] = [100, 60];
        }
        for ($i = 0; $i < 12; $i++) {
            $series[0]['data'][$i] = 0;
            $series[1]['data'][$i] = 0;
        }
        foreach ($data_last as $key => $value) {
            foreach ($series[0]['data'] as $k => $v) {
                if ($k + 1 == $value['month']) {
                    $series[0]['data'][$k] = $income ? intval($value['totalprice']) : intval($value['ordercount']);
                }
            }
        }
        foreach ($data_now as $key => $value) {
            foreach ($series[1]['data'] as $k => $v) {
                if ($k + 1 == $value['month']) {
                    $series[1]['data'][$k] = $income ? intval($value['totalprice']) : intval($value['ordercount']);
                }
            }
        }
        $data = array(
            'valueSuffix' => $income ? '元' : '个',
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

    /**
     * 订单图表数据
     * @param type $time
     * @param type $where
     * @param type $mixed
     * @param type $income
     * @return type
     */
    public function getOrderDataByMonth($time, $where = '', $mixed = false, $income = false) {
        $month = date('n', strtotime($time));
        $year = date('Y', strtotime($time));
        $lastmonth = $month - 1;
        $Xcategories = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'
            , '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $Ytext = $income ? '营业额（元）' : '订单个数(个)';
        $valueSuffix = $income ? '元' : '个';
        $query_data_last = $this->db->select('count(1) as ordercount,sum(amount) as totalprice,'
                        . 'year(ctime) as year,month(ctime) as month,day(ctime) as day', true)
                ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' and month(ctime) = '$lastmonth' " . $where)
                ->group_by('day(ctime)')
                ->get('order');
        $data_last = $query_data_last->result_array();
        $query_data_now = $this->db->select('count(1) as ordercount,sum(amount) as totalprice,'
                        . 'year(ctime) as year,month(ctime) as month, day(ctime) as day', false)
                ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' and month(ctime) = '$month' " . $where)
                ->group_by('day(ctime)')
                ->get('order');
        $data_now = $query_data_now->result_array();
        $series = array();
        $series[0]['name'] = $year . '年' . $lastmonth . '月';
        $series[1]['name'] = $year . '年' . $month . '月';
        if ($mixed) {
            $series[0]['type'] = 'line';
            $series[1]['type'] = 'line';
            $series[2]['type'] = 'pie';
            $series[2]['name'] = $month . '月订单个数';

            if ($income) {
                $query_income = $this->db->select('sum(amount) as totalAmount', false)
                        ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year'"
                                . " and month(ctime) = '$month' " . $where)
                        ->get('order');
                $amount_arr = $query_income->row_array();
                $amount = $amount_arr['totalAmount'];  //总营业额

                $query_isVisit_income = $this->db->select('sum(amount) as totalAmount', false)
                        ->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' "
                                . " and month(ctime) = '$month' and `type` = '3' " . $where)
                        ->get('order');  //线下
                $isVisit_income_arr = $query_isVisit_income->row_array();
                $isVisit_income = $isVisit_income_arr['totalAmount'];
                $y0 = (int) $isVisit_income;
                $y1 = $amount - $isVisit_income;
            } else {
                $totalCount = $this->db->where("(orderStatus = '5' or orderStatus = '6') and  year(ctime) = '$year' and month(ctime) = '$month' " . $where)
                        ->count_all_results('order'); //总条数
                $visitCount = $this->db->where("(orderStatus = '5' or orderStatus = '6') and year(ctime) = '$year' and month(ctime) = '$month' and `type` = '3' " . $where)
                        ->count_all_results('order'); //上门总条数
                $y0 = $visitCount;
                $y1 = $totalCount - $visitCount;
            }
            $pie_array[] = array(
                'name' => '线下',
                'y' => $y0,
                'color' => '#FF5F5F',
            );
            $pie_array[] = array(
                'name' => '线上',
                'y' => $y1,
                'color' => '#64E572'
            );
            $series[2]['data'] = $pie_array;
            $series[2]['center'] = [100, 60];
        }
        for ($i = 0; $i < 31; $i++) {
            $series[0]['data'][$i] = 0;
            $series[1]['data'][$i] = 0;
        }
        foreach ($data_last as $key => $value) {
            foreach ($series[0]['data'] as $k => $v) {
                if ($k + 1 == $value['day']) {
                    $series[0]['data'][$k] = $income ? intval($value['totalprice']) : intval($value['ordercount']);
                }
            }
        }
        foreach ($data_now as $key => $value) {
            foreach ($series[1]['data'] as $k => $v) {
                if ($k + 1 == $value['day']) {
                    $series[1]['data'][$k] = $income ? intval($value['totalprice']) : intval($value['ordercount']);
                }
            }
        }
        $data = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

    public function getMemberDataByMonth($time, $where = '') {
        $month = date('n', strtotime($time));
        $year = date('Y', strtotime($time));
        $lastmonth = $month - 1;
        $Xcategories = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'
            , '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $Ytext = '会员个数(个)';
        $valueSuffix = '个';
        $query_data_last = $this->db->select('count(1) as ordercount,'
                        . 'year(ctime) as year,month(ctime) as month,day(ctime) as day', FALSE)
                ->where("year(ctime) = '$year' and month(ctime) = '$lastmonth' " . $where)
                ->group_by('day(ctime)')
                ->get('member');
        $data_last = $query_data_last->result_array();
        $query_data_now = $this->db->select('count(1) as ordercount,'
                        . 'year(ctime) as year,month(ctime) as month, day(ctime) as day', FALSE)
                ->where("year(ctime) = '$year' and month(ctime) = '$month' " . $where)
                ->group_by('day(ctime)')
                ->get('member');
        $data_now = $query_data_now->result_array();
        $series = array();
        $series[0]['name'] = $year . '年' . $lastmonth . '月';
        $series[1]['name'] = $year . '年' . $month . '月';
        for ($i = 0; $i < 31; $i++) {
            $series[0]['data'][$i] = 0;
            $series[1]['data'][$i] = 0;
        }
        foreach ($data_last as $key => $value) {
            foreach ($series[0]['data'] as $k => $v) {
                if ($k + 1 == $value['day']) {
                    $series[0]['data'][$k] = intval($value['ordercount']);
                }
            }
        }
        foreach ($data_now as $key => $value) {
            foreach ($series[1]['data'] as $k => $v) {
                if ($k + 1 == $value['day']) {
                    $series[1]['data'][$k] = intval($value['ordercount']);
                }
            }
        }
        $data = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

    public function getMemberDataByYear($time, $where = '') {
        $year = date('Y', strtotime($time));
        $lastyear = $year - 1;
        $Xcategories = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $Ytext = '会员个数(个)';
        $valueSuffix = '个';
        $query_data_last = $this->db->select('count(1) as ordercount,'
                        . 'year(ctime) as year,month(ctime) as month,day(ctime) as day', false)
                ->where("year(ctime) = '$lastyear' " . $where)
                ->group_by(array('year(ctime)', 'month(ctime)'))
                ->get('member');
        $data_last = $query_data_last->result_array();
        $query_data_now = $this->db->select('count(1) as ordercount,'
                        . 'year(ctime) as year,month(ctime) as month, day(ctime) as day', false)
                ->where("year(ctime) = '$year'  " . $where)
                ->group_by(array('year(ctime)', 'month(ctime)'))
                ->get('member');
        $data_now = $query_data_now->result_array();
        $series = array();
        $series[0]['name'] = $lastyear . '年';
        $series[1]['name'] = $year . '年';
        for ($i = 0; $i < 12; $i++) {
            $series[0]['data'][$i] = 0;
            $series[1]['data'][$i] = 0;
        }
        foreach ($data_last as $key => $value) {
            foreach ($series[0]['data'] as $k => $v) {
                if ($k + 1 == $value['month']) {
                    $series[0]['data'][$k] = intval($value['ordercount']);
                }
            }
        }
        foreach ($data_now as $key => $value) {
            foreach ($series[1]['data'] as $k => $v) {
                if ($k + 1 == $value['month']) {
                    $series[1]['data'][$k] = intval($value['ordercount']);
                }
            }
        }
        $data = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

    /**
     * 获取消费层级分析数据
     */
    public function getStoreExpenseData($storeId,$where='') {
        
        $query_orders = $this->db->query("select o.amount from `order`  o "
                . "where o.sid = '$storeId' ".$where
                . "and (o.`type` = '1' or o.`type` = '3') and (o.`orderStatus`= '5' or o.`orderStatus` = '6')");
        $orders = $query_orders->result_array();
        $data = [];
        $one = 0;
        $two = 0;
        $three = 0;
        $four = 0;
        $five = 0;
        foreach ($orders as $value) {
            if ($value['amount'] >= 0 && $value['amount'] <= 100) {
                $one++;
            }
            if ($value['amount'] > 100 && $value['amount'] <= 200) {
                $two++;
            }
            if ($value['amount'] > 200 && $value['amount'] <= 300) {
                $three++;
            }
            if ($value['amount'] > 300 && $value['amount'] <= 400) {
                $four++;
            }
            if ($value['amount'] > 400) {
                $five++;
            }
        }
        $data = [
            ['0~100', intval($one)],
            ['100~200', intval($two)],
            ['200~300', intval($one)],
            ['300~400', intval($three)],
            ['>400', intval($five)],
        ];
        $res = array('type' => 'pie', 'name' => '用户消费区间占比', 'data' => $data);
        return $res;
    }

    /**
     * 获取消费层级分析数据
     */
    public function getStoreServiceData($storeId,$where) {
        $query_orders = $this->db->query("select ss.name,IFNULL(tmp.order_nums,0) as order_nums,IFNULL(tmp.total,0) as total
                                from service ss
                                left join (
                                select count(*) as order_nums,s.id,s.name,sum(o.amount) as total
                                from `order`  o
                                join service s
                                on s.id = o.serviceId
                                where o.sid = '$storeId' $where
                                and (o.`type` = '1' or o.`type` = '3') and (o.`orderStatus`= '5' or o.`orderStatus` = '6')
                                group by o.serviceId) as tmp
                                on ss.id = tmp.id");
        $orders = $query_orders->result_array();
        $data = [];
        foreach ($orders as $value) {
            $data[] = [$value['name'], intval($value['total'])];
        }
        $res = array('type' => 'pie', 'name' => '产品销售占比', 'data' => $data);
        return $res;
    }

    /**
     * 
     * @param type $storeId
     */
    public function getServicePriceDataBack($storeId) {
        $Xcategories = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $Ytext = '会员个数(个)';
        $valueSuffix = '个';
        $query_orders = $this->db->query("select ser.name,IFNULL(tmp.order_nums,0) as order_nums,
                            IFNULL(tmp.total,0) as total,IFNULL(total/tmp.total_nums,0) as avg_price,tmp.month,tmp.year,ser.id
                            from store_service ss
                            join (
                            select count(*) as order_nums,s.id,sum(o.amount) as total,sum(o.nums) as total_nums,year(o.ctime) as year,month(o.ctime) as month
                            from `order`  o
                            join store_service s
                            on s.serviceId = o.serviceId
                            where o.sid = '$storeId' and year(o.ctime) = year(now()) 
                            and (o.`type` = '1' or o.`type` = '3') and (o.`orderStatus`= '5' or o.`orderStatus` = '6')
                            group by  year(o.ctime),month(o.ctime),o.serviceId) as tmp
                            on ss.id = tmp.id
                            join service ser
                            on ser.id = ss.serviceId");
        $orders = $query_orders->result_array();
        $query_services = $this->db->select('service.name,service.id')
                ->join('service', 'service.id = store_service.serviceId')
                ->where("store_service.`storeId` = '$storeId'")
                ->get('store_service');
        $services = $query_services->result_array();
        $series = array();
        foreach ($services as $key => $value) {
            $series[$key]['name'] = $value['name'];
            for ($i = 0; $i < 12; $i++) {
                $series[$key]['data'][$i] = 0;
            }
        }
        foreach ($orders as $key => $value) {
            foreach ($series as $k => $v) {
                if ($v['name'] == $value['name']) {
                    $month = $value['month'];
                    $mon_index = $month - 1;
                    $series[$k]['data'][$mon_index] = intval($value['avg_price']);
                }
            }
        }
        $data = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

    /**
     * 
     * @param type $storeId
     */
    public function getServicePriceData($storeId) {
        $Xcategories = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $Ytext = '消费金额(元)';
        $valueSuffix = '个';
        $query_orders = $this->db->query("select ser.name,IFNULL(tmp.order_nums,0) as order_nums,
                            IFNULL(tmp.total,0) as total,IFNULL(total/tmp.total_nums,0) as avg_price,tmp.month,tmp.year,ser.id
                            from store_service ss
                            join (
                            select count(*) as order_nums,s.id,sum(o.amount) as total,sum(o.nums) as total_nums,year(o.ctime) as year,month(o.ctime) as month
                            from `order`  o
                            join store_service s
                            on s.serviceId = o.serviceId
                            where o.sid = '$storeId' and year(o.ctime) = year(now()) 
                            and (o.`type` = '1' or o.`type` = '3') and (o.`orderStatus`= '5' or o.`orderStatus` = '6')
                            group by  year(o.ctime),month(o.ctime)) as tmp
                            on ss.id = tmp.id
                            join service ser
                            on ser.id = ss.serviceId");
        $orders = $query_orders->result_array();
        $series = array();
        $series[0]['name'] = date('Y');
        for ($i = 0; $i < 12; $i++) {
            $series[0]['data'][$i] = 0;
        }
        foreach ($orders as $key => $value) {
            foreach ($series as $k => $v) {
                    $month = $value['month'];
                    $mon_index = $month - 1;
                    $series[$k]['data'][$mon_index] = intval($value['avg_price']);
            }
        }
        $data = array(
            'valueSuffix' => $valueSuffix,
            'Xcategories' => $Xcategories,
            'Ytext' => $Ytext,
            'series' => $series
        );
        return $data;
    }

}
