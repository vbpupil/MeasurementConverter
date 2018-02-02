<?php
/**
 * Measurement Converter
 *
 * @author: Dean Haines
 * @copyright: Dean Haines, 2018, UK
 * @license: GPL V3.0+ See LICENSE.md
 */
namespace vbpupil\LinearUnits;

use Chippyash\Type\Number\FloatType;
use Chippyash\Type\Number\IntType;
use Chippyash\Type\String\StringType;
use vbpupil\MeasurementUnitInterface;


/**
 * Class LinearUnitInterface
 */
abstract class LinearUnitInterface implements MeasurementUnitInterface
{
    /**
     * @var array
     */
    protected $definitions;
    /**
     * @var
     */
    protected $originalType;
    /**
     * @var StringType
     */
    protected $type;
    /**
     * @var
     */
    protected $metricType;

    /**
     * @var FloatType
     */
    protected $size;

    /**
     * @var array
     */
    public $measurements = [];

    /**
     * LinearUnits constructor.
     * @param FloatType $size
     * @param StringType $type
     */
    public function __construct(FloatType $size, StringType $type){
        $type = $this->definitionCheck();
    }

    /**
     * @param StringType $type
     * @return StringType
     * @throws \Exception
     */
    public function definitionCheck(StringType $type)
    {
        if(!array_key_exists($type->get(), $this->definitions)){
            $exists = false;

            foreach ($this->definitions as $k => $v){
                if(in_array(strtolower($type->get()), $v)){
                    $type = new StringType($k);
                    $exists = true;
                    break;
                }
            }

            if(!$exists) {
                throw new \Exception("Measurement type {$type->get()} not recognised");
            }
        }
        return $type;
    }

    /**
     *
     */
    public function setValues()
    {
        $this->setLowestDenominatorValue();

        foreach ($this->definitions as $k => $v){
            $this->setValue($this->size, new StringType($k) );
        }
    }

    /**
     * @param FloatType $size
     * @param StringType $type
     */
    public function setValue(FloatType $size, StringType $type)
    {
        $this->measurements[$type->get()] = [
                'description'=>$this->definitions[$type->get()]['description']->get(),
                'measure'=> ($size->get() / $this->definitions[$type->get()]['ratio']->get())
            ];
    }

    /**
     *
     */
    public function setLowestDenominatorValue()
    {
        if($this->type == current(array_keys($this->definitions))){
            $this->setValue($this->size, $this->type);
        }

        if($this->type != current(array_keys($this->definitions))){
            $this->size = new FloatType($this->size->get() * $this->definitions[$this->type->get()]['ratio']->get());
            $this->type = new StringType(current(array_keys($this->definitions)));
        }
    }

    /**
     * @param StringType $type
     * @return mixed
     */
    public function getValue(StringType $type = null)
    {
        if(is_null($type)){
            $type = $this->originalType;
        }

        return $this->measurements[$type->get()]['measure'];
    }

    /**
     * @param StringType $type
     * @return string
     */
    public function getHumanReadableLong(StringType $type=null)
    {
        if(is_null($type)){
            $type = $this->originalType;
        }

        $descriptor = ($this->getValue($type) > 1 ? $this->definitions[$type->get()]['plural'][1] : $this->definitions[$type->get()]['plural'][0]);

        return "{$this->getValue($type)} {$descriptor}";
    }

    /**
     * @param StringType $type
     * @return string
     */
    public function getHumanReadableShort(StringType $type=null)
    {
        if(is_null($type)){
            $type = $this->originalType;
        }

        return "{$this->getValue($type)} {$type->get()}";
    }


}