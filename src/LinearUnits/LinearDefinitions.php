<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */
namespace vbpupil\LinearUnits;

/**
 * Class LinearDefinitions
 */
class LinearDefinitions
{
    /**
     * @var array
     */
    protected $identifier;
    /**
     * @var array
     */
    protected $definitions = [];

    /**
     * LinearDefinitions constructor.
     */
    public function __construct()
    {
        $this->identifier = [
            'metric' => ['mm', 'cm', 'm', 'km', 'millimeter', 'centimeter', 'metre', 'kilometer'],
            'imperial' => ['in', 'ft', 'yd', 'ml', 'inch', 'foot', 'yard', 'mile']
        ];

        $this->definitions = [
            'imperial' => [
                'mm' => 25.4
            ],
            'metric' => [
                'in' => 25.4
            ]

        ];
    }
}