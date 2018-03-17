<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Cubic\CubicUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Weight\WeightTonnageDensityConverter;

include_once 'vendor/autoload.php';

$feet = LinearUnitBuilder::build(new FloatType(18), new StringType('ft'));
dump($feet->getHumanReadableLong());
$converter = new LinearUnitsConverter($feet, new StringType('mm'));

$mm = $converter->get();
dump($mm->getHumanReadableLong());

$converter = new LinearUnitsConverter($mm, new StringType('in'));

$inch = $converter->get();
dump($inch->getHumanReadableLong());