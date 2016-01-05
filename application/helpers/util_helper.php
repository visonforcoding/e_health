<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Encoding     :   UTF-8
 * Created on   :   2015-7-31 17:03:40 by caowenpeng , caowenpeng1990@126.com
 */

/**
 *  无线分类的树形简单实现
 * @param type $list
 * @param type $pid_key  父字段名
 * @param type $id_key   主键名
 * @param type $pid
 * @param type $level
 * @param type $html
 * @return type
 */
function tree($list, $pid_key = 'pid', $id_key = 'id', $pid = 0, $level = 0, $html = '----') {
    $tree = array();
    foreach ($list as $v) {
        if ($v[$pid_key] == $pid) {
            $v['sort'] = $level;
            $v['html'] = str_repeat($html, $level);
            $tree[] = $v;
            $tree = array_merge($tree, tree($list, $pid_key, $id_key, $v[$id_key], $level + 1, $html));
        }
    }
    return $tree;
}

function easy_tree($list, $pid_key = 'pid', $id_key = 'id', $pid = 0) {
    $tree = array();
    foreach ($list as $value) {
        if ($value[$pid_key] == $pid) {
            $children = easy_tree($list, $pid_key, $id_key, $value[$id_key]);
            if ($children) {
                $tree[] = ['id' => $value['id'], 'text' => $value['name']];
                $value['children'] = $children;
            }
            $tree[] = $value;
        }
    }
    return $tree;
}

function get_menu($list, $pid_key = 'pid', $id_key = 'id') {
    foreach ($list as $key => $value) {
        foreach ($list as $k => $v) {
            if ($value[$id_key] == $v[$pid_key]) {
                $list[$key]['child'][] = $v;
                unset($list[$k]);
            }
        }
    }
    $list = array_values($list);
    return $list;
}

/**
 * 输出js弹出框
 * @param type $msg
 */
function alert($msg) {
    echo '<script>alert("' . $msg . '");</script>';
}

/**
 * 文件缓存
 * @param type $name 缓存名
 * @param type $data null删除 为空获取值 不为空创建缓存
 * @return type
 */
function fcache($name, $data = '') {
    $filename = APPPATH . '/cache/' . $name;
    if ($data !== '') {
        if ($data !== NULL) {
            file_put_contents($filename, $data);
        } else {
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
    } else {
        if (file_exists($filename)) {
            return file_get_contents($filename);
        } else {
            return false;
        }
    }
}

/**
 * 
 * @param type $info
 * @throws Exception
 */
function lmdebug($info,$filePrefix='lm') {
    $name = date('Ymd');
    if (!is_string($info)) {
        throw new Exception('参数必须为字符串类型');
    }
    $info = date('Y-m-d H:i:s').' '.$info;
    $filename = APPPATH . 'logs/' .$filePrefix.'_' . $name;
    if (file_exists($filename)) {
        file_put_contents($filename, $info . "\r\n", FILE_APPEND);
    } else {
        file_put_contents($filename, $info . "\r\n");
    }
}

/**
 * 
 * @param type $fileName
 * @return type
 */
function getFileType($fileName) {
    $nameArr = explode('.', $fileName);
    $length = count($nameArr) - 1;
    return $nameArr[$length];
}

/**
 * 生成指定长度的随机字符串
 * @param type $length
 * @param int $type 默认1数字字母混合，2纯数字，3纯字母
 * @return string
 */
function createRandomCode($length, $type = 1) {
    $randomCode = "";
    switch ($type) {
        case 1:
            $randomChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 2:
            $randomChars = '0123456789';
            break;
        case 3:
            $randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        default:
            break;
    }
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $randomChars { mt_rand(0, strlen($randomChars) - 1) };
    }
    return $randomCode;
}

/**
 * 不告诉你这是干嘛的
 */
function setPlainPassword($pwd) {
    $passwd = sha1($pwd . 'lmbaby');
    return substr($passwd, 4, 30);
}

/**
 * 
 * @param array $data
 */
function ajaxReturn(array $data) {
    exit(json_encode($data, JSON_UNESCAPED_UNICODE));
}

function format_tel($tel) {
    return substr_replace($tel, '****', 3, 4);
}

/**
 * 解析js 设置的cookie 中文编码问题
 * @param type $str
 * @return type
 */
