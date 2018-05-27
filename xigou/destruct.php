<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 12:36
 */

class MyClass
{
    function __destruct()
    {
        print "An object of type MyClass is being destroyed \n";
    }
}

$obj = new MyClass();

$obj = null;

// 当脚本运行完php结束请求时，对象本身就被注销了，即使没有最后一行代码也会执行析构函数。
// php 并不保证析构函数准确的执行时间。