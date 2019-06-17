<?php
// source: C:\wamp64\www\webtool\apps\webtool\offline/../../../apps/webtool/public/themes/webtool\index.html

use Latte\Runtime as LR;

class Template88ad32419c extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		/* line 1 */
		$this->createTemplate('header.html', $this->params, "include")->renderToContentType('html');
?>
<!-- basic preloader: -->
<div id="loader"><div id="loaderInner" style="direction:ltr;">Carregando.... </div></div>

<div id="appContainer" class="easyui-layout" style="width:100%;height:100%;">
    <div data-options="region:'north',title:'<?php echo $manager->getOptions('mainTitle') /* line 6 */ ?>',split:false,border:false,collapsible:false" style="height:55px;background-color:#efefef">
        <div id="menuPane" class="melement" data-manager="href:'<?php echo LR\Filters::escapeHtmlAttr($manager->getURL('main/menu')) /* line 7 */ ?>'"></div>
        <div id="userPane" class="melement clearfix" data-manager="href:'<?php echo LR\Filters::escapeHtmlAttr($manager->getURL('main/userdata')) /* line 8 */ ?>'"></div>
    </div>
    <div data-options="region:'south',split:false,noheader:true,border:false" style="height:20px;background-color:#efefef">
        &nbsp;© 2008, 2019 FrameNetBrasil Project
    </div>
    <div id="centerPane" data-options="region:'center',split:false,noheader:true,border:false" style="padding:5px;">
        <?php echo $page->generate('content') /* line 14 */ ?>

    </div>
</div>
<?php
		/* line 17 */
		$this->createTemplate('footer.html', $this->params, "include")->renderToContentType('html');
		return get_defined_vars();
	}

}
