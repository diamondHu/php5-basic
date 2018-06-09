<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/9
 * Time: 10:14
 * 策略模式
 */

// 声明一个 抽象的 拥有一个算法方法的 基类。具体的方法再通过继承这个基类去实现
// eg：下载服务如何根据访问它的Web客户端选择不同的文件
abstract class FileNamingStrategy
{
    abstract function createLinkName($filename);
}

class ZipFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return "http://downloads.foo.bar/$filename.zip";
    }
}

class TarGzFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return "http://downloads.foo.bar/$filename.tar.gz";
    }
}

// 两个文件都要求可以通过服务器上统一格式去访问：
// $_SERVER['HTTP_USER_AGENT']：当前请求的User_Agent头部内容
if (strstr($_SERVER['HTTP_USER_AGENT'], "Win")) {
    // 在Win请求中可见头部信息User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36
    // 如果Win在此信息中说明是Win系统，需要创建.zip链接
    $fileNamingObj = new ZipFileNamingStrategy();
} else {
    // 否则就是.tar.zip格式的系统
    $fileNamingObj = new TarGzFileNamingStrategy();
}

$calc_filename = $fileNamingObj->createLinkName("Calc101");
$stat_filename = $fileNamingObj->createLinkName("Stat2000");

print <<<EOF
<h1>The following is a list of greate downloads</h1>
<br>
<a href="$calc_filename">A great calculator</a>
<br>
<a href="$stat_filename">The best statistics application</a>
EOF;


// Win情况下 ，页面展示的地址都是.zip结尾