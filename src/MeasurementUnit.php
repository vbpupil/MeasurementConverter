<?php
/**
 * Freetimers Web Application Framework
 *
 * @author    Dean Haines
 * @copyright Freetimers Communications Ltd, 21/08/2017, UK
 * @license   Proprietary See LICENSE.md
 */

namespace vbpupil;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;

interface MeasurementUnit
{
    public function __construct(FloatType $size, StringType $type);

    public function getValue(StringType $type);

    public function getHumanReadableLong(StringType $type);
          
    public function getHumanReadableShort(StringType $type);
    
}