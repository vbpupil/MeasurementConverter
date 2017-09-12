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

By creating a measurement unit object you immediately inherit the values of that 
conversion to your units counterparts. For example, by creating a **1 Inch Object**
you also have access to the **Feet**, **Yard** & **Mile** measurements off the bat

At the moment **ONLY** Linear units have been accounted for. 

### Usage Example
```php
//create a 50 foot object
$feet= new ImperialLinearUnit(new FloatType(50), new StringType('ft'));
dump($feet->getHumanReadableLong());

//convert that into millimeters
$converter = new LinearUnitsConverter($feet, new StringType('mm'));

//get the new millimeters object
$mm = $converter->get();
dump($mm->getHumanReadableLong());

//convert millemeters into inches
$converter = new LinearUnitsConverter($mm, new StringType('in'));

//get the inches object
$inch = $converter->get();
dump($inch->getHumanReadableLong());
```

