<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-8-25 20:04:50 by caowenpeng , caowenpeng1990@126.com
 * 统计
 */
class Chart extends LM_Controller {

    public function getData() {
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            $time = $posts['time'];
            $timeType = $posts['timeType'];
            $column = $posts['column'];
            $income = $column == 'order' ? false : true;
            $this->load->model('Chart_model', 'chart_model');
            if($column != 'user'){
                if ($timeType == 'year') {
                    $data = $this->chart_model->getOrderDataByYear($time, '', true, $income);
                }
                if ($timeType == 'month') {
                    $data = $this->chart_model->getOrderDataByMonth($time, '', true, $income);
                }
            }else{
                 if ($timeType == 'year') {
                    $data = $this->chart_model->getMemberDataByYear($time);
                }
                if ($timeType == 'month') {
                    $data = $this->chart_model->getMemberDataByMonth($time);
                } 
            }
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }
    }

}
