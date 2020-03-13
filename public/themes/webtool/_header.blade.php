<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta name="Generator" content="Maestro 3.0; http://maestro.org.br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{$manager->getOptions('pageTitle')}}</title>
    <meta name="description" content="Framenet Brasil 3.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Carrega o icone da aplicação -->
    <link rel="icon" type="image/x-icon" href="{{$manager->getThemeURL()}}favicon.ico"/>

    <!-- Carrega estilos específicos da aplicação -->
    <link rel="stylesheet" type="text/css" href="{{$manager->getStaticURL($manager->getApp(), 'css/style.css')}}">

    <!-- Carrega o jQuery - obrigatório em todos os temas -->
    <script type="text/javascript"
            src="{{$manager->getStaticURL($manager->getApp(), 'scripts/jquery-2.1.1.min.js')}}"></script>

    <!-- Carrega estilos -->
    <link rel="stylesheet" href="@asset('scripts/jointJS/joint.min.css')">
    <link rel="stylesheet" href="@asset('scripts/trumbowyg/ui/trumbowyg.css')">
    <link rel="stylesheet" href="@asset('scripts/jsplumb/jsplumbtoolkit-defaults.css')">
    <link rel="stylesheet" href="@asset('scripts/jsplumb/jsplumbtoolkit-demo.css')">
    <link rel="stylesheet" href="@asset('semantic/semantic.css')">

    <!-- Carrega scripts -->
    <script type="text/javascript" src="@asset('scripts/jquery-manager/jquery.manager.core.js')"></script>
    <script type="text/javascript" src="@asset('scripts/fontawesome-free-5.0.9/svg-with-js/js/fontawesome-all.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/fontawesome-free-5.0.9/svg-with-js/js/fa-v4-shims.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/bootstrap-3.2.0-dist/js/bootstrap.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jquery-easyui-1.5.2/jquery.easyui.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/bootstrapvalidator-dist-0.5.3/dist/js/bootstrapValidator.js')"></script>
    <script type="text/javascript" src="@asset('scripts/bootstrapvalidator-dist-0.5.3/dist/js/language/pt_BR.js')"></script>
    <script type="text/javascript" src="@asset('scripts/bootstrap-switch-master/js/bootstrap-switch.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jquery.hotkeys-master/jquery.hotkeys.js')"></script>
    <script type="text/javascript" src="@asset('scripts/bootstrap-wysiwyg-master/bootstrap-wysiwyg.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jquery.class.js')"></script>
    <script type="text/javascript" src="@asset('scripts/cola_v3/cola.v3.js')"></script>
    <script type="text/javascript" src="@asset('scripts/d3_v5/d3.js')"></script>
    <script type="text/javascript" src="@asset('scripts/d3/d3.graph.js')"></script>
    <script type="text/javascript" src="@asset('scripts/d3/d3.tree.js')"></script>
    <script type="text/javascript" src="@asset('scripts/d3/d3.graphtree.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/lodash.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/backbone-min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/joint.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/joint.shapes.devs.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/joint.shapes.frame.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jointJS/joint.shapes.entity.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jquery.md5.js')"></script>
    <script type="text/javascript" src="@asset('scripts/trumbowyg/trumbowyg.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/jsplumb/jsplumb.js')"></script>
    <script type="javascript/worker" src="@asset('scripts/d3-graphviz/node_modules/viz.js/viz.jsw')"></script>
    <script type="text/javascript" src="@asset('scripts/d3-graphviz/node_modules/d3-graphviz/index.js')"></script>
    <script type="text/javascript" src="@asset('scripts/vue/vue.min.js')"></script>
    <script type="text/javascript" src="@asset('scripts/vue/vuex.min.js')"></script>
    <script type="text/javascript" src="@asset('semantic/semantic.js')"></script>

    <!-- Carrega scripts do tema -->
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/theme.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/extensions.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/controls.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/store.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/api.js"></script>

    <!-- Carrega estilos do tema -->
    <link rel="stylesheet" href="{{$manager->getThemeURL()}}style.css">
    <link rel="stylesheet" href="@asset('scripts/jquery-easyui-1.5.2/themes/webtool/styles.css')">

    <script type="text/javascript">
        manager.baseURL = "{{$manager->getBaseURL()}}" + '/index.php';
    </script>
</head>
<body>
