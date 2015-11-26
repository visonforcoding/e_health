<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-9-9 11:27:37 by caowenpeng , caowenpeng1990@126.com
 */
class Map extends Home_Controller {

    /**
     * 手动定位
     */
    public function getPos() {
        $this->twig->render('home/map/getPos.twig', array(
        ));
    }

    
    /**
     * 拾取坐标
     */
    public function getLocation() {
        $this->twig->render('home/map/getLocation.twig', array(
        ));
    }

}
