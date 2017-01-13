<?php

namespace HexTechnology\Layouts;

use Rhubarb\Leaf\LayoutProviders\LayoutProvider;
use Rhubarb\Leaf\Leaves\Controls\Control;

class HexTechnologyLayoutProvider extends LayoutProvider
{

    /**
     * Prints the layout surrounded by a container with a title or legend.
     *
     * @param string $containerTitle
     * @param mixed[] $items
     */
    public function printItemsWithContainer($containerTitle, ...$items)
    {
        print '<fieldset class="c-fieldset">';

        if ($containerTitle != "") {
            $this->printContainerTitle($containerTitle);
        }

        $this->printItems(...$items);

        print '</fieldset>';
    }

    public function printContainerTitle($containerTitle)
    {
        ?>
        <h1 class="title"><?= $containerTitle ?></h1>
        <?php
    }

    /**
     * Prints an array of label to value pairs.
     *
     * @param $pairs
     */
    public function printLabelValuePairs($pairs)
    {
        $controls = [];
        foreach ($pairs as $key => $value) {
            $control = null;
            $label = "";

            if (is_string($key)) {
                if (is_string($value)) {
                    $fieldName = $value;
                    $label = $key;

                    $control = $this->generateValue($fieldName);
                } else {
                    $control = $value;
                    $label = $key;
                }
            } else {
                $fieldName = $value;

                if (is_object($value)) {
                    $control = $value;
                } else {
                    $control = $this->generateValue($fieldName);
                }

                if (is_string($control)) {
                    $label = sizeof($controls);
                } else {
                    if (method_exists($control, "GetLabel")) {
                        $label = $control->getLabel();
                    }
                }
            }

            if (is_numeric($label)) {
                $label = "&nbsp;";
            }


            $controls[$label] = $this->generateValue($value);
        }

        foreach ($controls as $label => $control) {
            $this->printValueWithLabel($control, $label);
        }
    }

    /**
     * Prints a single item
     *
     * @param $value
     * @param $label
     */
    public function printValueWithLabel($value, $label)
    {
        $controlId = (is_object($value) && ($value instanceof Control)) ? $value->getPath() : "";

        ?>
        <label class="c-label" for="<?= $controlId ?>">
            <?php $this->printLabel($label) ?>
        </label>
        <?php
        $this->printValue($value);
    }

    /**
     * Prints the content of a label for an item
     *
     * @param $label
     */
    public function printLabel($label)
    {
        print $label;
    }

    /**
     * Prints the value or presenter
     *
     * @param $value
     */
    public function printValue($value)
    {
        print $value;
    }
}