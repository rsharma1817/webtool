<?php

class MMenuItem extends MControl
{
    public function render()
    {
        $this->property->text = $this->property->text ? : $this->property->label;
        $this->options->iconCls = $this->property->icon ? : ($this->property->iconCls ? : $this->getPainter()->glyphclass($this));
        MAction::generate($this);
        $this->addControl($this->property->text);
        return parent::render();
    }
}

