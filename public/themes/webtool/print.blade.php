@include('header')

<div id="appContainer" style="width:100%;height:100%;">
    <div id="centerPane" style="height:100vh; padding:16px 16px 16px 16px;">
        {!! $page->generate('content') !!}
    </div>
</div>

@include('footer')
