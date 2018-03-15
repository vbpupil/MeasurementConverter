<?php
/**
 * TonneConverter.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Weight;

use Chippyash\Type\String\StringType;
use Exception;
use vbpupil\Cubic\CubicUnit;

class WeightTonnageDensityConverter
{
    /**
     * https://vodoprovod.blogspot.co.uk/2017/11/table-of-substance-density.html
     * @var array
     */
    protected $density = array(
        'asphalt' => 1100,
        'ground' => 1800,
        'garbage' => 250,
        'stone' => 2200,
        'sand' => 1800,
        'steel' => 7800,
        'oxygen' => 1.429,
        'azote' => 1.251,
        'beer' => 1041,
        'concrete' => 2400,
        'ice' => 917,
        'antifreeze' => 1112,
        'alcohol' => 789,
        'paint' => 1300,
        'methane' => 0.6682,
        'propane' => 1.864,
        'diesel' => 860,
        'milk' => 1030,
        'oil' => 850,
        'kerosene' => 810,
        'petrol' => 750,
        'air' => 1, .928,
        'butter' => 920,
        'water' => 1000,
        'soil' => 1800
    );

    /**
     * @var
     */
    protected $material;

    protected $cubicM;

    public function __construct($material, CubicUnit $cubicM)
    {
        $this->setMaterial($material);
        $this->cubicM = $cubicM;
    }

    public function getValue()
    {
        return $this->calculate();
    }

    /**
     * @return float|int
     */
    protected function calculate()
    {
        $d = $this->density[$this->material] / 1000 * $this->cubicM->getValue(new StringType('m'));
        return $d;
    }

    /**
     * @param $material
     * @return bool
     * @throws Exception
     */
    public function setMaterial($material)
    {
        if (isset($material) && $material != '') {
            $material = strtolower($material);

            if (!array_key_exists($material, $this->density)) {
                throw new Exception('invalid material.');
            }

            $this->material = $material;
            return true;
        }
    }
}