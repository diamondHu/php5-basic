<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 13:11
 */

// 数据库链接的句柄保存在一个private成员中，用来给类的内部逻辑使用。
// 主机名不能被类的使用者看到。如果想要修改，开发者需要从这个初始类中继承讴歌新的类然后修改主机名。
// 类的查询是一个公共变量

class MyDbConnectionClass
{
    public $queryResult;
    protected $dnHostname = 'localhost';
    private $dbConnection;

    public function connect()
    {
        $conn = $this->createDbConnection();
        $this->setDbConnection($conn);
        return $conn;
    }

    protected function createDbConnection()
    {
        return mysqli_connect($this->dnHostname);
    }

    private function setDbConnection($conn)
    {
        $this->dbConnection = $conn;
    }
}

class MyFooDotComDbConnectionClass extends MyDbConnectionClass
{
    protected $dbHostname = 'foo.com';

    protected function createDbConnection() // 修改数据库名
    {
        return mysqli_connect($this->dbHostname);
    }
}
