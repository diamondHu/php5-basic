<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 14:38
 */

// instanceof 是一个运算符，可以存在于表达式中并连接其他运算符(eg：!)
// instanceof 可以继承类，也可以进程一个接口
class Rectangle
{
    public $name = 'Rectangle';
}

class Square extends Rectangle
{
    public $name = __CLASS__;
}

function checkIfNotRectangle($shape)
{
    if (!$shape instanceof Rectangle) {
        print $shape->name;
    }
}

checkIfNotRectangle(new Square());
