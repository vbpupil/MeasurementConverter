<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Conversion;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\LinearUnitBuilder;
use vbpupil\LinearUnits\LinearDefinitions;
use vbpupil\LinearUnits\LinearUnitInterface;

class Conversion
{

    protected $unit;

    protected $desiredMeasure;

    protected $desiredSystem;


    public function __construct(LinearUnitInterface $unit)
    {
        $this->unit = $unit;
    }

    public function into(StringType $type)
    {
        $this->desiredMeasure = strtolower($type->get());

        $converted = $this->preCheck();

        return $converted->getValue(new StringType($this->desiredMeasure));
    }

    /**
     * @return string|\vbpupil\Imperial\ImperialLinearUnit|\vbpupil\Metric\MetricLinearUnit
     */
    protected function preCheck()
    {
        //1. figure out what system the desired measurement is ie metric/imperial
        $linDef = new LinearDefinitions();

        try {
            $this->desiredSystem = $linDef->identifySystem($this->desiredMeasure);

            //2. if its the same system as the unit then just get the values we already have
            if ($this->desiredSystem == $this->unit->getType()) {
                return LinearUnitBuilder::build(new FloatType( $this->unit->getValue(new StringType($this->desiredMeasure))  ), new StringType( $this->desiredMeasure  ));
            }

            //3. we know its a diffent system if we get to here
            $key = key($this->unit->measurements);
            $measure = $this->unit->getValue(new StringType($key));

            echo "my unit is {$key} and my measure is {$measure}<br />";

            $newKey = current($linDef->getIdentifier()[$this->desiredSystem]);
            $newMeasure = current($linDef->getDefinitions()[$this->desiredSystem]);

            echo "my NEW unit is {$newKey} and my NEW measure is {$newMeasure}";

//            echo '<br />max: ' .max( array($measure, $newMeasure));
//            echo '<br />min: ' .min( array($measure, $newMeasure));
//            echo 'desired measure: '.$this->desiredMeasure;


            //this is converting metric to imperial
            if( $key == 'mm' && $newKey == 'in') {
                $dummy = LinearUnitBuilder::build(new FloatType(max(array($measure, $newMeasure)) / min(array($measure, $newMeasure))), new StringType($newKey));
                return LinearUnitBuilder::build(new FloatType(($dummy->getValue(new StringType($newKey)))), new StringType($newKey));
            }

            if( $key == 'in' && $newKey == 'mm') {
                $dummy = LinearUnitBuilder::build(new FloatType(max(array($measure, $newMeasure)) * min(array($measure, $newMeasure))), new StringType($newKey));
                return LinearUnitBuilder::build(new FloatType(($dummy->getValue(new StringType($newKey)))), new StringType($newKey));
            }





        }catch (\Exception $e){
            //we havent been able to identify the measurement... abort
            return $e->getMessage();
        }

    }
}