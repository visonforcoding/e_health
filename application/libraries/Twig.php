<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-29 13:22:46 by caowenpeng , caowenpeng1990@126.com
 * 拓展twig 模板引擎
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'third_party/Twig/Autoloader.php';

class Twig {

    private $loader;
    private $twig;
    private $_ci;

    function __construct() {
        Twig_Autoloader::register();
        $this->loader = new Twig_Loader_Filesystem(APPPATH . 'views');
        $this->twig = new Twig_Environment($this->loader, array(
            'cache' => APPPATH . 'cache',
            'auto_reload' => true,
            'debug'=>true,
            'strict_variables'=>true
        ));
    }

    public function render($tpl, $data = array(), $return = FALSE) {
        $output = $this->twig->render($tpl, $data);
        $this->_ci = &get_instance();
        $this->_ci->output->append_output($output);
        if ($return) {
            return $output;
        }
    }

    /**
     * __call
     * @param string $method
     * @param array $args
     * @throws Exception
     */
    public function __call($method, $args) {
        $return = call_user_func_array(array($this->twig, $method), $args);
        if ($return) {
            return $return;
        }
    }

}
