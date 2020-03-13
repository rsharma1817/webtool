<?php

class MLinkButton extends MControl
{
    public function render()
    {
        $this->options->iconCls = $this->property->iconCls ?: $this->property->icon;
        $this->options->plain = $this->property->plain;
        $this->options->size = $this->property->size;
        MAction::generate($this, $this->property->id);
        //$this->plugin = 'linkbutton';
        //$this->setPluginClass($control);
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
            'glyph' => $this->getPainter()->glyphicon($this)
        ]);

    }

}

