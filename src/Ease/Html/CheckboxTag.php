<?php

namespace Ease\Html;

/** @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com> 
 * Displays checkbox tag.
 *
 * @author Vítězslav Dvořák <vitex@hippy.cz>
 */
class CheckboxTag extends InputTag
{

    /**
     * Displays HTML Checkbox.
     *
     * @param string $name       tag name
     * @param bool   $checked    checkbox state
     * @param string $value      returns checkbox value
     * @param array  $properties checkbox tag properties
     */
    public function __construct(string $name, bool $checked = false, string $value = null,
                                $properties = [])
    {
        $properties['type'] = 'checkbox';
        if ($checked === true) {
            $properties[] = 'checked';
        }
        if (!is_null($value)) {
            $properties['value'] = $value;
        }
        if (strlen($name)) {
            $properties['name'] = $name;
        }
        $this->setTagProperties($properties);
        parent::__construct($name);
    }

    /**
     * Check mark settings.
     *
     * @param bool $value sets tag parameter to "checked"
     */
    public function setValue($value = true)
    {
        if (boolval($value)) {
            $this->setTagProperties(['checked' => 'true']);
        } else {
            unset($this->tagProperties['checked']);
        }
    }

    /**
     * Obtains curent checkbox state
     *
     * @return boolean $value
     */
    public function getValue()
    {
        return $this->getTagProperty('checked') == 'true';
    }
}
