<?php
namespace App\Traits;

trait EnumTrait
{
    public static function all()
    {
        $selfClass = new \ReflectionClass(__CLASS__);
        return $selfClass->getConstants()['DESCRIPTIONS'];
    }

    public static function description($key)
    {
        $selfClass = new \ReflectionClass(__CLASS__);
        return $selfClass->getConstants()['DESCRIPTIONS'][$key];
    }
}
