<div class="ui modal" id="{{$control->property->id}}_modal">
    <i class="close icon"></i>
    <div class="header">
        {{$header}}
    </div>
    <div class="content">
        <form class="ui form" {!! $painter->getAttributes($control) !!} >
            @if ($menubar != '')
                {{$menubar}}
            @endif
            @if ($validators != '')
                <div id="divError" style="display:none"></div>
            @endif
            {!! $fields !!}
            @if ($help != '')
                <div class="mFormHelp">
                    {{$help}}
                </div>
            @endif
        </form>
    </div>
    <div class="actions">
        @if ($buttons != '')
            <div id="{{$control->id}}_buttons">
                {!! $buttons !!}
            </div>
        @endif
    </div>
</div>

@if ($validators != '')
    <script>
        $(function () {

            $('#{{$control->id}}').bootstrapValidator({
                excluded: [':disabled'],
                container: '#divError',
                message: 'Este valor não é válido',
                fields: {
                    {{$validators}}
                }
            });
        });
    </script>
@endif

