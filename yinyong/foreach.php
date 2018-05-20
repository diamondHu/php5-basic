<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 23:04
 */

// foreach 函数支持引用
$array = [];
foreach ($array as &$value) {
    if ($value === 'null') {
        $value = null;
    }
}

// 给传递引用的参数设置默认值
function my_func(&$arg = null)
{
    if ($arg === null) {
        print "$arg is empty";
    }
}