<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-20 10:59:53 by caowenpeng , caowenpeng1990@126.com
 */
class Salary extends Shop_Controller {

    private $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function index() {
        $this->twig->render('shop/salary/index.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getEvent() {
        $user = $this->user;
        $store_id = $user['id'];
        $start_date = $this->input->get('start');
        $end_date = $this->input->get('end');
        $query_order_events = $this->db->query("select date(seo.ctime) as s_date,e.truename,e.tel,o.orderNo 
            from store_employee_order seo join store_employee e on e.id = seo.employee_id 
            join `order` o on  o.id = seo.order_id where seo.store_id = '$store_id'
            and date(seo.ctime) between '$start_date' and '$end_date' ");
        $order_events = $query_order_events->result_array();
        $query_vacate_events = $this->db->query("select sev.begin_time,
            sev.end_time,e.truename,e.tel,sev.remark
            from store_employee_vacate sev join store_employee e on e.id = sev.employee_id 
            where sev.store_id = '$store_id'
            and date(sev.ctime) between '$start_date' and '$end_date' ");
        $vacate_events = $query_vacate_events->result_array();
        $vacate = [];
        foreach ($vacate_events as $value) {
            $vacate[] = array(
                'title' => $value['truename'] . '请假' . $value['remark'],
                'start' => $value['begin_time'],
                'end' => $value['end_time'],
                'color' => 'red'
            );
        }
        $event = [];
        foreach ($order_events as $value) {
            $event[] = array(
                'title' => $value['truename'] . '处理订单' . $value['orderNo'],
                'start' => $value['s_date']
            );
        }
        $event = array_merge($event, $vacate);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($event));
        return;
    }

    public function exportSalary() {
        $user = $this->user;
        $store_id = $user['id'];
        $year = $this->input->get('year');
        $month = $this->input->get('month');
        $filename = $year.'年'.$month.'月工资清单.xls';
        $header = ['员工编号', '姓名', '请假天数', '出单数','基本工资','社保','公积金','个人税','提成'];
        $data = [];
        $query_data = $this->db->query("select e.employee_no,e.truename, ifnull(sev.days,0) as vacate_days ,
            ifnull(seoo.order_nums,0) as order_nums
            from store_employee e
            left join 
            ( select * from  store_employee_vacate v where v.store_id = '$store_id' and year(v.ctime) = '$year'
                and month(v.ctime) = '$month') sev
            on sev.employee_id = e.id
            left join
            (select count(seo.id) as order_nums,seo.employee_id 
            from store_employee_order seo where  year(seo.ctime) = '$year' and month(seo.ctime) = '$month' 
            and seo.store_id = '$store_id' group by seo.employee_id) seoo
            on seoo.employee_id = e.id
            where e.store_id = '$store_id' ");
        $data = $query_data->result_array();
        phpexcelExport($filename, $header, $data);
    }

}
