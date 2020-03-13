<?php

class MMenuBarItem extends MControl
{
    public function render()
    {
        $this->property->text = $this->property->label;
        $this->options->iconCls = $this->property->icon ?: ($this->property->iconCls ?: $this->getPainter()->glyphclass($this));
        $menus = '';
        foreach ($this->controls as $c) {
            if ($c->className == 'mmenu') {
                $this->options->menu = '#' . $c->property->id;
                $menus .= $c->generate();
            }
        }
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
            'menus' => $menus
        ]);
    }
}

