<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 21:35
 */

// 构造函数：PHP 5 允许在类中定义一个构造函数，当初始化这个类时会执行这个函数，可以用来初始化一些操作。
// 析构函数：与 构造函数相反，在对象的所有引用都被删除或销毁时执行。

// 构造函数： __construct
class BaseClass
{
    function __construct() // 构造函数不能返回值，所以从构造函数内产生一个错误最常用的一个方法就是抛出一个异常
    {
        print "我是父类构造函数";
    }
}

class SubClass extends BaseClass
{
    function __construct()
    {
        // 重写该方法
        parent::__construct(); // 要想使用父类需要parent::
        print "我是子类构造函数";
    }
}

class OtherSubClass extends BaseClass
{
    // 不重写父类方法，但是只要继承类父类，就会被调用
}

$obj = new BaseClass(); // 我是父类构造函数

$obj = new SubClass(); // 我是父类构造函数+我是子类构造函数

$obj = new OtherSubClass(); // 我是父类构造函数
