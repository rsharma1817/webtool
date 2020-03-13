{{ $control->addClass("item") }}
<a href='#' {!! $painter->getAttributes($control) !!}>
    {{$glyph}}{{$control->property->text}}
</a>