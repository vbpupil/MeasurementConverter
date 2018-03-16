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

/**
 * Class WeightTonnageDensityConverter
 */
class WeightTonnageDensityConverter
{
    /**
     * @var array
     */
    protected $density = array(
        'air' => 1.928,
        'alcohol' => 789,
        'antifreeze' => 1112,
        'asphalt' => 1100,
        'azote' => 1.251,
        'beer' => 1041,
        'brass' => 8500,
        'bronze' => 8600,
        'butter' => 920,
        'cadmium' => 8640,
        'caprolon' => 1150,
        'cast_iron' => 7300,
        'cement' => 2900,
        'concrete' => 2400,
        'copper' => 8900,
        'diesel' => 860,
        'fiberglass' => 1900,
        'fluoroplast' => 1400,
        'garbage' => 250,
        'glass' => 2500,
        'gold' => 19300,
        'ground' => 1800,
        'ice' => 917,
        'indium' => 7300,
        'kerosene' => 810,
        'lead' => 11400,
        'methane' => 0.6682,
        'milk' => 1030,
        'oil' => 850,
        'oxygen' => 1.429,
        'paint' => 1300,
        'paladius' => 12160,
        'paper' => 950,
        'petrol' => 750,
        'platinum' => 21450,
        'polyamide' => 1150,
        'polycarbonate' => 1200,
        'polyethylene' => 960,
        'polypropylene' => 900,
        'polystyrene' => 1050,
        'polyvinyl_chloride' => 1400,
        'propane' => 1.864,
        'rubber' => 1050,
        'sand' => 1800,
        'silver' => 11500,
        'soil' => 1800,
        'steel' => 7800,
        'steel' => 7800,
        'stone' => 2200,
        'tin' => 7300,
        'tungsten' => 19300,
        'viniplast' => 1450,
        'water' => 1000,
        'wood_birch' => 650,
        'wood_bud' => 690,
        'wood_cork' => 480,
        'wood._larch' => 660,
        'wood_linden' => 530,
        'wood_pine' => 520,
        'wood_spruce' => 450,
        'zinc' => 7130,
        'porcelain' => 2300,
        'liquid_hydrogen' => 70,
        'ether' => 740,
        'gasoline' => 750,
        'kerosene' => 810,
        'diesel' => 845,
        'acetone' => 795,
        'methyl_alcohol' => 810,
        'oil' => 870,
        'sunflower oil' => 915,
        'olive_oil' => 920,
        'water' => 1000,
        'sea_water' => 1025,
        'glycerin' => 1260,
        'sulfuric_acid' => 1840,
        'mercury' => 13600,
        'sand' => 1675,
        'crushed stone' => 1350,
        'asphalt' => 1060,
        'gravel' => 1550,
        'concrete solution' => 2100,
        'slag' => 3550,
        'clay' => 1750,
        'snow' => 200,
        'nitrogen' => 1251,
        'ammonia' => 0.7714,
        'argon' => 1.7839,
        'acetylene' => 1.1709,
        'hydrogen' => 0.08987,
        'air' => 1.2928,
        'helium' => 0.1785,
        'nitrous_oxide' => 1978,
        'oxygen' => 1429,
        'krypton' => 3.74,
        'xenon' => 5.89,
        'methane' => 0.7168,
        'neon' => 0.8999,
        'ozone' => 2.22,
        'nitric_oxide' => 1.3402,
        'propane' => 2.0037,
        'radon' => 9.73,
        'trimethylamine' => 2.58,
        'carbon_dioxide' => 1.9768,
        'carbon_monoxide' => 1.25,
        'carbon_dioxide' => 2.72,
        'phosphorous_fluoride' => 3907,
        'fluorine' => 1695,
        'nitrogen_fluoride' => 2.9,
        'chlorine' => 3.22,
        'dioxide_of_chlorine' => 3.09,
        'chlorine_oxide' => 3.89,
        'ethane' => 1356,
    );

    /**
     * @var
     */
    protected $material;

    /**
     * @var CubicUnit
     */
    protected $cubicM;


    /**
     * WeightTonnageDensityConverter constructor.
     * @param $material
     * @param CubicUnit $cubicM
     * @throws Exception
     */
    public function __construct($material, CubicUnit $cubicM)
    {
        $this->setMaterial($material);
        $this->cubicM = $cubicM;
    }

    /**
     * @return float|int
     * @throws Exception
     */
    public function getValue()
    {
        return $this->calculate();
    }

    /**
     * @return array
     */
    protected function calculate()
    {
        if (isset($this->density[$this->material])) {
            $results = [];
            $results['tonne'] = $this->density[$this->material] / 1000 * $this->cubicM->getValue(new StringType('m'));
            $results['us_ton'] = $results['tonne'] * 1.10231;
            $results['imperial_ton'] = $results['tonne'] * 0.984207;

            return $results;
        }
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
                throw new Exception("Unsupported material: {$material}");
            }

            $this->material = $material;
            return true;
        }
    }
}