<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/20
 * Time: 15:37
 */

$name = 'John';

$$name = "Registered user";

print $John; // 变量的间接引用：$$name相当于 $John

// 返回值的引用：定义函数时需要在前面加上&符号
function &get_global_variable($name) {
    return $GLOBALS[$name];
}

$num = 10;
$value = &get_global_variable("num");
print $value . "\n"; // 10
$value = 20;
print $num . "\n"; // 20
