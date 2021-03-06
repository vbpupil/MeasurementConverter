<?php
/**
 * Imperial Linear Unit
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */
namespace vbpupil\Imperial;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\Number\IntType;
use Chippyash\Type\String\StringType;
use vbpupil\LinearUnits\LinearUnitInterface;

/**
 * Class ImperialLinearUnit
 */
class ImperialLinearUnit extends LinearUnitInterface
{
    /**
     *
     */
    const MEASURETYPE = 'linear';

    /**
     *
     */
    const METRICTYPE = 'imperial';

    /**
     * ImperialLinearUnits constructor.
     * @param FloatType $size
     * @param StringType $type
     * @throws \Exception
     */
    public function __construct(FloatType $size, StringType $type)
    {
        $this->definitions = [
            'in' => ['description' => new StringType('inch'), 'ratio' => new IntType(1), 'plural' => [new StringType('inch'), new StringType('inches')]],
            'ft' => ['description' => new StringType('foot'), 'ratio' => new IntType(12), 'plural' => [new StringType('foot'), new StringType('feet')]],
            'yd' => ['description' => new StringType('yard'), 'ratio' => new IntType(36), 'plural' => [new StringType('yard'), new StringType('yards')]],
            'ml' => ['description' => new StringType('mile'), 'ratio' => new IntType(63360), 'plural' => [new StringType('mile'), new StringType('mile')]]
        ];

        $type = $this->definitionCheck($type);

        $this->metricType = 'imperial';
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