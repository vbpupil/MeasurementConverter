<?php
/**
 * CubicUnitTestt.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2017, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\tests;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use PHPUnit\Framework\TestCase;
use vbpupil\Cubic\CubicUnit;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\Metric\MetricLinearUnit;

class CubicUnitTest extends TestCase
{
    protected $sut;
    protected $width;
    protected $depth;
    protected $height;

    public function setUp()
    {
        $this->width = new MetricLinearUnit(new FloatType(1), new StringType('m'));
        $this->depth = new MetricLinearUnit(new FloatType(20), new StringType('cm'));
        $this->height = new MetricLinearUnit(new FloatType(1500), new StringType('mm'));

        $this->sut = new CubicUnit($this->width, $this->depth, $this->height);
    }

    /**
     * @expectedException \Exception
     */
    public function testMixedTypeException()
    {
        $this->height = new ImperialLinearUnit(new FloatType(1500), new StringType('in'));
        $this->assertEquals('Units must be of the same type ie Metric', $this->sut = new CubicUnit($this->width, $this->depth, $this->height));
    }

    public function testHumanReadable()
    {
        $this->assertEquals('300000 cm&sup3;', $this->sut->getHumanReadableLong(new StringType('cm')));
    }

    public function testGetValue()
    {
        $this->assertEquals('300000', $this->sut->getValue(new StringType('cm')));
    }
}
