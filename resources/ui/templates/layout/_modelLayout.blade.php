<div id="modelLayout" style="width:100%;height:100%;">
    <div id="modelLayoutNorthPane" data-options="collapsible:false, region:'north', title:'@yield('title')'" style="height:70px">
        @yield('search')
    </div>
    <div id="modelLayoutLeftPane" region="west" split="true" style="height: 100%">
        @yield('tree')
    </div>
    <div id="modelLayoutCenterPane" region="center" style="height: 100%">
        @yield('content')
    </div>
</div>

<div class="ui fluid container">
    <h1 class="ui header">@yield('title')</h1>
    <div class="ui celled grid" style="height:100%">
        <div class="row">
            <div class="sixteen wide column">
                @yield('search')
            </div>
        </div>
        <div class="stretched row">
            <div class="three wide column">
                @yield('tree')
            </div>
            <div class="thirteen wide column">
                @yield('content')
            </div>
        </div>
    </div>
</div>


