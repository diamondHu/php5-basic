<?php
/**
 * Created by PhpStorm.
 * User: oxssg
 * Date: 2018/6/16
 * Time: 11:03
 */

function test()
{
    static $count = 0;
    $count ++ ;
     echo $count;
     if ($count < 10) {
//         return test();
         test();
     }
    $count --;
    echo $count;
}

//test();

function test2($count = 0)
{
    $count ++ ;
    echo $count;
    if ($count < 10) {
//         return test();
        test2($count);
    }
    $count --;
    echo $count;
}

test2();