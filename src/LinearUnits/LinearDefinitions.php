<?php
/**
 * Freetimers Web Application Framework
 *
 * @author    Dean Haines
 * @copyright Freetimers Communications Ltd, 08/09/2017, UK
 * @license   Proprietary See LICENSE.md
 */

namespace vbpupil\LinearUnits;


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