<?php

class MButton extends MControl
{
    public function render()
    {
        $glyph = $this->getPainter()->glyphicon($this);
        $this->property->iconCls = $this->property->iconCls ? : $this->property->icon;
        $this->property->type = $this->property->type ? : "button";
        MUtil::setIfNull($this->property->action, 'POST');
        MAction::generate($this);
        $text = $glyph . (($this->property->value != '') ? "{$this->property->value}" : (($this->property->text != '') ? "{$this->property->text}" : "{$this->property->caption}"));
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
            'text' => $this->property->text,
            'type' => $this->property->type,
        ]);

    }
}
