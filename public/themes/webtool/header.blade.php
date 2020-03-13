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

    <!-- Carrega o jQuery - obrigatório em todos os temas -->
    <script type="text/javascript"
            src="{{$manager->getStaticURL($manager->getApp(), 'scripts/jquery-2.1.1.min.js')}}"></script>

    <!-- Carrega components -->
    <link rel="stylesheet" type="text/css" href="/scripts/jquery-easyui-1.5.2/themes/webtool/styles.css">
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="/components/css/app.css">
    <script type="text/javascript" src="/scripts/jquery-easyui-1.5.2/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/semantic/semantic.js"></script>
    <script type="text/javascript" src="/components/js/app.js"></script>

    <!-- Carrega scripts -->
    <script type="text/javascript" src="/scripts/jquery-manager/jquery.manager.core.js"></script>
    <script type="text/javascript" src="/scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/scripts/jquery.hotkeys-master/jquery.hotkeys.js"></script>
    <script type="text/javascript" src="/scripts/bootstrap-wysiwyg-master/bootstrap-wysiwyg.js"></script>
    <script type="text/javascript" src="/scripts/jquery.class.js"></script>
    <script type="text/javascript" src="/scripts/jquery.md5.js"></script>
    <script type="text/javascript" src="/scripts/vue/vue.js"></script>
    <script type="text/javascript" src="/scripts/vue/vuex.js"></script>
    <script type="text/javascript" src="/scripts/vue/http-vue-loader.js"></script>

    <!-- Carrega scripts do tema -->
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/theme.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/extensions.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/controls.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/store.js"></script>
    <script type="text/javascript" src="{{$manager->getThemeURL()}}scripts/api.js"></script>

    <!-- Carrega estilos do tema -->
    <link rel="stylesheet" href="{{$manager->getThemeURL()}}style.css">

    <script type="text/javascript">
        manager.baseURL = "{{$manager->getBaseURL()}}" + '/index.php';
    </script>
</head>
<body>
