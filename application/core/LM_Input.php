<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-31 10:28:40 by caowenpeng , caowenpeng1990@126.com
 */
class LM_Input extends CI_Input {

    private static $urls = null;

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 获取URL地址参数数组
     *
     * @return array|null
     */
    public function urls() {
        if (is_array(self::$urls))
            return self::$urls;
        $CI = &get_instance();
        $urls = $CI->uri->ruri_to_assoc();
        if (!is_array($urls))
            $urls = array();
        self::$urls = $urls;
        return self::$urls;
    }

    /**
     * 将URL地址参数数组合并到GET和REQUEST中
     */
    public function set_urls() {
        if (!is_array(self::$urls)) {
            $this->urls();
            $_GET = array_merge(self::$urls, $_GET);
            $_REQUEST = array_merge(self::$urls, $_REQUEST);
        }
    }

    /**
     * 重写Input的GET方法
     *
     * @param null $index
     * @param bool $xss_clean
     * @return string
     */
    public function get($index, $xss_clean = FALSE) {
        $this->set_urls();
        return parent::get($index, $xss_clean);
    }

    /**
     * 重写Input的get_post方法
     *
     * @param string $index
     * @param bool $xss_clean
     * @return string
     */
    public function get_post($index, $xss_clean = FALSE) {
        $this->set_urls();
        return parent::get_post($index, $xss_clean);
    }

    /**
     * 获取所有POST数据
     *
     * @param bool $xss_clean 是否清理XSS威胁
     * @return array 所有POST数据
     */
    public function posts($xss_clean = FALSE) {
        if (!is_array($_POST))
            return array();
        $result = array();
        foreach (array_keys($_POST) as $v) {
            $result[$v] = $this->post($v, $xss_clean);
        }
        return $result;
    }

    /**
     * 获取所有GET数据
     *
     * @param bool $xss_clean 是否清理XSS威胁
     * @return array 所有GET数据
     */
    public function gets($xss_clean = FALSE) {
        if (!is_array($_GET))
            return array();
        $this->set_urls();
        $result = array();
        foreach (array_keys($_GET) as $v) {
            $result[$v] = $this->get($v, $xss_clean);
        }
        return $result;
    }

    /**
     * 获取所有请求数据
     *
     * @param bool $xss_clean 是否清除XSS威胁
     * @return array 所有请求数据
     */
    public function requests($xss_clean = FALSE) {
        if (!is_array($_REQUEST))
            return array();
        $this->set_urls();
        $result = array();
        foreach (array_keys($_REQUEST) as $v) {
            $result[$v] = $this->get_post($v, $xss_clean);
        }
        return $result;
    }

    /**
     * 判断请求类型是否为POST
     *
     * @return bool
     */
    public function isPost() {
        return strtolower($this->server('REQUEST_METHOD')) === 'post';
    }

    /**
     * 判断请求类型是否为GET
     *
     * @return bool
     */
    public function isGet() {
        return strtolower($this->server('REQUEST_METHOD')) === 'get';
    }

    public function getData() {
        $postStr = file_get_contents("php://input");
        if (!empty($postStr)) {
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
              the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            return $postObj;
        } else {
            return false;
        }
    }

}
