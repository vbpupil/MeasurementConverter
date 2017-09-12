<?php
/**
 * CubicUnit*
 * @author: Dean Haines
 * @copyright: Dean Haines, 2017, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Cubic;


use Chippyash\Type\String\StringType;
use PHPUnit\Runner\Exception;
use vbpupil\LinearUnits\LinearUnit;

class CubicUnit
{
    /**
     * @var
     */
    protected $width;
    /**
     * @var
     */
    protected $depth;
    /**
     * @var
     */
    protected $height;

    /**
     * @var array
     */
    protected $cubic =[];

    /**
     * CubicUnit constructor.
     * @param LinearUnit $width
     * @param LinearUnit $depth
     * @param LinearUnit $height
     */
    public function __construct(LinearUnit $width, LinearUnit $depth, LinearUnit $height)
    {
        if(get_class($width) != get_class($depth) || get_class($depth) != get_class($height)){
            throw new Exception('Units must be of the same type ie Metric');
        }

        $this->height = $height;
        $this->depth = $depth;
        $this->width = $width;

        $this->calculate();
    }

    public function calculate()
    {
        foreach ($this->width->measurements as $k => $v){
            $this->cubic[$k] = (
                            $this->width->measurements[$k]['measure'] *
                            $this->depth->measurements[$k]['measure'] *
                            $this->height->measurements[$k]['measure']
                        );

        }
    }

    public function getValue(StringType $type)
    {
        return $this->cubic[$type->get()];
    }

    public function getHumanReadableLong(StringType $type)
    {
        return "{$this->getValue($type)} {$type}&sup3;";
    }
}