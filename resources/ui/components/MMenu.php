<?php

class MMenu extends MControl
{
    public function render() {
        $items = '';
        foreach ($this->controls as $c) {
            $items .= $c->generate();
        }
        $this->addClass('menu');
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
            'items' => $items
        ]);
    }
}

