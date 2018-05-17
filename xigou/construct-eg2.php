<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 22:08
 */
class Foo
{
    private $name;

    private $link;

    public function __construct() // 也可以通过__construct($name) 方式接受参数
    {
        $param = func_get_args();
        $name = $param[0];
        $this->name = $name;
    }

    public function setLink(Foo $link)
    {
        $this->link = $link;
    }

    public function __destruct()
    {
        echo 'Destroying:' , $this->name , PHP_EOL;
    }
}

$foo = new Foo('Foo 1'); // 当给初始化的对象传参时，内部的构造函数必须有接受参数的方式
$bar = new Foo('Foo 2');

$foo->setLink($bar);
$bar->setLink($foo);

