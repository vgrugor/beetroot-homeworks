<?php

class Base
{
    public static $who;

    public static function init()
    {
        self::$who = 'world';
    }

    public static function sayHello()
    {
        get_called_class()::init();
        echo 'hello ' . self::$who . PHP_EOL;
    }
}

class ChildOne extends Base
{
    public static function init()
    {
        self::$who = 'universe';
    }
}

ChildOne::sayHello();
