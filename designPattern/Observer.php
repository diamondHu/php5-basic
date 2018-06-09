<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 15:08
 */

// 观察者模式：某种事物会改变，造成不同的结果。通常由一个Observer接口实现
// 核心：对象需要观察者注册，当这个事件发生或数据改变时，就能自动获取到通知；如何获取通知：对注册数遍历，每个对象实现其接口提供的操作

// eg：商品价格由于不同地区，汇率的不同展示出不同的价格
// 一个对象想要可观察，通常需要一个注册方法，这让观察者对象可以注册它自己。

// 观察者接口
interface Observer
{
    function notify($obj);
}

// 主题
class ExchangeRate
{
    static private $instance = null;

    private $observers = [];

    private $exchange_rate;

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ExchangeRate();
        }
        return self::$instance;
    }

    public function registerObservers($obj)
    {
        $this->observers[] = $obj;
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }

    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }

    public function setExchangeRate($newRate)
    {
        $this->exchange_rate = $newRate;
        // 通知观察者
        $this->notifyObservers();
    }

}

// 观察者
class productItem implements Observer
{
    public function __construct()
    {
        // 注册对象，以便观察
        ExchangeRate::getInstance()->registerObservers($this);
    }

    public function notify($obj)
    {
        if ($obj instanceof ExchangeRate) {
            print "Received update! <br>";
        }
    }
}

// 测试
$product1 = new ProductItem();
$product2 = new ProductItem();

// 汇率改变
ExchangeRate::getInstance()->setExchangeRate(4.5);
