<?php
/**
 * Freetimers Web Application Framework
 *
 * @author    Dean Haines
 * @copyright Freetimers Communications Ltd, 21/08/2017, UK
 * @license   Proprietary See LICENSE.md
 */

namespace vbpupil\Metric;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\Number\IntType;
use Chippyash\Type\String\StringType;
use vbpupil\LinearUnits\LinearUnits;

class MetricLinearUnits extends LinearUnits
{
    /**
     * MetricLinearUnits constructor.
     * @param FloatType $size
     * @param StringType $type
     */
    public function __construct(FloatType $size, StringType $type)
    {
        $this->definitions = [
            'mm' => ['description' => new StringType('millimeter'), 'ratio' => new IntType(1)],
            'cm' => ['description' => new StringType('centimeter'), 'ratio' => new IntType(10)],
            'dm' => ['description' => new StringType('decimeter'), 'ratio' => new IntType(100)],
            'm' => ['description' => new StringType('metre'), 'ratio' => new IntType(1000)],
            'km' => ['description' => new StringType('kilometer'), 'ratio' => new IntType(1000000)]
        ];

        $type = $this->definitionCheck($type);

        $this->type = $type;
        $this->size = $size;

        $this->setValues();
    }
}