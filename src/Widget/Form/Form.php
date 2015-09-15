<?php namespace Hpolthof\Admin\Widget\Form;

use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Collection;

class Form extends Widget
{
    protected $fields;
    protected $vertical = true;

    public function __construct()
    {
        $this->fields = new Collection();
    }

    public function addField(Field $field)
    {
        $this->fields->push($field);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getFields()
    {
        return $this->fields;
    }

    public function resetFields()
    {
        $this->fields = new Collection();
        return $this;
    }

    public function render()
    {
        $result = "";
        foreach($this->fields->all() as $field) {
            if($this->isVertical()) {
                $field->setVertical();
            } else {
                $field->setHorizontal();
            }

            $result .= $field->render();
        }

        return $result;
    }

    /**
     * @return boolean
     */
    public function isVertical()
    {
        return $this->vertical;
    }

    /**
     * @param boolean $vertical
     * @return Form
     */
    public function setVertical($vertical)
    {
        $this->vertical = $vertical;
        return $this;
    }


}