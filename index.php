<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnits;
use vbpupil\Metric\MetricLinearUnits;


include_once 'vendor/autoload.php';

$metric = new MetricLinearUnits(new FloatType(5), new StringType('MILlimeter'));
dump($metric);
dump($metric->getHumanReadableLong(new StringType('cm')));


$imperial = new ImperialLinearUnits(new FloatType(5), new StringType('in'));
dump($imperial);
dump($imperial->getHumanReadableLong(new StringType('ft')));