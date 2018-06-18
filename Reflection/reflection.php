<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 15:53
 */

// 映射类

// eg1:展示类信息

class Test
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

ReflectionClass::export('test');