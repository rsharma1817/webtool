<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/ui/components/commonLayoutStructure.latte

use Latte\Runtime as LR;

class Template4c03bf0a71 extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'toolbarList' => 'blockToolbarList',
		'list' => 'blockList',
		'tabData1' => 'blockTabData1',
		'tabData2' => 'blockTabData2',
		'tabData3' => 'blockTabData3',
		'tabData4' => 'blockTabData4',
		'tabData5' => 'blockTabData5',
		'tabData6' => 'blockTabData6',
		'controls' => 'blockControls',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'title' => 'html',
		'toolbarList' => 'html',
		'list' => 'html',
		'tabData1' => 'html',
		'tabData2' => 'html',
		'tabData3' => 'html',
		'tabData4' => 'html',
		'tabData5' => 'html',
		'tabData6' => 'html',
		'controls' => 'html',
		'script' => 'html',
	];


	function main()
	{
		extract($this->params);
		?><div id="commonLayout" style="width:100%;height:100%;" data-options="title:'<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('title', get_defined_vars(), function ($s, $type) {
			$_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($_fi, 'htmlAttr', $s);
		});
?>'">
    <div id="commonLayoutTabs" style="width:100%;height:100%;">
        <div id="commonLayoutTabList" class="tabCRUD" title="List">
            <div class="toolbarGridCRUD">
                <?php
		$this->renderBlock('toolbarList', get_defined_vars());
?>
            </div>
            <div id="commonLayoutListPane">
                <?php
		$this->renderBlock('list', get_defined_vars());
?>
            </div>
        </div>
        <?php
		$this->renderBlock('tabData1', get_defined_vars());
		?>        <?php
		$this->renderBlock('tabData2', get_defined_vars());
		?>        <?php
		$this->renderBlock('tabData3', get_defined_vars());
		?>        <?php
		$this->renderBlock('tabData4', get_defined_vars());
		?>        <?php
		$this->renderBlock('tabData5', get_defined_vars());
		?>        <?php
		$this->renderBlock('tabData6', get_defined_vars());
?>
    </div>
</div>

<?php
		$this->renderBlock('controls', get_defined_vars());
?>

<script type="text/javascript">
    var idCenterPane = "commonLayoutCenterPane";

    $(function () {
        $('#commonLayoutListPane').panel({
            fit: true,
            border: false,
            title: ''
        });
        $('#commonLayout').panel({
            fit: true
        });
        $('#commonLayoutTabs').tabs({
            fit: true,
            border: false,
            onSelect: function (title) {
                console.log(title + ' is selected');
            }
        });
        $('#commonLayoutTabList').layout({
            fit: true,
            border: false,
        });
    })
</script>

<?php
		$this->renderBlock('script', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function blockTitle($_args)
	{
		
	}


	function blockToolbarList($_args)
	{
		
	}


	function blockList($_args)
	{
		
	}


	function blockTabData1($_args)
	{
		
	}


	function blockTabData2($_args)
	{
		
	}


	function blockTabData3($_args)
	{
		
	}


	function blockTabData4($_args)
	{
		
	}


	function blockTabData5($_args)
	{
		
	}


	function blockTabData6($_args)
	{
		
	}


	function blockControls($_args)
	{
		
	}


	function blockScript($_args)
	{
		
	}

}
