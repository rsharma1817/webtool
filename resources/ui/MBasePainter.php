<?php

class MBasePainter {
    protected $attributes = '';
    protected $page;
    protected $control;
    protected $template;

    public function __construct() {
        $this->page = Manager::getPage();
        // Define quais propriedades serão renderizadas como atributos HTML
        $this->attributes = "id,name,style,readonly,title,value,class,src,alt,enctype,method";
        $this->setTemplate();
    }

    public function hasMethod($method) {
        $result = method_exists($this, $method);
        return $result;
    }

    private function getValue($v) {
        return is_numeric($v) ? $v : ( is_bool($v) ? ( $v ? 'true' : 'false' ) : ( is_string($v) ? "'{$v}'" : ( $v->scalar ?: '' ) ) );
    }

    protected function getStyle($control) {
        $value = '';
        if (is_string($control->style)) {
            $value = $control->style;
        } else {
            foreach ($control->style as $s => $v) {
                $value .= $v ? ( $s . ":" . $v . ';' ) : '';
            }
        }
        return ( $value != '' ) ? "style=\"{$value}\" " : '';
    }

    public function getManager($control) {
        $value = "";
        $data = $control->property->manager;
        if (count($data)) {
            $value = substr(MJSON::parse($data), 1, -1);
            $value = "data-manager=\"{$value}\" ";
        }
        return $value;
    }

    public function getOptions($control) {
        return "";
    }

    public function getAttributes($control, $names = array()) {
        $attributes = $this->getStyle($control);
        $attributes .= $this->getOptions($control);
        foreach ($control->property as $attrName => $value) {
            $val = "";
            if ($attrName == "manager") {
                $attributes .= $this->getManager($control);
            } elseif (strpos($this->attributes, $attrName) !== false) {
                $val = $value;
                if (is_array($value)) {
                    $val = implode(' ', $value);
                }
                if ($val != "") {
                    $attributes .= "{$attrName}=\"{$val}\" ";
                }
            }
        }
        return $attributes;
    }

    public static function generateToString($element, $separator = '') {
        if (is_array($element)) {
            foreach ($element as $e) {
                $html .= self::generateToString($e, $separator);
            }
        } elseif (is_object($element)) {
            if (method_exists($element, 'generate')) {
                $html = $element->generate() . $separator;
            } else {
                $html = "BasePainter Error: Method Generate not defined to " . get_class($element);
            }
        } else {
            $html = (string)$element;
        }
        return $html;
    }

    /*
     * Templates
     */

    public function setTemplate() {
        $path = Manager::getAppPath('/ui/templates');
        $this->template = new MTemplate($path);
        $this->template->context('manager', Manager::getInstance());
        $this->template->context('page', $this->page);
        $this->template->context('charset', Manager::getOptions('charset'));
        $this->template->context('template', $this->template);
        $this->template->context('painter', $this);
    }

    public function fetch($template = '', $control = null, $vars = []) {
        $args = array_merge(['control' => $control], $vars);
        return $this->template->fetch($template, $args);
    }

    /**
     * Gera o codigo HTML referente ao controle
     * @param MBaseControl $control
     */
    public function render($control) {
        return $control->render();
    }
    /**
     * Gera o codigo javascript referente aos eventos de um controle.
     * @param MBaseControl $control
     */
    public function generateEvents($control) {
        $events = $control->event;
        if (is_array($events) && count($events)) {
            foreach ($events as $event) {
                foreach ($event as $objEvent) {
                    $preventDefault = $objEvent->preventDefault ? "event.preventDefault();" : "";
                    $function = "function(event) { {$objEvent->handler}; {$preventDefault} }";
                    $code = "$('#{$objEvent->id}').on('{$objEvent->event}', {$function} )";
                    $this->page->onLoad($code);
                }
            }
        }
    }

    /*
     * Maestro - Controles Básicos
     */

    public function mbasecontrol($control) {
        if ($control->hasItems()) {
            $inner = $this->generateToString($control->controls);
        } elseif ($control->property->cdata) {
            $inner = $control->property->cdata;
        } else {
            $inner = $control->inner;
        }
        return $inner;
    }

    public function mhtml($control) {
        $tag = $control->tag;
        $attributes = $this->getAttributes($control);
        if ($control->hasItems()) {
            $inner = $this->generateToString($control->controls);
        } elseif ($control->property->cdata) {
            $inner = $control->property->cdata;
        } else {
            $inner = $control->inner;
        }
        return <<<EOT
<{$tag} {$attributes}>
    {$inner}
</{$tag}>
EOT;
    }

}
