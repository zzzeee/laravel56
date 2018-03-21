<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| 常用工具函数
| -------------------------------------------------------------------------
| 包含如下常用函数:
| 1. 检查手机号码格式  check_mobile
| 2. 获取文件格式  get_file_extension
| 3. 格式化数组的顺序  format_array_sort_key
| 4. 生成随机数  create_rand_string
| 5. 匹配元素是否在数组中(不区分大小写)  in_array_i
|
*/


if(!function_exists('check_mobile')) {
    //检查手机号码格式
    function check_mobile($tel) {
        return (bool)preg_match("/^1[34578]{1}\d{9}$/", $tel);
    }
}

if(!function_exists('get_file_extension')) {
    //获取文件格式
    function get_file_extension($filename) {
        $type = '';
        if(!empty($filename) && is_string($filename)) {
            $type = preg_replace('/\W.*$/', '', substr($filename, strripos($filename, '.') + 1));
        }
        return $type;
    }
}

if(!function_exists('format_array_sort_key')) {
    /**
     * 把数据按指定的键名及顺序取出
     * 注意json的格式, 键名为关键字, 值为初始值
     * 如: 
     *   $data = ['e' => 'eee', 'a' => 'aaa', 'c' => 'ccc'];
     *   $json = ['a' => '111', 'e' => '222', 'g' => '333'];
     *   print_r(array_intersect_key($data, $json));
     *   // Array ( [a] => aaa [e] => eee [g] => 333 )
     * 
     * @param  Array  $data  数据源
     * @param  Array  $json  格式数组
     * @return Array
     */
    function format_array_sort_key($data, $json = array()) {
        if(!empty($json) && is_array($json) && !empty($data) && is_array($data)) {
            return array_intersect_key(array_merge($json, $data), $json);
        }
        return $data;
    }
}

if(!function_exists('create_rand_string')) {
    /**
     * 生成指定长度的随机字符串
     * 
     * @param  String  $length  长度
     * @param  Int     $type 返回格式: 1 大写, 2 小写, 其他原样
     * @return String
     */
    function create_rand_string($length, $type = 0) {
        $rand = time() + rand(1000, 9999);
        $str = substr(MD5($rand), 0, $length);
        //替换不好认别的字符
        $str = str_replace('I', 'A', $str);
        $str = str_ireplace('O', 'B', $str); // str_ireplace 不区分大小写
        if($type == 1) $str = strtoupper($str);
        if($type == 2) $str = strtolower($str);
        return $str;
    }
}

if(!function_exists('in_array_i')) {
    /**
     * 匹配元素是否在数组中(不区分大小写)
     * 
     * @param  String  $search  搜索的字符
     * @param  Array   $array   被搜索的数组
     * @return Bool
     */
    function in_array_i($search, $array) {
        if(!empty($search) && is_array($array)) {
            return !empty(preg_grep('/' . preg_quote($search, '/') . '/i', $array));
        }
        return false;
    }
}

if(!function_exists('get_class_methods')) {
    function get_class_methods($classname) {
        $reflection = new ReflectionClass($classname);
        $methods = $reflection->getMethods();
        return $methods;
    }
}

