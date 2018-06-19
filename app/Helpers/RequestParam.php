<?php
/**
 * Created by PhpStorm.
 * User: saeed
 * Date: 5/1/18
 * Time: 12:23 PM
 */

namespace App\Helpers;


use Illuminate\Http\Request;

class RequestParam
{

    public static function where($name,$query,$int=false){
        if(!empty(\Request($name))){
            $value = \Request($name);
            if($int){
                $value = (int) \Request($name);
            }
            $query = $query->where($name,$value);
        }
        return $query;
    }

    public static function whereLike($name,$query,$int=false){
        if(!empty(\Request($name))){
            $value = \Request($name);
            if($int){
                $value = (int) \Request($name);
            }
            $query = $query->where($name,'like',"%".$value."%");
        }
        return $query;
    }

}