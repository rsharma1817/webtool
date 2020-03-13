<div class="ui fluid container"  style="height:100%">
    <h1 class="ui header">@yield('title')</h1>
    <div class="ui grid"  style="height:100%">
        <div class="row" style="height:100%; padding-bottom:32px">
            <div class="sixteen wide column"  style="height:100%">
                <div id="@yield('id')" border="false" style="width:100%;height:100%;">
                    <div id="@yield('id')ControlPane" data-options="collapsible:true, region:'west', title:'&nbsp;',hideCollapsedContent:false,split:true" style="width:196px">
                        @yield('control')
                    </div>
                    <div id="@yield('id')CenterPane" border="false"  region="center" style="height: 100%">
                        <div id="@yield('id')Center" border="false" style="width:100%;height:100%;">
                            <div id="@yield('id')TreePane" data-options="region:'west', split:true,hideCollapsedContent:false,collapsible:true, title:'Frame List',border:true" style="height: 100%; width:320px;">
                                @yield('tree')
                            </div>
                            <div id="@yield('id')ContentPane" data-options="region:'center'" style="height: 100%">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#@yield('id')").layout({
            fit: true,
        });
        $("#@yield('id')Center").layout({
            fit: true,
        });
        let modelLayout = {
            app: "{{$manager->getApp()}}",
            isMaster: {{$data->isMaster}},
            isAnno: {{$data->isAnno ?? 'false'}},
            node: null
        };
        manager.store.commit('modelLayout', modelLayout);
    })
</script>
