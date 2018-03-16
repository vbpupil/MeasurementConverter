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

At the moment **ONLY** Linear & Cubic units have been accounted for. 

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

### Cubic Example
**1. create a width, depth & height object and pass these into the cubic constructor**
```php
$width = LinearUnitBuilder::build(new FloatType(18), new StringType('m'));
$depth = LinearUnitBuilder::build(new FloatType(42), new StringType('m'));
$height = LinearUnitBuilder::build(new FloatType(3), new StringType('cm'));

$cubic = new CubicUnit($width, $depth, $height);
dump($cubic->getValue(new StringType('mm')));
```

### Weight Example
**1. to convert the cubic measurement into a weight simply pass in the SUPPORTED matrial name & cubic object**
```php
$tonnage = new WeightTonnageDensityConverter('soil', $cubic);

dump($cubic);
dump($tonnage->getValue());
```


### Supported Weight Densities

|Material|
| ------------- |
|air|
|alcohol|
|antifreeze|
|asphalt|
|azote|
|beer|
|brass|
|bronze|
|butter|
|cadmium|
|caprolon|
|cast_iron|
|cement|
|concrete|
|copper|
|diesel|
|fiberglass|
|fluoroplast|
|garbage|
|glass|
|gold|
|ground|
|ice|
|indium|
|kerosene|
|lead|
|methane|
|milk|
|oil|
|oxygen|
|paint|
|paladius|
|paper|
|petrol|
|platinum|
|polyamide|
|polycarbonate|
|polyethylene|
|polypropylene|
|polystyrene|
|polyvinyl_chloride|
|propane|
|rubber|
|sand|
|silver|
|soil|
|steel|
|steel|
|stone|
|tin|
|tungsten|
|viniplast|
|water|
|wood_birch|
|wood_bud|
|wood_cork|
|wood_larch|
|wood_linden|
|wood_pine|
|wood_spruce|
|zinc|
|porcelain|
|liquid_hydrogen|
|ether|
|gasoline|
|kerosene|
|diesel|
|acetone|
|methyl_alcohol|
|oil|
|sunflower oil|
|olive_oil|
|water|
|sea_water|
|glycerin|
|sulfuric_acid|
|mercury|
|sand|
|crushed stone|
|asphalt|
|gravel|
|concrete solution|
|slag|
|clay|
|snow|
|nitrogen|
|ammonia|
|argon|
|acetylene|
|hydrogen|
|air|
|helium|
|nitrous_oxide|
|oxygen|
|krypton|
|xenon|
|methane|
|neon|
|ozone|
|nitric_oxide|
|propane|
|radon|
|trimethylamine|
|carbon_dioxide|
|carbon_monoxide|
|carbon_dioxide|
|phosphorous_fluoride|
|fluorine|
|nitrogen_fluoride|
|chlorine|
|dioxide_of_chlorine|
|chlorine_oxide|
|ethane|
