<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Metric\MetricLinearUnit;


include_once 'vendor/autoload.php';

$feet= new ImperialLinearUnit(new FloatType(50), new StringType('ft'));
dump($feet->getHumanReadableLong());

$converter = new LinearUnitsConverter($feet, new StringType('mm'));

$mm = $converter->get();
dump($mm->getHumanReadableLong());

$converter = new LinearUnitsConverter($mm, new StringType('in'));

$inch = $converter->get();
dump($inch->getHumanReadableLong());
