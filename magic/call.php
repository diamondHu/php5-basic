<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 17:26
 */

class HelloWorld
{
    function display($count)
    {
        for ($i = 0; $i < $count; $i ++) {
            print "hello word <br>";
        }
        return $count;
    }
}

class HelloWorldDelegator
{
    private $obj;
    function __construct()
    {
        $this->obj = new HelloWorld();
    }

    function __call($method, $agrs)
    {
        // $method是$obj->display()调用的方法名
        // $agrs是调用方法时传过来的参数(数组形式)
        var_dump(array($this->obj, $method));
        return call_user_func_array(array($this->obj, $method), $agrs); // 调用回调函数
    }
}

$obj = new HelloWorldDelegator();
print $obj->display(3);