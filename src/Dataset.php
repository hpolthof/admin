<?php namespace Hpolthof\Admin;

use Illuminate\Support\Collection;

class Dataset
{
    protected $label;
    protected $values;

    /**
     * Dataset constructor.
     * @param $label
     * @param $values
     */
    public function __construct($label, array $values = array())
    {
        $this->label = $label;
        $this->setValues($values);
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Dataset
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     * @return Dataset
     */
    public function setValues($values)
    {
        $this->values = new Collection($values);
        return $this;
    }

    public function addValue($value)
    {
        $this->values->push($value);
        return $this;
    }

    protected function generateArray(array $fields = array())
    {
        $result = [];
        foreach($fields as $field) {
            $result[$field] = $this->{$field};
        }
        $result['data'] = $this->values->all();
        return $result;
    }

    public function toArray()
    {
        return $this->generateArray(['label']);
    }
}