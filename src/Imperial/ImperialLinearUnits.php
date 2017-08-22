<?php
/**
 * Freetimers Web Application Framework
 *
 * @author    Dean Haines
 * @copyright Freetimers Communications Ltd, 21/08/2017, UK
 * @license   Proprietary See LICENSE.md
 */

namespace vbpupil\Imperial;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\Number\IntType;
use Chippyash\Type\String\StringType;
use vbpupil\LinearUnits\LinearUnits;

class ImperialLinearUnits extends LinearUnits
{
    /**
     * ImperialLinearUnits constructor.
     * @param FloatType $size
     * @param StringType $type
     */
    public function __construct(FloatType $size, StringType $type)
    {
        $this->definitions = [
            'in' => ['description' => new StringType('inch'), 'ratio' => new IntType(1)],
            'ft' => ['description' => new StringType('foot'), 'ratio' => new IntType(12)],
            'yd' => ['description' => new StringType('yard'), 'ratio' => new IntType(36)],
            'ml' => ['description' => new StringType('mile'), 'ratio' => new IntType(63360)]
        ];

        $this->type = $type;
        $this->size = $size;

        $this->setValues();
    }
}