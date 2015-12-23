<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-17 16:30:46 by caowenpeng , caowenpeng1990@126.com
 * 用户的一些动作 例如收藏
 */
class Useraction extends Home_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 点击收藏
     */
    public function collect() {
        if ($this->input->isPost()) {
            $user = $this->session->userdata('user');
            if (!$user) {
                $response['status'] = false;
                $response['err'] = 403;
                $response['msg'] = '请先登录!';
            } else {
                $uid = $user['id'];
                $sid = $this->input->post('sid');
                if (!empty($sid)) {
                    $query_collect = $this->db->where("`oid` = '$sid' and `uid` = '$uid' and `type` = '1' ")->get('collect');
                    $collect = $query_collect->row_array();
                    if (!$collect) {
                        $insert_data['oid'] = $sid;
                        $insert_data['uid'] = $uid;
                        $insert_data['type'] = 1;
                        $insert_data['ctime'] = date('Y-m-d H:i:s');
                        $ins_collect = $this->db->insert('collect', $insert_data);
                        if ($ins_collect) {
                            $response['status'] = true;
                            $response['msg'] = '收藏成功!';
                        } else {
                            $response['status'] = false;
                            $response['err'] = 500;
                            $response['msg'] = '服务器出错!';
                        }
                    } else {
                        $status = $collect['status'] === '1' ? 0 : 1;
                        $collect_id = $collect['id'];
                        $update_data = array('status' => $status, 'utime' => date('Y-m-d H:i:s'));
                        $update_ck = $this->db->where("`id` = '$collect_id'")->update('collect', $update_data);
                        if ($update_ck) {
                            $response['status'] = true;
                            $response['msg'] = '操作成功!';
                        } else {
                            $response['status'] = false;
                            $response['err'] = 500;
                            $response['msg'] = '服务器出错!';
                        }
                    }
                }
                if (empty($sid)) {
                    $response['status'] = false;
                    $response['err'] = 500;
                    $response['msg'] = '参数错误!';
                }
            }
        } else {
            $response['status'] = false;
            $response['err'] = 500;
            $response['msg'] = '请求错误!';
        }
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
    }

    /**
     * 上传头像
     */
    public function uploadAvatar() {
        if ($this->input->isPost()) {
            $posts = $this->input->posts();
            echo base64_decode($posts['data']);exit();
            $base64_body = substr(strstr($base64_image, ','), 1);
            $file = base64_decode($base64_body);

            $imagick = new Imagick();
            $imagick->readImageBlob($file);

            // 原始图片文件
            $origin_avatar_tmpfname = tempnam("/tmp", "origin_avatar");
            $handle = fopen($origin_avatar_tmpfname, "w");
            fwrite($handle, $file);
            fclose($handle);

            $exif = exif_read_data($origin_avatar_tmpfname);
            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 6:
                        $imagick->rotateImage(new ImagickPixel('#00000000'), 90);
                        break;
                }
            }
            unlink($origin_avatar_tmpfname);

            //当图片太大的时候就进行resize
            if ($imagick->getImageWidth() > 300) {
                $imagick->resizeImage(Input::get('target_width'), Input::get('target_height'), Imagick::FILTER_LANCZOS, 1, true);
            }

            $imagick->cropImage($_POST["w"], $_POST["h"], $_POST["x"], $_POST["y"]);

            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 6:
                        $imagick->rotateImage(new ImagickPixel('#00000000'), -90);
                        break;
                }
            }

            $image = $imagick->getImageBlob();
            $tmpfname = tempnam("/tmp", "avatar");

            $handle = fopen($tmpfname, "w");
            fwrite($handle, $image);
            fclose($handle);
            $cfile = new CURLFile($tmpfname, $type, $name);

            $data = CommonHelper::callApiUpload($cfile);
            unlink($tmpfname);

            echo $data;

            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }

}
