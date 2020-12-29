<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-12-29
 * Time: 14:34
 */
namespace wenshizhengxin\ShortLink;
class ShortLink
{
    private static $domain = 'http://d.wszx.cc/';
    public static function long2short($url){
        $res = file_get_contents(self::$domain.'?app=index@create&url='.urlencode($url));
            $res = json_decode($res,true);
        if($res&&isset($res['msg'])){
            return $res['msg'];
        }
        return false;
    }
    public static function short2long($code){
        $res = file_get_contents(self::$domain.'?app=index@search&canshu='.$code);
            $res = json_decode($res,true);
        if($res&&isset($res['msg'])){
            return $res['msg'];
        }
        return false;
    }
}