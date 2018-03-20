<?php

namespace UtilModule;

use PHPUnit\Framework\TestCase;
use UtilModule\Util\Filter;

final class UtilTest extends TestCase
{

    public function testConvertDates()
    {
        $this->assertEquals('02/10/2017', Filter::toDatePTBR('2017-10-02'));
        $this->assertEquals('02/10/2017 12:52:00', Filter::toDatePTBR('2017-10-02 12:52:00', true));
        $this->assertEquals('2017-03-02', Filter::toDateISODate('02/03/2017'));
        $this->assertEquals('2017-03-02 12:50:00', Filter::toDateISODate('02/03/2017 12:50:00', true));
    }

    public function testManipulatingStrings()
    {
        $this->assertEquals('AÇÕES', Filter::toUpperCase("ações"));
        $this->assertEquals('ações', Filter::toLowerCase("AÇÕES"));
        $this->assertEquals('filename.txt', Filter::baseName("/path/filename.txt"));
        $this->assertEquals('index_controller', Filter::toLowerCase(Filter::camelCaseToUnderScore
        ('IndexController')));
        $this->assertEquals('index-controller', Filter::toLowerCase(Filter::camelCaseToDash('IndexController')));
        $this->assertEquals('IndexController', Filter::dashToCamelCase('index-controller'));
    }

    public function testOnlyNumbers()
    {
        $this->assertEquals(1200, Filter::onlyNumber("12,00"));
        $this->assertEquals(1200, Filter::onlyNumber("12.00"));
        $this->assertEquals(1200, Filter::onlyNumber("12a00"));
    }

    public function testMoneyFormats()
    {
        $this->assertEquals('12,00', Filter::moneyFormat(1200));
        $this->assertEquals('120,00', Filter::moneyFormat(12000));
    }

}