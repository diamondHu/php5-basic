<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 10:45
 */

class Logger
{
    // 一个类的所有实例，共用静态属性
    static private $instance = null;

    // 单例模式是通过一个静态方法getInstance实现,必须保证只有一个实例
    static function getInstance()
    {
        if (self::$instance == null) {
            // 创建一个实例并存储在一个静态变量中
            self::$instance = new Logger();
        }
        // 返回句柄
        return self::$instance;
    }

    private function __construct()
    {

    }

    public function Log($str)
    {

    }
}

// 访问
Logger::getInstance()->Log('check');