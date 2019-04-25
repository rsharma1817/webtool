<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/ui/components/commonLayoutCRUD.latte

use Latte\Runtime as LR;

class Template9fd12d2545 extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'toolbarList' => 'blockToolbarList',
		'list' => 'blockList',
		'toolbarData' => 'blockToolbarData',
		'form' => 'blockForm',
		'controls' => 'blockControls',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'title' => 'html',
		'toolbarList' => 'html',
		'list' => 'html',
		'toolbarData' => 'html',
		'form' => 'html',
		'controls' => 'html',
		'script' => 'html',
	];


	function main()
	{
		extract($this->params);
		?><div id="commonLayout" style="width:100%;height:100%;"  data-options="title:'<?php
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
        <div id="commonLayoutTabData" class="tabCRUD" title="Data" >
            <div id="commonLayoutTabDataPane" style="width:100%;height:100%;">
            <div id="commonLayoutTabDataPaneNorth" class="dataCRUDToolbar" data-options="collapsible:false, region:'north', title:''" >
                <?php
		$this->renderBlock('toolbarData', get_defined_vars());
?>
            </div>
                 <div id="commonLayoutTabDataPaneCenter" class="dataCRUD" region="center" style="height: 100%">
                    <div class="containerForm">
                    <?php
		$this->renderBlock('form', get_defined_vars());
		?>                    <?php echo $page->fetchThemeComponent('cv-loading',['idLoadingDiv' => 'bxLoadingForm']) /* line 19 */ ?>

                    </div>
                </div>
        </div>
    </div>

</div>

<?php
		$this->renderBlock('controls', get_defined_vars());
?>

<script type="text/javascript">
    var idCenterPane = "commonLayoutCenterPane";

    $(function () {
        /*
        var Loading = CarbonComponents.Loading;
        manager.loading = Loading.create(document.getElementById('bxLoadingForm'));
        manager.loading.set(false);
        */

        manager.loading.init('bxLoadingForm');

        $('#commonLayoutListPane').panel({
            fit: true,
            border: false,
            title: ''
        });
        /*
        $('#commonLayoutDataPane').panel({
            fit: true,
            title: '',
            toolbar: '#commonLayoutDataPaneToolbar'
        });
        */
        $('#commonLayout').panel({
            fit: true
        });
        $('#commonLayoutTabs').tabs({
            fit:true,
            border:false,
            onSelect:function(title){
                console.log(title+' is selected');
            }
        });
        $('#commonLayoutTabList').layout({
            fit: true,
            border:false,
        });
        $('#commonLayoutTabDataPane').layout({
            fit: true,
            border:false
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


	function blockToolbarData($_args)
	{
		
	}


	function blockForm($_args)
	{
		
	}


	function blockControls($_args)
	{
		
	}


	function blockScript($_args)
	{
		
	}

}
