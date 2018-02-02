<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */
namespace vbpupil\LinearUnits;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\Metric\MetricLinearUnit;

/**
 * Class LinearUnitsConverter
 */
class LinearUnitsConverter extends LinearDefinitions
{

    /**
     * @var LinearUnitInterface
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

    /**
     * LinearUnitsConverter constructor.
     * @param LinearUnitInterface $src
     * @param StringType $target
     */
    public function __construct(LinearUnitInterface $src, StringType $target)
    {
        parent::__construct();

        $this->src = $src;
        //todo we need to validate that the target type exists
        $this->targetType =$target;
        $this->target = $this->convert($target);
    }

    /**
     * @param StringType $target
     * @return ImperialLinearUnit|LinearUnitInterface|MetricLinearUnit
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
     * Identify who the target identifier belongs to ie imperial or metric
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

    /**
     * @return ImperialLinearUnit|LinearUnitInterface|MetricLinearUnit
     */
    public function get()
    {
        return $this->target;
    }
}