<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Cubic\CubicUnit;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Metric\MetricLinearUnit;


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

$width = new MetricLinearUnit(new FloatType(1), new StringType('m'));
$depth = new MetricLinearUnit(new FloatType(20), new StringType('cm'));
$height = new MetricLinearUnit(new FloatType(1500), new StringType('mm'));


//$width = new MetricLinearUnit(new FloatType(10), new StringType('cm'));
//$depth = new MetricLinearUnit(new FloatType(20), new StringType('cm'));
//$height = new MetricLinearUnit(new FloatType(15), new StringType('cm'));

$cubic = new CubicUnit($width, $depth, $height);

dump($cubic);
dump($cubic->getValue(new StringType('mm')));
echo($cubic->getHumanReadableLong(new StringType('cm')));