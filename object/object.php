<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 23:01
 */

// 对象的传递
// php 4 不能直接引用方法返回的对象，必须通过中间变量
$dummy = $obj->method();
$dummy->method2();

// php 5 可直接传递对象
$obj->method()->method2();