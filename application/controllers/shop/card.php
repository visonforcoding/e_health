<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-10-23 16:32:23 by caowenpeng , caowenpeng1990@126.com
 * 会员卡
 */
class Card extends Shop_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $user = $this->checkLogin();
        $this->user = $user;
    }

    public function cardList() {
        $this->twig->render('/shop/card/cardList.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getCardList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "card.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $this->load->model('Card_model', 'card_model');
        $datas = $this->card_model
                ->getJsonData('card', $store_id, $posts['page'], $posts['rows'], 'card.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    public function cardAdd() {
        $user = $this->user;
        $shop_id = $user['id'];
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $insert_data['store_id'] = $shop_id;
            $insert_data['name'] = $posts['name'];
            $insert_data['expires'] = $posts['expires'];
            $insert_data['mprice'] = $posts['mprice'];
            $insert_data['price'] = $posts['price'];
            $service_ids = $posts['service_id'];
            $nums = $posts['service_nums'];
            $content = [];
            foreach ($service_ids as $key => $id) {
                $content[] = array(
                    'id' => $id,
                    'nums' => $nums[$key]
                );
            }
            $insert_data['content'] = serialize($content);
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->insert('card', $insert_data);
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '添加成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '添加失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $this->load->model('Service_model', 'service_model');
        $shop_services = $this->service_model->fetchServicesByStoreid($shop_id);
        $this->twig->render('/shop/card/cardAdd.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'shop_services' => $shop_services
        ));
    }

    public function cardEdit() {
        $user = $this->user;
        $shop_id = $user['id'];
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $insert_data['store_id'] = $shop_id;
            $insert_data['name'] = $posts['name'];
            $insert_data['expires'] = $posts['expires'];
            $insert_data['mprice'] = $posts['mprice'];
            $insert_data['price'] = $posts['price'];
            $service_ids = $posts['service_id'];
            $nums = $posts['service_nums'];
            $content = [];
            foreach ($service_ids as $key => $id) {
                $content[] = array(
                    'id' => $id,
                    'nums' => $nums[$key]
                );
            }
            $insert_data['content'] = serialize($content);
            $insert_data['utime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->update('card', $insert_data);
            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '修改成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '修改失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $id = $this->input->get('id');
        $query_card = $this->db->where("`id` = '$id'")->get('card');
        $card = $query_card->row_array();
        $content = unserialize($card['content']);
        $this->load->model('Service_model', 'service_model');
        $shop_services = $this->service_model->fetchServicesByStoreid($shop_id);
        $this->twig->render('/shop/card/cardEdit.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'shop_services' => $shop_services,
            'card' => $card,
            'contents' => $content
        ));
    }

    public function userCardList() {

        $this->twig->render('/shop/card/userCardList.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo()
        ));
    }

    public function getUserCardList() {
        $posts = $this->input->posts();
        $user = $this->user;
        $store_id = $user['id'];
        $where = '';
        $where .= "member_card.store_id = '$store_id' "; //条件查询 本店和店铺类型
        $keywords = $this->input->post('keywords');
        if (!empty($keywords)) {
            $where .= "and ( member.trueName like '%$keywords%' or member.tel like '%$keywords%')";
        }
        $this->load->model('Usercard_model', 'usercard_model');
        $datas = $this->usercard_model
                ->getJsonData('member_card', $posts['page'], $posts['rows'], 'member_card.' . $posts['sidx'], $posts['sord'], $where);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($datas));
    }

    /**
     *  
     * 会员卡的添加 用户产生消费 应当产生一条流水记录 理论上来讲所有的消费过程 都要产生 流水记录
     * @return type
     */
    public function userCardAdd() {
        $user = $this->user;
        $shop_id = $user['id'];
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $card_id = $posts['card'];
            $insert_data['store_id'] = $shop_id;
            $insert_data['user_id'] = $posts['user'];
            $insert_data['card_id'] = $posts['card'];
            $insert_data['price'] = $posts['price'];
            $query_card = $this->db->where("id = '$card_id'")->get('card');
            $card = $query_card->row_array();
            $insert_data['expires_date'] = date_format(date_add(date_create($posts['get_date']), date_interval_create_from_date_string($card['expires'] . ' years')), 'Y-m-d');
            $insert_data['get_date'] = $posts['get_date'];
            $insert_data['content'] = $card['content'];
            $insert_data['ctime'] = date('Y-m-d H:i:s');
            
            //开启事务
            $this->db->trans_start();
            $this->db->insert('member_card', $insert_data);
            $insert_membercard_id = $this->db->insert_id();
            //更新流水记录
            $insert_flow_data['oid'] = $posts['user'];
            $insert_flow_data['otype'] = 2;
            $insert_flow_data['type'] = 3;
            $insert_flow_data['relation_id'] = $insert_membercard_id;
            $insert_flow_data['ctime'] = date('Y-m-d H:i:s');
            $insert_flow_data['income'] = 2;
            $insert_flow_data['amount'] = $posts['price'];
            $insert_flow_data['remark'] = '购买会员卡消费' . $posts['price'] . '元';
            $insert_flow_data['status'] = 0;
            $this->db->insert('flowing', $insert_flow_data);
            $this->db->trans_complete();
            
            if ($this->db->trans_status()) {
                $response['status'] = true;
                $response['msg'] = '添加成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '添加失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_member = $this->db->where("store_id = '$shop_id'")->get('member');
        $members = $query_member->result_array();
        $query_cards = $this->db->where("store_id = '$shop_id'")->get('card');
        $cards = $query_cards->result_array();
        $this->twig->render('/shop/card/userCardAdd.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'cards' => $cards,
            'store_members' => $members
        ));
    }

    public function userCardEdit() {
        $user = $this->user;
        $shop_id = $user['id'];
        $id = $this->input->get('id');
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $card_id = $posts['card'];
            $insert_data['store_id'] = $shop_id;
            $insert_data['user_id'] = $posts['user'];
            $insert_data['card_id'] = $posts['card'];
            $insert_data['price'] = $posts['price'];
            $query_card = $this->db->where("id = '$card_id'")->get('card');
            $card = $query_card->row_array();
            $insert_data['expires_date'] = date_format(date_add(date_create($posts['get_date']), date_interval_create_from_date_string($card['expires'] . ' years')), 'Y-m-d');
            $insert_data['get_date'] = $posts['get_date'];
            $insert_data['utime'] = date('Y-m-d H:i:s');
            $ck_ins = $this->db->where("`id` = '$id'")->update('member_card', $insert_data);


            if ($ck_ins) {
                $response['status'] = true;
                $response['msg'] = '修改成功';
            } else {
                $response['status'] = false;
                $response['msg'] = '修改失败';
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
            return;
        }
        $query_usercard = $this->db->select('member_card.*,member.tel')
                        ->join('member', 'member.id = member_card.user_id')
                        ->where("member_card.id = '$id'")->get('member_card');
        $usercard = $query_usercard->row_array();
        $query_cards = $this->db->where("store_id = '$shop_id'")->get('card');
        $cards = $query_cards->result_array();
        $this->twig->render('/shop/card/userCardEdit.twig', array(
            'realTimeInfo' => $this->getRealtimeInfo(),
            'cards' => $cards,
            'usercard' => $usercard
        ));
    }

    public function getMemberCardJson() {
        $user = $this->user;
        $shop_id = $user['id'];
        $tel = $this->input->post('tel');
        $service = $this->input->post('serviceId');
        $query_card = $this->db->select('member_card.id,card.name,member_card.content')
                ->join('member', 'member.id = member_card.user_id')
                ->join('card', 'card.id = member_card.card_id')
                ->where("member_card.store_id = '$shop_id' and member.tel = '$tel'")
                ->get('member_card');
        $cards = $query_card->result_array();
        if ($cards) {
            $flag = false;
            foreach ($cards as $key => $card) {
                $flag_2 = false;
                $content = $card['content'];
                $content_arr = unserialize($content);
                foreach ($content_arr as $value) {
                    if ($value['id'] == $service && $value['nums'] > 0) {
                        $flag = true;
                        $flag_2 = true;
                    }
                }
                if (!$flag_2) {
                    unset($cards[$key]);
                }
            }
            $response['status'] = $flag;
            $response['data'] = $cards;
        } else {
            $response['status'] = false;
            $response['msg'] = '没有会员卡';
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
        return;
    }

    public function userCardDetail() {
        $user = $this->user;
        $shop_id = $user['id'];
        $id = $this->input->get('id');
        $query_card = $this->db->select('member_card.*,card.name,member.trueName,member.tel')
                ->join('member', 'member.id = member_card.user_id')
                ->join('card', 'card.id = member_card.card_id')
                ->where("member_card.id = '$id'")
                ->get('member_card');
        $card = $query_card->row_array();
        $this->load->model('Service_model', 'service_model');
        $services = $this->service_model->fetchServicesByStoreid($shop_id);
        $contentStr = '';
        $content = $card['content'];
        $content_arr = unserialize($content);
        foreach ($content_arr as $k => $v) {
            foreach ($services as $service) {
                if ($service['id'] == $v['id']) {
                    $contentStr .= $service['name'] . '(' . $v['nums'] . '次)</br>';
                }
            }
        }
        $card['contentStr'] = $contentStr;
        $this->twig->render('/shop/card/userCardDetail.twig', array(
            'usercard' => $card
        ));
    }

}
