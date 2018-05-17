<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/17
 * Time: 22:51
 */

class Singleton
{
    static private $instance = null;

    private function __construct()
    {

    }

    static public function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// 抽象类不能被实例化；可以进程一个抽象类
// 抽象方法必须本身是一个抽象类