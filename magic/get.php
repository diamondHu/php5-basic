<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/5/27
 * Time: 17:42
 */

class StrictCoordinateClass
{
    private $arr = array('x' => null, 'y' => null);

    function __get($property)
    {
        if (array_key_exists($property, $this->arr)) {
            return $this->arr[$property];
        } else {
            print "Error: Can't read a property other than x&y";
        }
    }

    function __set($property, $value)
    {
        // $property 是$obj->x调用的属性
        // $value 是对该属性的赋值
        if (array_key_exists($property, $this->arr)) {
            $this->arr[$property] = $value;
        } else {
            print "Error: Can't read a property other than x&y";
        }
    }
}

$obj = new StrictCoordinateClass();
$obj->x = 'dsd';

print $obj->x;