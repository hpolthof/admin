<?php namespace Hpolthof\Admin\Widget\Navbar;


use Hpolthof\Admin\AdminException;

class IndicatorDropdown extends Dropdown
{
    protected $indicator;
    protected $icon;
    protected $labelClass = 'label-success';

    public function render()
    {
        $caption = "<i class='fa {$this->icon}'></i>";
        if(intval($this->indicator) > 0) {
            $caption .= "<span class='label {$this->labelClass}'>".intval($this->indicator)."</span>";
        }

        parent::setCaption($caption);

        return parent::render();
    }


    /**
     * @return mixed
     */
    public function getIndicator()
    {
        return $this->indicator;
    }

    /**
     * @param int $indicator
     * @return IndicatorDropdown
     */
    public function setIndicator($indicator)
    {
        $this->indicator = $indicator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return IndicatorDropdown
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function setCaption($caption)
    {
        throw new AdminException('setCaption is not available for this instance. User icon and indicator.');
    }

    /**
     * @return mixed
     */
    public function getLabelClass()
    {
        return $this->labelClass;
    }

    /**
     * @param mixed $labelClass
     * @return IndicatorDropdown
     */
    public function setLabelClass($labelClass = 'label-success')
    {
        $this->labelClass = $labelClass;
        return $this;
    }



}