<?php

class MTextField extends MControl
{
    public function render()
    {
        if ($this->property->placeholder) {
            $this->options->prompt = $this->property->placeholder;
        }
        $this->options->width = $this->style->width ? : '150px';
        $onLoad = "$('#{$this->property->id}').textbox();";
        $this->page->onLoad($onLoad);
        if ($this->property->mask) {
            $maskOptions = $this->property->maskOptions != '' ? ',' . $this->property->maskOptions : '';
            $onLoad = "$('#{$this->property->id}').textbox('textbox').mask('{$this->property->mask}'{$maskOptions});";
            $this->page->onLoad($onLoad);
        }
        // processa os validators e retorna o campo hidden, se necessário
        $attributes = $this->getPainter()->getAttributes($this);
        return parent::render([
            'attributes' => $attributes,
            'hidden' => MValidator::process($this),
            'prefix' => $this->property->prefix,
            'sufix' => $this->property->sufix
        ]);

    }
}

