<?php
/**
 * Created by PhpStorm.
 * User: dean
 * Date: 22/08/17
 * Time: 18:07
 */

namespace vbpupil\LinearUnits;


use Chippyash\Type\Number\FloatType;
use Chippyash\Type\String\StringType;
use vbpupil\Imperial\ImperialLinearUnit;
use vbpupil\Metric\MetricLinearUnit;

class LinearUnitsConverter
{
    protected $identifier;
    /**
     * @var
     */
    protected $src;
    /**
     * @var array
     */
    protected $definitions = [];

    public function __construct(LinearUnit $src, StringType $convertTo)
    {
        $this->definitions = [
                'linear' => [
                    'imperial' => [
                        'mm' => 25.4
                    ],
                    'metric' => [
                        'in' => 25.4
                    ]
                ]
            ];

        $this->identifier = [
            'metric' => ['mm','cm','m','km','millimeter','centimeter','metre','kilometer'],
            'imperial' => ['in','ft','yd','ml','inch','foot','yard','mile']
        ];

        $this->src = $src;
        $this->target = $this->convert($convertTo);

        dump ($this->target);
    }

    public function convert(StringType $convertTo)
    {
        switch($this->identify($convertTo)){
            case 'metric':
                return new MetricLinearUnit(new FloatType(1), new StringType('mm'));
                break;
            case 'imperial':
                return new ImperialLinearUnit(new FloatType(1), new StringType('in'));
                break;
        }
    }

    /**
     * Identify who the convert to identifyer belongs to ie imperial or metric
     * @param StringType $convertTo
     */
    public function identify(StringType $convertTo)
    {
        foreach ($this->identifier as $k => $v){
                if(in_array($convertTo->get(),$v)){
                    return $k;
                }
        }
    }
}