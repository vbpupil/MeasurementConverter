<?php
/**
 * Test.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\tests;

use PHPUnit\Framework\TestCase;
use vbpupil\Cubic\CubicUnit;
use vbpupil\Weight\WeightTonnageDensityConverter;
use WeightTonnageDensityConverterTest;

class Test extends TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new WeightTonnageDensityConverter('soil', new CubicUnit());
    }
}
