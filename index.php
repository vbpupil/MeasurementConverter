<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Metric\MetricLinearUnit;


include_once 'vendor/autoload.php';

//$metric = new MetricLinearUnit(new FloatType(5), new StringType('MILlimeter'));
//dump($metric);
//dump($metric->getHumanReadableLong(new StringType('cm')));


$inch = new ImperialLinearUnit(new FloatType(50), new StringType('in'));

dump($inch);


$converter = new LinearUnitsConverter($inch, new StringType('in'));
$mm = $converter->get();

dump($mm);