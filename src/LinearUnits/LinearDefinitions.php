<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\LinearUnits;
use Exception;

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

    /**
     * identify if metric/imperial by passing in the type ie, cm/yd/ft
     * @param $type
     * @return bool|false|int|string
     * @throws Exception
     */
    public function identifySystem($type)
    {
        foreach ($this->identifier as $k => $v) {
            if (array_search($type, $v) !== false) {
                return $k;
            }
        }

        throw new Exception('Unsupported measuring system.');
    }
}