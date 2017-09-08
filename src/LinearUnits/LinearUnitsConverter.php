<?php
/**
 * Created by PhpStorm.
 * User: dean
 * Date: 22/08/17
 * Time: 18:07
 */

namespace vbpupil\LinearUnits;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\Metric\MetricLinearUnit;

class LinearUnitsConverter extends LinearDefinitions
{

    /**
     * @var LinearUnit
     */
    protected $src;

    /**
     * @var ImperialLinearUnit|MetricLinearUnit
     */
    protected $target;

    public function __construct(LinearUnit $src, StringType $convertTo)
    {
        parent::__construct();

        $this->src = $src;
        $this->target = $this->convert($convertTo);
    }

    public function convert(StringType $convertTo)
    {
        switch ($this->identify($convertTo)) {
            case 'metric':
                if($this->src->getType() == 'metric'){
                    return $this->src;
                }

                return new MetricLinearUnit(new FloatType(1), new StringType('mm'));

                break;
            case 'imperial':
                if($this->src->getType() == 'linear') {
                    return $this->src;
                }

                return new ImperialLinearUnit(new FloatType(1), new StringType('in'));

                break;
        }
    }

    /**
     * Identify who the convert to identifyer belongs to ie imperial or metric
     * @param StringType $convertTo
     */
    public function identify(StringType $convertTo)
    {
        foreach ($this->identifier as $k => $v) {
            if (in_array($convertTo->get(), $v)) {
                return $k;
            }
        }
    }

    public function get()
    {
        return $this->target;
    }
}