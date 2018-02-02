<?php
/**
 * ImperialLinearUnitTestUnitTest.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2017, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\tests;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use PHPUnit\Framework\TestCase;
use vbpupil\Imperial\ImperialLinearUnit;


class ImperialLinearUnitTest extends TestCase
{
    /**
     * @var ImperialLinearUnit
     */
    protected $sut;


    protected function setUp()
    {
        $this->sut = new ImperialLinearUnit(new FloatType(50), new StringType('ft'));
    }

    public function testHumanReadableStrings()
    {
        $this->assertEquals('50 feet', $this->sut->getHumanReadableLong());
        $this->assertEquals('50 ft', $this->sut->getHumanReadableShort());
    }

    public function testGetValue()
    {
        $this->assertEquals(50, $this->sut->getValue());
        dump($this->sut->getValue(new StringType('ml')));
    }

    public function testSetDenominators()
    {
        $this->assertEquals(600, $this->sut->getValue(new StringType('in')));
        $this->assertEquals(50, $this->sut->getValue(new StringType('ft')));
        $this->assertEquals(16.666666666667, $this->sut->getValue(new StringType('yd')));
        $this->assertEquals(0.009469696969697, $this->sut->getValue(new StringType('ml')));
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
