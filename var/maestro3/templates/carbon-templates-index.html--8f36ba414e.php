<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/templates/index.html

use Latte\Runtime as LR;

class Template8f36ba414e extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		echo $page->fetch('header') /* line 1 */ ?>

<?php echo $page->generateStyleSheetCode() /* line 2 */ ?>

<?php echo $page->fetchThemeComponent('header') /* line 3 */ ?>

<?php echo $page->fetchThemeComponent('sidemenu') /* line 4 */ ?>

<?php echo $page->fetchThemeComponent('content') /* line 5 */ ?>

<?php echo $page->generateScripts() /* line 6 */ ?>

<?php
		echo $page->fetch('footer') /* line 7 */;
		return get_defined_vars();
	}

}
