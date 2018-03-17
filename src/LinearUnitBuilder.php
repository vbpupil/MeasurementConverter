<?php
/**
 * LinearUnitBuilder.php
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\LinearUnits\LinearDefinitions;
use vbpupil\Metric\MetricLinearUnit;

class LinearUnitBuilder
{

    /**
     * @param FloatType $size
     * @param StringType $type
     * @return ImperialLinearUnit|MetricLinearUnit
     * @throws \Exception
     */
    public static function build(FloatType $size, StringType $type)
    {
        try {
            $def = new LinearDefinitions();
            $def = $def->identifySystem($type);

            switch ($def){
                case 'metric':
                    return new MetricLinearUnit($size, $type);
                    break;
                case 'imperial':
                    return new ImperialLinearUnit($size, $type);
                    break;
            }
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }


    }
}