## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-blue.svg)
[![Build Status](https://travis-ci.org/vbpupil/MeasurementConverter.svg?branch=master)](https://travis-ci.org/vbpupil/MeasurementConverter)
[![Code Climate](https://codeclimate.com/github/vbpupil/MeasurementConverter/badges/gpa.svg)](https://codeclimate.com/github/vbpupil/MeasurementConverter)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

# Measurement Converter
A simple but effective measurement converter which allows you to 
quickly create measurement objects that can be easily converted into other 
measurement formats, for example converting an Imperial measurement into Metric.

Currently this package supports the following:
1. Metric Linears
2. Imperial Linears
3. Metric Cubic
4. Imperial Cubic
5. Weights Conversion
    * Tonne
    * US Ton
    * Imperial Ton

By creating a linear measurement unit object you immediately inherit the values of that 
conversion to your units counterparts. For example, by creating a **1 Inch Object**
you also have access to the **Feet**, **Yard** & **Mile** measurements off the bat

#### Supported Units
|Type|Unit|Identified|
|----|----|----|
|Linear Metric|||
||Millemeter|mm|
||Centimeter|cm|
||Meter|m|
||Kilometer|km|
|Linear Imperial|||
||Inch|in|
||Feet|ft|
||Yard|yd|
||Mile|ml|
|Weight|||
||Tonne||
||US Ton||
||Imperial Ton||

### Usage Examples

#### Metric Example

**1. create a 50 foot object**
```php
$feet= LinearUnitBuilder::build(new FloatType(18), new StringType('ft'));
dump($feet->getHumanReadableLong());
```

**2. convert that into millimeters**

```php
$converter = new LinearUnitsConverter($feet, new StringType('mm'));
```

**3. get the new millimeters object**
```php
$mm = $converter->get();
dump($mm->getHumanReadableLong());
```

**4. convert millemeters into inches & get the inches object**
```php
$converter = new LinearUnitsConverter($mm, new StringType('in'));
$inch = $converter->get();
dump($inch->getHumanReadableLong());
```

#### Cubic Example
**1. create a width, depth & height object and pass these into the cubic constructor**
```php
$width = LinearUnitBuilder::build(new FloatType(18), new StringType('m'));
$depth = LinearUnitBuilder::build(new FloatType(42), new StringType('m'));
$height = LinearUnitBuilder::build(new FloatType(3), new StringType('cm'));

$cubic = new CubicUnit($width, $depth, $height);
dump($cubic->getValue(new StringType('mm')));
```

#### Weight Example
**1. to convert the cubic measurement into a weight simply pass in the SUPPORTED matrial name & cubic object**
```php
$tonnage = new WeightTonnageDensityConverter('soil', $cubic);

dump($cubic);
dump($tonnage->getValue());
```


#### Supported Weight Materials & Densities

|Material|Density, kg/m3|
| ------------- | ------------- |
|air | 1.928|
|alcohol | 789|
|antifreeze | 1112|
|asphalt | 1100|
|azote | 1.251|
|beer | 1041|
|brass | 8500|
|bronze | 8600|
|butter | 920|
|cadmium | 8640|
|caprolon | 1150|
|cast_iron | 7300|
|cement | 2900|
|concrete | 2400|
|copper | 8900|
|diesel | 860|
|fiberglass | 1900|
|fluoroplast | 1400|
|garbage | 250|
|glass | 2500|
|gold | 19300|
|ground | 1800|
|ice | 917|
|indium | 7300|
|kerosene | 810|
|lead | 11400|
|methane | 0.6682|
|milk | 1030|
|oil | 850|
|oxygen | 1.429|
|paint | 1300|
|paladius | 12160|
|paper | 950|
|petrol | 750|
|platinum | 21450|
|polyamide | 1150|
|polycarbonate | 1200|
|polyethylene | 960|
|polypropylene | 900|
|polystyrene | 1050|
|polyvinyl_chloride | 1400|
|propane | 1.864|
|rubber | 1050|
|sand | 1800|
|silver | 11500|
|soil | 1800|
|steel | 7800|
|steel | 7800|
|stone | 2200|
|tin | 7300|
|tungsten | 19300|
|viniplast | 1450|
|water | 1000|
|wood_birch | 650|
|wood_bud | 690|
|wood_cork | 480|
|wood_larch | 660|
|wood_linden | 530|
|wood_pine | 520|
|wood_spruce | 450|
|zinc | 7130|
|porcelain | 2300|
|liquid_hydrogen | 70|
|ether | 740|
|gasoline | 750|
|kerosene | 810|
|diesel | 845|
|acetone | 795|
|methyl_alcohol | 810|
|oil | 870|
|sunflower oil | 915|
|olive_oil | 920|
|water | 1000|
|sea_water | 1025|
|glycerin | 1260|
|sulfuric_acid | 1840|
|mercury | 13600|
|sand | 1675|
|crushed stone | 1350|
|asphalt | 1060|
|gravel | 1550|
|concrete solution | 2100|
|slag | 3550|
|clay | 1750|
|snow | 200|
|nitrogen | 1251|
|ammonia | 0.7714|
|argon | 1.7839|
|acetylene | 1.1709|
|hydrogen | 0.08987|
|air | 1.2928|
|helium | 0.1785|
|nitrous_oxide | 1978|
|oxygen | 1429|
|krypton | 3.74|
|xenon | 5.89|
|methane | 0.7168|
|neon | 0.8999|
|ozone | 2.22|
|nitric_oxide | 1.3402|
|propane | 2.0037|
|radon | 9.73|
|trimethylamine | 2.58|
|carbon_dioxide | 1.9768|
|carbon_monoxide | 1.25|
|carbon_dioxide | 2.72|
|phosphorous_fluoride | 3907|
|fluorine | 1695|
|nitrogen_fluoride | 2.9|
|chlorine | 3.22|
|dioxide_of_chlorine | 3.09|
|chlorine_oxide | 3.89|
|ethane | 1356|