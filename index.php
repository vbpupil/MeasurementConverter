<?php

namespace vbpupil;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Conversion\Conversion;
use vbpupil\Cubic\CubicUnit;
use vbpupil\LinearUnits\LinearUnitsConverter;
use vbpupil\Weight\WeightTonnageDensityConverter;

include_once 'vendor/autoload.php';


$w = LinearUnitBuilder::build(new FloatType(10), new StringType('yd'));
$l = LinearUnitBuilder::build(new FloatType(10), new StringType('yd'));
$d = LinearUnitBuilder::build(new FloatType(2), new StringType('in'));


$l = LinearUnitBuilder::build(
    new FloatType((new Conversion($l))->into(
        new StringType('cm')
    )),
    new StringType(
        'cm'
    ));

$w = LinearUnitBuilder::build(
    new FloatType((new Conversion($w))->into(
        new StringType('cm')
    )),
    new StringType(
        'cm'
    ));


$d = LinearUnitBuilder::build(
    new FloatType((new Conversion($d))->into(
        new StringType('cm')
    )),
    new StringType(
        'cm'
    ));

//dump((new Conversion($dd))->into(
//    new StringType('cm')
//));
////dump($d);
//die;

//
//dump($w);
//dump($l);
//dump($d);

//dump($d);

//$convert = new Conversion($d);
//
//dump((new Conversion($d))->into(
//    new StringType('cm')
//));


//$r = $convert->into(new StringType('cm'));
//dump($r);
//echo $r->getHumanReadableLong();


$cubic = new CubicUnit($w, $l, $d);
$result = new WeightTonnageDensityConverter('soil', $cubic);
$tonnage = $result->getValue();

dump($cubic);
dump($result);
dump($tonnage);
