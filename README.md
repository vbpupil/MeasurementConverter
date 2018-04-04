## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-blue.svg)
[![Build Status](https://travis-ci.org/vbpupil/measurement-converter.svg?branch=master)](https://travis-ci.org/vbpupil/measurement-converter)
[![Code Climate](https://codeclimate.com/github/vbpupil/MeasurementConverter/badges/gpa.svg)](https://travis-ci.org/vbpupil/measurement-converter)
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

**2. you can also supply your own density measurement, which will be added to the density array as `custom`**
```php
$tonnage = new WeightTonnageDensityConverter(1.2, $cubic);

dump($cubic);
dump($tonnage->getValue());
```

#### Simple Conversion Example
**1. start by creating a simple 20 foot Imperial LinearUnit object**
```php
$length = LinearUnitBuilder::build(new FloatType(20), new StringType('ft'));
```

**2. then convert this into a cm Metric LinearUnit object**

```php
$length = LinearUnitBuilder::build(
                    new FloatType((new Conversion($l))->into(
                        new StringType('cm')
                    )),
                    new StringType(
                        'cm'
                    ));
```

#### Supported Materials & Densities

|Material|Density, kg/m3|
| ------------- | ------------- |
| acetone | 795 |
| acetylene | 1.1709 |
| air | 1.928 |
| alcohol | 789 |
| ammonia | 0.7714 |
| antifreeze | 1112 |
| argon | 1.7839 |
| asphalt | 1100 |
| azote | 1.251 |
| beer | 1041 |
| brass | 8500 |
| bronze | 8600 |
| butter | 920 |
| cadmium | 8640 |
| caprolon | 1150 |
| carbon_monoxide | 1.25 |
| cast_iron | 7300 |
| cement | 2900 |
| chlorine_oxide | 3.89 |
| chlorine | 3.22 |
| clay | 1750 |
| concrete | 2400 |
| concrete_solution | 2100 |
| copper | 8900 |
| crushed_stone | 1350 |
| diesel | 860 |
| dioxide_of_chlorine | 3.09 |
| ethane | 1356 |
| ether | 740 |
| fiberglass | 1900 |
| fluorine | 1695 |
| fluoroplast | 1400 |
| garbage | 250 |
| gasoline | 750 |
| glass | 2500 |
| glycerin | 1260 |
| gold | 19300 |
| gravel | 1550 |
| ground | 1800 |
| helium | 0.1785 |
| hydrogen | 0.08987 |
| ice | 917 |
| indium | 7300 |
| kerosene | 810 |
| krypton | 3.74 |
| lead | 11400 |
| liquid_hydrogen | 70 |
| mercury | 13600 |
| methane | 0.6682 |
| methyl_alcohol | 810 |
| milk | 1030 |
| neon | 0.8999 |
| nitrous_oxide | 1978 |
| nitrogen | 1251 |
| nitrogen_fluoride | 2.9 |
| nitric_oxide | 1.3402 |
| oil | 850 |
| olive_oil | 920 |
| oxygen | 1.429 |
| ozone | 2.22 |
| paint | 1300 |
| paladius | 12160 |
| paper | 950 |
| petrol | 750 |
| phosphorous_fluoride | 3907 |
| platinum | 21450 |
| polyamide | 1150 |
| polycarbonate | 1200 |
| polyethylene | 960 |
| polypropylene | 900 |
| polystyrene | 1050 |
| polyvinyl_chloride | 1400 |
| porcelain | 2300 |
| propane | 1.864 |
| radon | 9.73 |
| rubber | 1050 |
| sand | 1800 |
| sea_water | 1025 |
| silver | 11500 |
| slag | 3550 |
| snow | 200 |
| soil | 1800 |
| steel | 7800 |
| stone | 2200 |
| sunflower oil | 915 |
| sulfuric_acid | 1840 |
| tin | 7300 |
| trimethylamine | 2.58 |
| tungsten | 19300 |
| viniplast | 1450 |
| water | 1000 |
| wood_birch | 650 |
| wood_bud | 690 |
| wood_cork | 480 |
| wood_larch | 660 |
| wood_linden | 530 |
| wood_pine | 520 |
| wood_spruce | 450 |
| xenon | 5.89 |
| zinc | 7130 |