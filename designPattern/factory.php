<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 14:15
 */

// 工厂模式：工厂类有一个静态的方法，用来接收一些输入，由输入决定实例化哪个子类。
// 其特点就在于创建对象上：工厂模式将创建对象的方法封装起来，根据不同的参数生成不同类的实例。

// eg：Web站点，有着不同的用户登录。有游客、会员、管理员。

// 四个基类
abstract class User
{
    protected $name = null;

    function __construct($name)
    {
        $this->name = $name;
        // 构造函数不返回值
    }

    function getName()
    {
        return $this->name;
    }

    // 权限
    function hasReadPermission()
    {
        return true;
    }

    function hasModifyPermission()
    {
        return false;
    }

    function hasDeletePermission()
    {
        return false;
    }

    function wantsFlashPermission()
    {
        return true;
    }
}


class GuestUser extends User
{

}

class CustomerUser extends User
{
    function hasModifyPermission()
    {
        return true;
    }
}

class AdminUser extends User
{
    function hasModifyPermission()
    {
        return true;
    }

    function hasDeletePermission()
    {
        return true;
    }

    function wantsFlashPermission()
    {
        return false;
    }
}


// 工厂模式：根据不用的参数，实例化不用的类
class UserFactory
{
    // 实际情况下，用户身份是从数据库取值
    private static $users = [
        "Andi" => "admin",
        "Stig" => "guest",
        "Derick" => "customer"
    ];

    static function create($name)
    {
        if (!isset(self::$users[$name])) {
            return "用户不存在";
        }
        switch (self::$users[$name]) {
            case "guest" :
                return new GuestUser($name);
            case "customer" :
                return new CustomerUser($name);
            case "admin" :
                return new AdminUser($name);
            default:
                return "用户不存在";
        }
    }
}

function boolToStr($b)
{
    if ($b == true) {
        return "Yes <br>";
    } else {
        return "No <br>";
    }
}

// 展示用户拥有的权限
function displayPermission(User $obj)
{
    print $obj->getName() . "'s Permission: <br>";
    print "Read: " . boolToStr($obj->hasReadPermission());
    print "Modify: " . boolToStr($obj->hasModifyPermission());
    print "Delete: " . boolToStr($obj->hasDeletePermission());
}

function displayRequirements(User $obj)
{
    if ($obj->wantsFlashPermission()) {
        print $obj->getName() . "requires Flash <br>";
    }
}

// 测试工厂模式
$login = [
    "Andi",
    "Stig",
    "Derick"
];

foreach ($login as $loginOne) {
    displayPermission(UserFactory::create($loginOne));
    displayRequirements(UserFactory::create($loginOne));
}