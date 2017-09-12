<?php
/**
 * MetricLinearUnitTestUnitTest.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2017, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\tests;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use PHPUnit\Framework\TestCase;
use vbpupil\Metric\MetricLinearUnit;


class MetricLinearUnitTest extends TestCase
{
    /**
     * @var MetricLinearUnit
     */
    protected $sut;


    protected function setUp()
    {
        $this->sut = new MetricLinearUnit(new FloatType(50), new StringType('cm'));
    }

    public function testHumanReadableStrings()
    {
        $this->assertEquals('50 centimeters', $this->sut->getHumanReadableLong());
        $this->assertEquals('50 cm', $this->sut->getHumanReadableShort());
    }

    public function testGetValue()
    {
        $this->assertEquals(50, $this->sut->getValue());
    }

    public function testSetDenominators()
    {
        $this->assertEquals(500.0, $this->sut->getValue(new StringType('mm')));
        $this->assertEquals(50, $this->sut->getValue(new StringType('cm')));
        $this->assertEquals(0.5, $this->sut->getValue(new StringType('m')));
        $this->assertEquals(0.00050000000000000001, $this->sut->getValue(new StringType('km')));
    }

    /**
     * @expectedException \Exception
     */
    public function testDefinitionCheck()
    {
        $this->assertEquals('Measurement type mk not recognised', $this->sut->definitionCheck(new StringType('mk')));
//        $this->assertEquals('', $this->sut->definitionCheck(new StringType('in')));
    }
}
