#Measurement Converter
A simple but effective measurement converter which allows you to 
quickly create measurement objects that can be converted into other 
measurement formats quickly and easily.

###Usage Example
```php
$imperial = new ImperialLinearUnit(new FloatType(1), new StringType('in'));

$conv = new LinearUnitsConverter($imperial, new StringType('mm'));
```

