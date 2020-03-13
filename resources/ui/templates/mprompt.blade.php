<div id="{{$control->property->id}}_modal" class="ui mini modal">
    <div class="header">{{$object->title}}</div>
    <div class="content">
        <p>{{$object->msg}}</p>
    </div>
    <div class="actions">
        @if ($object->type == 'confirmation')
        <div class="maction ui approve button" data-manager="action:'{!! $action1 !!}">Ok</div>
        <div class="maction ui cancel button"  data-manager="action:'{!! $action2 !!}">Cancel</div>
        @endif
        @if ($object->type == 'question')
        <div class="maction ui approve button"  data-manager="action:'{!! $action1 !!}">Yes</div>
        <div class="maction ui cancel button"  data-manager="action:'{!! $action2 !!}">No</div>
        @endif
    </div>
</div>