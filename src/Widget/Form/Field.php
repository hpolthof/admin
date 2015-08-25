<?php namespace Hpolthof\Admin\Widget\Form;

use Hpolthof\Admin\Widget\Widget;

abstract class Field extends Widget
{
    protected $title;
    protected $name;
    protected $verical = true;
    protected $value;
    protected $readonly = false;
    protected $required = false;

    abstract public function renderField($id);

    public function render()
    {
        return view('admin::widget.form.field', [
            'uid' => uniqid(),
            'field' => $this,
        ])->render();
    }

    public function setVertical()
    {
        $this->verical = true;
    }

    public function setHorizontal()
    {
        $this->verical = false;
    }

    public function isVertical()
    {
        return $this->verical;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Field
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Field
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        if(\Request::has($this->getName())) {
            return \Request::get($this->getName());
        }
        if(\Session::has('_old_input')) {
            $input = \Session::get('_old_input');
            if(array_key_exists($this->getName(), $input) !== FALSE) {
                return $input[$this->getName()];
            }
        }
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isReadonly()
    {
        return $this->readonly;
    }

    /**
     * @param boolean $readonly
     * @return Field
     */
    public function setReadonly($readonly = true)
    {
        $this->readonly = $readonly;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     * @return Field
     */
    public function setRequired($required = true)
    {
        $this->required = $required;
        return $this;
    }

    public function getRequiredHtml()
    {
        if($this->isRequired()) {
            return "required='required'";
        }
        return '';
    }

    public function getReadonlyHtml()
    {
        if($this->isReadonly()) {
            return "disabled='disabled'";
        }
        return '';
    }
}