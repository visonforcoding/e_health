<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Util {

    public static function check_admin() {
        //echo "admin";
        session_start();
        if (!empty($_SESSION['admin_username']) && !empty($_SESSION['admin_userid']) && !empty($_SESSION['admin_user_shell'])) {
            //echo $_SESSION['userid'];
            $id = intval($_SESSION['admin_userid'], 10);
            $user_shell = $_SESSION['admin_user_shell'];
            $name = $_SESSION['admin_username'];
        } else {
            
            $nowUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //setcookie('lastUrl',$nowUrl);
            echo "<script >location.href='/admin/login?lasturl=" . urlencode($nowUrl) . "';</script>";
        }
    }

    public static function check_shop() {
        //echo 'shop';
        session_start();
        if (!empty($_SESSION['shop_userphone']) && !empty($_SESSION['shop_userid']) && !empty($_SESSION['shop_user_shell'])) {
            //echo $_SESSION['userid'];
            $id = intval($_SESSION['shop_userid'], 10);
            $user_shell = $_SESSION['shop_user_shell'];
            $phone = $_SESSION['shop_userphone'];
        } else {
            $nowUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //setcookie('lastUrl',$nowUrl);
            echo "<script >location.href='/shop/login?lasturl=" . urlencode($nowUrl) . "';</script>";
        }
    }

    public static function check_user() {
        //echo 'user';
        session_start();
        if (!empty($_SESSION['user_userphone']) && !empty($_SESSION['user_userid']) && !empty($_SESSION['user_user_shell'])) {
            //echo $_SESSION['userid'];
            $id = intval($_SESSION['user_userid'], 10);
            $user_shell = $_SESSION['user_user_shell'];
            $phone = $_SESSION['user_userphone'];
            //return true;
        } else {
            $nowUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //setcookie('lastUrl',$nowUrl);
            echo "<script >location.href='/user/login?lasturl=" . urlencode($nowUrl) . "';</script>";
            die;
        }
    }

    public static function getOrderTable($orderNo) {
        $table = 'orderShop';
        if (strpos($orderNo, 'vip') !== false) {
            $table = 'orderCard';
        } else if (strpos($orderNo, 'hp') !== false) {
            $table = 'orderHelp';
        }

        return $table;
    }

    //============kim func================
    //校验图片验证码
    //@param $code 输入的验证码
    //@return true 验证成功 or flase 验证失败
    public static function check_verify_code($code) {
        session_start();
        if (!empty($_SESSION['verify_code'])) {
            $verifyCode = $_SESSION['verify_code'];
            if (MD5(strtolower($code)) == $verifyCode) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //校验短信验证码
    //@param $phone 输入的手机号
    //@param $code 输入的验证码
    //@return true 验证成功 or flase 验证失败
    public static function check_verify_msncode($phone, $code) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!empty($_SESSION['msn_phone']) && !empty($_SESSION['msn_code'])) {
            $msnCode = $_SESSION['msn_code'];
            $msnPhone = $_SESSION['msn_phone'];

            if (MD5($phone) == $msnPhone && MD5($code) == $msnCode) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //=============shunan func============



    /*
      public static function &get_instance()
      {
      return self::$instance;
      }
     * */
}

/* End of file Someclass.php */
