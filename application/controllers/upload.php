<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-25 14:08:19 by caowenpeng , caowenpeng1990@126.com
 */
class Upload extends CI_Controller {
    
    
    public function index(){
        echo '404';exit();
    }

    /**
     * 
     */
    public function doUpload() {

        $config['upload_path'] = './uploads/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = date('Ymdhis') . createRandomCode(2);
        $this->lang->load('upload', 'chinese'); //加载语言类
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            $response['status'] = false;
            $response['msg'] = strip_tags($error);
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $response['status'] = true;
            $response['msg'] = '上传成功！';
            $response['url'] = '/uploads/admin/' . $filename;
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

}
