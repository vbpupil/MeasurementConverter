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
    /**
     * @var
     */
    protected $targetType;

    public function __construct(LinearUnit $src, StringType $target)
    {
        parent::__construct();

        $this->src = $src;
        //todo we need to validate that the target type exists
        $this->targetType =$target;
        $this->target = $this->convert($target);
    }

    /**
     * @param StringType $target
     * @return ImperialLinearUnit|LinearUnit|MetricLinearUnit
     */
    public function convert(StringType $target)
    {
        switch ($this->identify($target)) {
            case 'metric':
                if($this->src->getType() == 'metric'){
                    return $this->src;
                }

                return new MetricLinearUnit(
                        new FloatType(
                                $this->src->getValue(new StringType('in')) * $this->definitions['imperial']['mm']
                            ), new StringType(
                                $this->targetType
                            )
                    );
                break;
            case 'imperial':
                if($this->src->getType() == 'imperial') {
                    return $this->src;
                }
                return new ImperialLinearUnit(
                    new FloatType(
                        $this->src->getValue(new StringType('mm')) / $this->definitions['metric']['in']
                    ), new StringType(
                        $this->targetType
                    )
                );
                break;
        }
    }

    /**
     * Identify who the target identifyer belongs to ie imperial or metric
     * @param StringType $target
     */
    public function identify(StringType $target)
    {
        foreach ($this->identifier as $k => $v) {
            if (in_array($target->get(), $v)) {
                return $k;
            }
        }
    }

    public function get()
    {
        return $this->target;
    }
}