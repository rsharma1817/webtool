@include('header')

<div id="appContainer" style="width:100%;height:100%;">
    <div class="ui fixed inverted menu">
        <a href="#" class="header item">
            {{$manager->getOptions('mainTitle')}}
        </a>
        {!! $page->generate('MainMenu') !!}
        <div id="right" class="right menu">
            {!! $page->generate('UserMenu') !!}
        </div>
    </div>
    <div id="centerPane" style="height:100vh; padding:48px 16px 32px 16px;">
        {!! $page->generate('content') !!}
    </div>
    <div class="ui inverted vertical footer" style="position: absolute; bottom: 0; width: 100%; height:24px">
        &nbsp;© 2008, 2020 FrameNetBrasil Project
    </div>
</div>

@include('footer')
