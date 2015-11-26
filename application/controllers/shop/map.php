<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-9-28 9:57:25 by caowenpeng , caowenpeng1990@126.com
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
        $this->twig->render('shop/map/getLocation.twig', array(
        ));
    }

}
