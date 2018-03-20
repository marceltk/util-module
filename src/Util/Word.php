<?php

namespace UtilModule\Util;

use Zend\Filter\Word\CamelCaseToDash;
use Zend\Filter\Word\CamelCaseToSeparator;
use Zend\Filter\Word\CamelCaseToUnderscore;
use Zend\Filter\Word\DashToCamelCase;

class Word
{

    public static function camelCaseToDash($value)
    {
        $filter = new CamelCaseToDash();

        return $filter->filter($value);
    }

    public static function camelCaseToSeparator($value)
    {
        $filter = new CamelCaseToSeparator();

        return $filter->filter($value);
    }

    public static function camelCaseToUnderScore($value)
    {
        $filter = new CamelCaseToUnderscore();

        return $filter->filter($value);
    }

    public static function dashToCamelCase($value)
    {
        $filter = new DashToCamelCase();

        return $filter->filter($value);
    }
}