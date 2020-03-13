<?php

class MPrompt extends MControl
{
    public function render() {
        $promptType = [
            'information' => 'success', //toast
            'error' => 'error', //toast
            'warning' => 'warning', //toast
            'question' => 'question', //modal
            'confirmation' => 'confirm', //modal
        ];
        $object = (object)[
            'type' => $promptType[$this->property->type],
            'title' => ucFirst(_M($this->property->type)),
            'msg' => $this->property->msg,
        ];
        //$dataJson = MJSON::encode((object)[
        //    'type' => $promptType[$this->property->type],
        //    'title' => ucFirst(_M($this->property->type)),
        //    'msg' => $this->property->msg,
        //]);
        //$dataJson = addslashes($dataJson);
        //$this->property->id = 'mprompt';
        $action1 = MAction::parseAction(addslashes($this->property->action1));
        $action2 = MAction::parseAction(addslashes($this->property->action2));

        //$this->page->onLoad("var {$this->property->id} = theme.prompt('{$this->property->id}','{$dataJson}',\"{$action1}\",\"{$action2}\");");
        //$show = ($this->property->show === false) ? false : true;
        //if ($show) {
        //    $this->page->onLoad("{$this->property->id}.show();");
        //}
        //return '';
        if (($object->type == 'success') || ($object->type == 'error') || ($object->type == 'warning')) {
            $onLoad = <<<EOT
$('body')
  .toast({
    displayTime: 0,
    class: '{$object->type}',
    message: '{$object->msg}'
  })
EOT;
            $this->page->onLoad($onLoad);
            return '';
        } else {
            $onLoad = <<<EOT
$('#{$this->property->id}_modal').modal('show')
EOT;
            $this->page->onLoad($onLoad);
            return parent::render([
                'object' => $object,
                'action1' => $action1,
                'action2' => $action2
            ]);
        }
    }
}

