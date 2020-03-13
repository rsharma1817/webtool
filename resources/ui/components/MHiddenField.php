<?php

class MHiddenField extends MControl
{
    public function render()
    {
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
        ]);
    }

}

