<?php


namespace vbpupil;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;

/**
 * Interface MeasurementUnit
 * @package vbpupil
 */
interface MeasurementUnit
{
    /**
     * MeasurementUnit constructor.
     * @param FloatType $size
     * @param StringType $type
     */
    public function __construct(FloatType $size, StringType $type);

    /**
     * @param StringType $type
     * @return mixed
     */
    public function getValue(StringType $type);

    /**
     * @param StringType $type
     * @return mixed
     */
    public function getHumanReadableLong(StringType $type);

    /**
     * @param StringType $type
     * @return mixed
     */
    public function getHumanReadableShort(StringType $type);
    
}