# Measurement Converter
A simple but effective measurement converter which allows you to 
quickly create measurement objects that can be converted into other 
measurement formats quickly and easily.

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

