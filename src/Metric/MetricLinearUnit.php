<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Metric;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\Number\IntType;
use Chippyash\Type\String\StringType;
use vbpupil\LinearUnits\LinearUnitInterface;

/**
 * Class MetricLinearUnit
 */
class MetricLinearUnit extends LinearUnitInterface
{
    /**
     *
     */
    const MEASURETYPE = 'linear';

    /**
     *
     */
    const METRICTYPE = 'metric';

    /**
     * MetricLinearUnits constructor.
     * @param FloatType $size
     * @param StringType $type
     * @throws \Exception
     */
    public function __construct(FloatType $size, StringType $type)
    {
        $this->definitions = [
            'mm' => ['description' => new StringType('millimeter'), 'ratio' => new IntType(1), 'plural' => [new StringType('millimeter'), new StringType('millimeters')]],
            'cm' => ['description' => new StringType('centimeter'), 'ratio' => new IntType(10), 'plural' => [new StringType('centimeter'), new StringType('centimeters')]],
            'dm' => ['description' => new StringType('decimeter'), 'ratio' => new IntType(100), 'plural' => [new StringType('decimeter'), new StringType('decimeters')]],
            'm' => ['description' => new StringType('metre'), 'ratio' => new IntType(1000), 'plural' => [new StringType('metre'), new StringType('metres')]],
            'km' => ['description' => new StringType('kilometer'), 'ratio' => new IntType(1000000), 'plural' => [new StringType('kilometer'), new StringType('kilometers')]]
        ];

        $type = $this->definitionCheck($type);

        $this->metricType = 'metric';
        $this->originalType = $type;
        $this->type = $type;
        $this->size = $size;

        $this->setValues();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return self::METRICTYPE;
    }
}