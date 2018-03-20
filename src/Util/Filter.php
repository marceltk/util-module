<?php

namespace UtilModule\Util;

use Zend\Filter\BaseName;
use Zend\Filter\Compress\Gz;
use Zend\Filter\DateTimeFormatter;
use Zend\Filter\Digits;
use Zend\Filter\RealPath;
use Zend\Filter\StringToLower;
use Zend\Filter\StringToUpper;
use Zend\Filter\StringTrim;

class Filter
{

    public static function toUpperCase($value, $encoding = 'UTF-8')
    {
        $filter = new  StringToUpper(['encoding' => $encoding]);

        return $filter->filter($value);
    }

    public static function toLowerCase($value, $encoding = 'UTF-8')
    {
        $filter = new StringToLower(['encoding' => $encoding]);

        return $filter->filter($value);
    }

    public static function baseName($basename)
    {
        $filter = new BaseName();

        return $filter->filter($basename);
    }

    public static function onlyNumber($value)
    {
        $filter = new Digits();

        return $filter->filter($value);
    }

    public static function moneyFormat($number)
    {
        return number_format($number / 100, 2, ",", ".");
    }

    public static function toString($value)
    {
        return (string) $value;
    }

    public static function realPath($path)
    {
        $filter = new RealPath(false);
        $filtered = $filter->filter($path);

        return $filtered . DIRECTORY_SEPARATOR;
    }

    public static function trim($value, $charListOrOptions = [])
    {
        $filter = new StringTrim($charListOrOptions);

        return $filter->filter($value);
    }

    /***
     * Words
     **/
    public static function camelCaseToDash($value)
    {
        return Word::camelCaseToDash($value);
    }

    public static function camelCaseToSeparator($value)
    {
        return Word::camelCaseToSeparator($value);
    }

    public static function camelCaseToUnderScore($value)
    {
        return Word::camelCaseToUnderScore($value);
    }

    public static function dashToCamelCase($value)
    {
        return Word::dashToCamelCase($value);
    }

    /**
     * Compress
     **/
    public static function compressStringWithGz($value)
    {
        $Gz = new Gz();

        return $Gz->compress($value);
    }

    public static function decompressStringWithGz($value)
    {
        $Gz = new Gz();

        return $Gz->decompress($value);
    }

    public static function toDatePTBR($value, $withHours = false)
    {
        $filter = new DateTimeFormatter();
        $filter->setFormat("d/m/Y");
        if ($withHours) {
            $filter->setFormat("d/m/Y H:i:s");
        }

        return $filter->filter($value);
    }

    public static function toDateISODate($value, $withHours = false)
    {
        $filter = new DateTimeFormatter();

        $filter->setFormat("Y-m-d");
        if ($withHours) {
            $filter->setFormat("Y-m-d H:i:s");
        }

        preg_match('/([0-9\/]+).?([0-9:]+)?/i', $value, $matches);
        $data = implode('-', array_reverse(explode('/', $matches[1])));

        $hora = $matches[2];

        $value = $data . ' ' . $hora;

        return $filter->filter($value);
    }

}