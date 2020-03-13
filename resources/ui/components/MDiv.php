<?php

class MDiv extends MControl
{
    public function render()
    {
        $painter = $this->getPainter();
        $attributes = $painter->getAttributes($this);
        if ($this->hasItems()) {
            $inner = $painter->generateToString($this->controls);
        } elseif ($this->property->cdata) {
            $inner = $this->property->cdata;
        } else {
            $inner = $this->inner;
        }
        return parent::render([
            'attributes' => $attributes,
            'inner' => $inner
        ]);

    }
}

