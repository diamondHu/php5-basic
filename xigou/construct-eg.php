<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 21:51
 */
class A
{
    function __construct()
    {
        $a = func_get_args(); // 返回传入的参数列表数组
        // func_get_arg(2)：返回指定的参数值
        $i = func_num_args(); // 返回调用函数的传入参数个数，整型
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
            // call_user_func_array：调用回调函数，并把一个数组参数作为回调函数的参数
            // call_user_func_array：第一个参数是回调函数，第二个是参数（索引数组）
            // 区别：call_user_func：第二参数是字符串
        }
    }

    function __construct1($a1) {
        echo('__construct with 1 param called: ' . $a1 . PHP_EOL);
    }

    function __construct2($a1, $a2) {
        echo('__construct with 1 param called: ' . $a1 . ',' . $a2 . PHP_EOL);
    }

    function __construct3($a1, $a2, $a3) {
        echo('__construct with 1 param called: ' . $a1 . ',' . $a2 . ',' . $a3 . PHP_EOL);
    }
}

$o = new A('sheep1', '33');