function unescape($str) {
    $str = rawurldecode($str);
    preg_match_all("/(?:%u.{4})|.+/", $str, $r);
    $ar = $r[0];
    foreach ($ar as $k => $v) {
        if (substr($v, 0, 2) == "%u" && strlen($v) == 6)
            $ar[$k] = iconv("UCS-2", "utf-8", pack("H4", substr($v, -4)));
    }
    return join("", $ar);
}

/**
 * 计算2点间距离
 * @param type $coordinate1
 * @param type $coordinate2
 * @return 米  两点间距离
 * @throws Exception
 */
function getDistance($coordinate1, $coordinate2) {
    $coordinate1_arr = explode(',', $coordinate1);
    $coordinate2_arr = explode(',', $coordinate2);
    if (!is_array($coordinate1_arr) || empty($coordinate1_arr)) {
        throw new Exception;
    } else {
        $lng1 = $coordinate1_arr[0];
        $lat1 = $coordinate1_arr[1];
    }
    if (!is_array($coordinate2_arr) || empty($coordinate2_arr)) {
        throw new Exception;
    } else {
        $lng2 = $coordinate2_arr[0];
        $lat2 = $coordinate2_arr[1];
    }

//    $earthRadius = 6367000; //approximate radius of earth in meters
    $earthRadius = 6371000; //百度地图用的参数

    /*
      Convert these degrees to radians
      to work with the formula
     */

    $lat1 = ($lat1 * pi() ) / 180;
    $lng1 = ($lng1 * pi() ) / 180;

    $lat2 = ($lat2 * pi() ) / 180;
    $lng2 = ($lng2 * pi() ) / 180;

    /*
      Using the
      Haversine formula

      http://en.wikipedia.org/wiki/Haversine_formula

      calculate the distance
     */

    $calcLongitude = $lng2 - $lng1;
    $calcLatitude = $lat2 - $lat1;
    $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
    $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
    $calculatedDistance = $earthRadius * $stepTwo;

    return round($calculatedDistance, 2);
//     return round($calculatedDistance);
}

/**
 * 原生获取session
 * @param type $key
 * @return type
 */
function getSession($key) {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

/**
 * 导出csv
 * @param type $columnArr
 * @param type $data
 * @param type $filename 
 */
function exportExcel($columnArr, $data, $filename) {
    header('Content-Type: application/vnd.ms-excel');
//        header( 'Content-Type: text/csv' );
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    // 从数据库中获取数据，为了节省内存，不要把数据一次性读到内存，从句柄中一行一行读即可  
    // 打开PHP文件句柄，php://output 表示直接输出到浏览器  
    $fp = fopen('php://output', 'w');
    // 输出Excel列名信息  
    $head = $columnArr;
    foreach ($head as $i => $v) {
        // CSV的Excel支持GBK编码，一定要转换，否则乱码  
        $head[$i] = iconv('utf-8', 'gbk', $v);
    }
    // 将数据通过fputcsv写到文件句柄  
    fputcsv($fp, $head);
    // 计数器  
    $cnt = 0;
    // 每隔$limit行，刷新一下输出buffer，不要太大，也不要太小  
    $limit = 100000;
    // 逐行取出数据，不浪费内存  
    foreach ($data as $key => $value) {
        $cnt ++;
        if ($limit == $cnt) {
            //刷新一下输出buffer，防止由于数据过多造成问题  
            ob_flush();
            flush();
            $cnt = 0;
        }
        foreach ($value as $i => $v) {
            $value[$i] = iconv('utf-8', 'gbk', $v);
        }
        fputcsv($fp, $value);
    }
    fclose($fp);
}

/**
 * 
 */
function phpexcelExport($filename, array $header, array $data) {
    require_once APPPATH . '/third_party/PHPExcel/Classes/PHPExcel.php';
    $PHPExcel = new PHPExcel();
    $objPHPExcel = $PHPExcel;
    $objPHPExcel->getProperties()->setCreator("柠檬智慧科技")
            ->setDescription("柠檬智慧科技生成.");
    $A = 'A';
    foreach ($header as $value) {
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($A . '1', $value);
        $A++;
    }
    unset($A);
    $A = 'A';
    $i = 2;
    foreach ($data as $value) {
        foreach ($value as $k=> $v) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($A.$i, $v);
            $A++;
        }
        $A = 'A';
        $i++;     
    }
//    $objPHPExcel->getActiveSheet()->setTitle('Simple');
    $objPHPExcel->setActiveSheetIndex(0);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    // We'll be outputting an excel file
    header('Content-type: application/vnd.ms-excel');
    // It will be called file.xls
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    // Write file to the browser
    $objWriter->save('php://output');
}

