<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 13:45
 */

class A
{
    private static $count = 0;
    public function __construct()
    {
        self::$count = self::$count + 1;
    }

    public function getCount()
    {
        return self::$count;
    }

    public function __destruct()
    {
        self::$count = self::$count - 1;
        print $this->getCount() . "<br>";
    }
}

// 类所有的实例化对象公用静态属性，即同一块内存；
$a = new A(); // 1

$b = new A(); // 2

$c = new A(); // 3

// 此时脚本还未结束，析构函数未被执行，count = 3；
echo "now here have " . $a->getCount() . "<br>"; // 此时执行完后才会执行析构函数
// now here have 3 2 1 0
unset($c); // 此时$c对象所有属性销毁，会执行析构函数，count = 2；

echo "now here have " . $a->getCount() . "<br>";
// now here have 2 1 0