<?php
// source: C:\wamp64\www\webtool\apps\webtool\public\themes\webtool\header.html

use Latte\Runtime as LR;

class Template8d34fc15d5 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="Generator" content="Maestro 3.0; http://maestro.org.br">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo LR\Filters::escapeHtmlText($manager->getOptions('pageTitle')) /* line 11 */ ?></title>
        <meta name="description" content="Framenet Brasil 3.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Carrega o icone da aplicação -->
        <link rel="icon" type="image/x-icon" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getThemeURL())) /* line 16 */ ?>favicon.ico">
        
        <!-- Carrega estilos específicos da aplicação -->
        <link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), 'css/style.css'))) /* line 19 */ ?>">
        
        <!-- Carrega o jQuery - obrigatório em todos os temas -->
        <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), 'scripts/jquery-2.1.1.min.js'))) /* line 22 */ ?>"></script>
        
        <!-- Carrega o tema e suas dependências -->
<?php
		$includes = file_get_contents($manager->getThemePath()."/assets.ink");
		$lines = explode(PHP_EOL,$includes);
		$iterations = 0;
		foreach ($lines as $line) {
			$line = trim($line);
			if ($line && $line[0] != ';') {
				if (strpos($line, ".jsw", strlen($line) - strlen(".jsw")) !== FALSE) {
					$line = substr($line,0,-1);
					?>                    <script type="javascript/worker" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), $line))) /* line 32 */ ?>"></script>
<?php
				}
				if (strpos($line, ".js", strlen($line) - strlen(".js")) !== FALSE) {
					?>        <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), $line))) /* line 35 */ ?>"></script>
<?php
				}
				if (strpos($line, ".css", strlen($line) - strlen(".css")) !== FALSE) {
					?>        <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), $line))) /* line 38 */ ?>">
<?php
				}
			}
			$iterations++;
		}
		?>        <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getThemeURL())) /* line 42 */ ?>theme.js"></script>
        <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getThemeURL())) /* line 43 */ ?>style.css">
    </head>
    <body>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['line'])) trigger_error('Variable $line overwritten in foreach on line 27');
		
	}

}
