<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/20
 * Time: 15:46
 */
// 1、isset：申明一个变量，且这个变量被赋值+值不是null。值可以是"",0,false之类的。
$name = false;
var_dump(isset($name)); // true；

// 2、isset：除了可以判断普通变量以外，还可以判断数组 or 对象。
// isset($array['test']);

// isset($obj->name);

// 3、isset：可以同时判断多个
// isset($var1, $var2, ......);

// unset：也可以用来检查数组的元素或者对象的属性
unset($name);
var_dump(isset($name)); // false;

// empty：检查一个变量是否没被声明或者值是false、""、null、array()、0、"0"、0.0（false的七种情况）;
$a = 0.0;
var_dump(empty($a));
