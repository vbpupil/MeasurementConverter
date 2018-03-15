<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Cubic\CubicUnit;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Metric\MetricLinearUnit;
use vbpupil\Weight\WeightTonnageDensityConverter;


include_once 'vendor/autoload.php';

//$feet= new ImperialLinearUnit(new FloatType(50), new StringType('ft'));
//dump($feet->getHumanReadableLong());
//
//$converter = new LinearUnitsConverter($feet, new StringType('mm'));
//
//$mm = $converter->get();
//dump($mm->getHumanReadableLong());
//
//$converter = new LinearUnitsConverter($mm, new StringType('in'));
//
//$inch = $converter->get();
//dump($inch->getHumanReadableLong());

$width = new MetricLinearUnit(new FloatType(18), new StringType('m'));
$depth = new MetricLinearUnit(new FloatType(42), new StringType('m'));
$height = new MetricLinearUnit(new FloatType(3), new StringType('cm'));


//$width = new MetricLinearUnit(new FloatType(10), new StringType('cm'));
//$depth = new MetricLinearUnit(new FloatType(20), new StringType('cm'));
//$height = new MetricLinearUnit(new FloatType(15), new StringType('cm'));

$cubic = new CubicUnit($width, $depth, $height);

$tonnage = new WeightTonnageDensityConverter('soil', $cubic);

dump($cubic);
dump($tonnage->getValue());