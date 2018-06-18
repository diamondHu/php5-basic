<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 16:01
 */

// 授权设计模式：一个类调用另一个非继承类的方法
// 会连接大量的对象，当一个类不具备方法时，会转向调用下一个类，第一个类具有最高优先级

class ClassOne
{
    function callClassOne()
    {
        print "In Class One<br>";
    }
}

class ClassTwo
{
    function callClassTwo()
    {
        print "In Class Two<br>";
    }
}

class ClassOneDelegator
{
    private $targets;

    function __construct()
    {
        $this->targets[] = new ClassOne();
    }

    function addObject($obj)
    {
        $this->targets[] = $obj;
    }

    function __call($name, $args)
    {
        foreach ($this->targets as $obj) {
            $r = new ReflectionClass($obj);
            if ($method == $r->getMethod($name )) {
                if ($method->isPublic() && !$method->isAdstract()) {
                    return $method->incoke($obj, $args);
                }
            }
        }
    }
}

// 测试

$obj = new ClassOneDelegator();
$obj->addObject(new ClassTwo());
$obj->callClassOne();
$obj->callClassTwo();