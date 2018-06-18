<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 18:19
 */

// foreach只能遍历数组，如果想要遍历对象，
// 像访问数组一样访问对象属性和值，则类需要继承接口 Iterator
// Iterator需要执行的方法
// void rewind：迭代器指针指向开始处
// mixed current：返回当前位置的值
// mixed key：返回当前位置的关键字
// void next：迭代器移动到下一个关键字/值
// bool valid：在调用current和key之前，判断是否有更多的值

class NumberSquared implements Iterator
{
    private $start;

    private $end;

    private $cur;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function rewind()
    {
        $this->cur = $this->start;
    }

    public function current()
    {
        return pow($this->cur, 2); // pow(x,y)：返回x的y次方
    }

    public function key()
    {
        return $this->cur;
    }

    public function next()
    {
        $this->cur ++;
    }

    public function valid()
    {
        return $this->cur <= $this->end;
    }
}

$obj = new NumberSquared(3, 7);

foreach ($obj as $key => $value) {
    print "The square of $key is $value <br>";
}