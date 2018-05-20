<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/20
 * Time: 16:48
 */
// 循环遍历数组除了foreach以外的方式

// each：返回当前元素的键名和健值，并将内部指针向前移动
// list：把数组中的值赋给一些变量
// 需要注意的是：使用each()来遍历一个数组之前，必须先用reset来处理数组。
$array = array("Dog", "Cat");

reset($array);
while (list($key, $value) = each($array)) {
    echo "$key = $value \n";
}

// 其他函数array_walk：也可以处理数组
