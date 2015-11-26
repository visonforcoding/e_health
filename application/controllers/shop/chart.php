<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-22 12:03:58 by caowenpeng , caowenpeng1990@126.com
 * 交易统计
 */
class Chart extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
        $this->load->model('Store_model', 'store_model');
        $this->load->model('Order_model', 'order_model');
    }

    public function index() {
        $user = $this->user;
        $store_id = $user['id'];


        //本店中最近一次消费 距离今天超过30天 的用户排行
        $query_buy_few = $this->db->query("select m.nick,m.id,o.ctime ,m.tel,m.trueName,
                                        min(datediff(curdate(),date(o.ctime))) as date_diff_day
                                        from `order` o
                                        left join member m
                                        on m.id = o.uid
                                        where o.sid = '$store_id' and (o.`type` = '1' or o.`type` = '3') 
                                        and o.payStatus != '1' 
                                        group by m.id
                                        having min(datediff(curdate(),date(o.ctime))) > 30
                                        order by date_diff_day desc
                                        limit 0,5");
        $buy_few = $query_buy_few->result_array();

        $this->twig->render('/shop/chart/index.twig', array(
            'user' => $this->user,
            'buy_few' => $buy_few,
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getOrderList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = "order.sid = '$store_id'  and order.type = '1' "; //条件查询 本店和店铺类型
        $datas = $this->order_model
                ->getJsonData('order', $posts['page'], $posts['rows'], 'order.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    /**
     * 交易统计的数据获取
     */
    public function getData() {
        if ($this->input->isPost()) {
            $user = $this->user;
            $store_id = $user['id'];
            $posts = $this->input->posts();
            $time = $posts['time'];
            $timeType = $posts['timeType'];
            $column = $posts['column'];
            $this->load->model('Chart_model', 'chart_model');
            if ($column == 'member') {
                $where = "and `member`.`store_id` = '$store_id'";
                if ($timeType == 'year') {
                    $data = $this->chart_model->getMemberDataByYear($time, $where);
                }
                if ($timeType == 'month') {
                    $data = $this->chart_model->getMemberDataByMonth($time, $where);
                }
            } else {
                $income = $column == 'order' ? false : true;
                $where = "and `order`.`sid` = '$store_id' and `order`.`type` = '1'";
                if ($timeType == 'year') {
                    $data = $this->chart_model->getOrderDataByYear($time, $where, true, $income);
                }
                if ($timeType == 'month') {
                    $data = $this->chart_model->getOrderDataByMonth($time, $where, true, $income);
                }
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }
    }

    /**
     * 消费层级
     */
    public function getStoreExpenseData() {
        $user = $this->user;
        $store_id = $user['id'];
        $time = $this->input->post('time');
        switch ($time) {
            case '7day':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
            case '1month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 30 ";
                break;
            case '3month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 3*30 ";
                break;
            case '6month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 6*30 ";
                break;
            default:
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
        }
        $this->load->model('Chart_model', 'chart_model');
        $data = $this->chart_model->getStoreExpenseData($store_id, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    /**
     * 服务营业额占比
     */
    public function getStoreServiceData() {
        $user = $this->user;
        $store_id = $user['id'];
        $time = $this->input->post('time');
        switch ($time) {
            case '7day':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
            case '1month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 30 ";
                break;
            case '3month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 3*30 ";
                break;
            case '6month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 6*30 ";
                break;
            default:
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
        }
        $this->load->model('Chart_model', 'chart_model');
        $data = $this->chart_model->getStoreServiceData($store_id, $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    /**
     * 会员
     */
    public function getMemberBuyOrderData() {
        $user = $this->user;
        $store_id = $user['id'];
        $time = $this->input->post('time');
        switch ($time) {
            case '7day':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
            case '1month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 30 ";
                break;
            case '3month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 3*30 ";
                break;
            case '6month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 6*30 ";
                break;
            default:
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
        }
        $query_buy_most = $this->db->query("select count(1) as order_nums,sum(o.amount) as total,m.nick,m.id,
                            m.tel,m.trueName
                            from `order` o
                            join member m
                            on m.id = o.uid 
                            where o.sid = '$store_id' and (o.`type` = '1' or o.`type` = '3') $where 
                            and o.payStatus != '1' group by m.id order by order_nums desc");
        $buy_most = $query_buy_most->result_array();
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($buy_most));
    }

    /**
     * 客单价
     */
    public function getServicePriceData() {
        $user = $this->user;
        $store_id = $user['id'];
        $time = $this->input->post('time');
        switch ($time) {
            case '7day':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
            case '1month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 30 ";
                break;
            case '3month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 3*30 ";
                break;
            case '6month':
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 6*30 ";
                break;
            default:
                $where = " and TIMESTAMPDIFF(day,date(o.ctime),date(now())) <= 7 ";
                break;
        }
        $this->load->model('Chart_model', 'chart_model');
        $data = $this->chart_model->getServicePriceData($store_id);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

}
