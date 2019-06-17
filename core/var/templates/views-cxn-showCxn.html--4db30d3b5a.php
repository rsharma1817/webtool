<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/report/views/cxn\showCxn.html

use Latte\Runtime as LR;

class Template4db30d3b5a extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div class="reportCxn">
    <div class="cxnName">
        <?php echo $data->cxn->entry->name /* line 3 */ ?>  [<?php echo $data->cxn->entry->nick /* line 3 */ ?>]
    </div>
    <div class="divPanel">
        <div id="panelDefinition" class="easyui-panel" title="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'repDefinition')) ?>" collapsible="false" data-options="fit:true"  style="width:100%;">
            <div class="text">
                <?php echo $data->cxn->entry->description /* line 8 */ ?>

            </div>
        </div>
    </div>
    <div class="divPanel">
        <div id="panelExample" class="easyui-panel" title=<?php echo LR\Filters::escapeHtmlAttrUnquoted(call_user_func($this->filters->translate, 'repExample')) ?> collapsible="true" style="width:100%;">
            <div class="example">
            </div>
        </div>
    </div>
    <div class="divPanel">

        <div id="panelCe" class="easyui-panel" title=<?php echo LR\Filters::escapeHtmlAttrUnquoted(call_user_func($this->filters->translate, 'repCE')) ?> collapsible="false" data-options="fit:true">
            <table id="ce" class="cxnElement">
                <tbody>
<?php
		$iterations = 0;
		foreach ($data->ce['element'] as $ce) {
?>
                        <tr>
                            <td class="ce"><span class="ce_<?php echo $ce['lower'] /* line 25 */ ?>"><?php
			echo LR\Filters::escapeHtmlText($ce['name']) /* line 25 */ ?> [<?php echo LR\Filters::escapeHtmlText($ce['nick']) /* line 25 */ ?>]</span></td>
                            <td class="cedef"><?php echo $ce['description'] /* line 26 */ ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="example">
                            </td>
                        </tr>
                        <tr>
                            <td class="cespace">
                            </td>
                        </tr>
<?php
			$iterations++;
		}
?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="divPanel">
        <div id="panelRelations" class="easyui-panel" title=<?php echo LR\Filters::escapeHtmlAttrUnquoted(call_user_func($this->filters->translate, 'repRelations')) ?> collapsible="true" style="width:100%;">
            <table class="tableRelations">
                <tbody>
<?php
		$iterations = 0;
		foreach ($data->relations as $name => $cxns) {
?>
                        <tr>
                            <td class="relation"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, $name)) ?></td>
                            <td><?php echo LR\Filters::escapeHtmlText($cxns) /* line 49 */ ?></td>
                        </tr>
                        <tr>
                            <td class="cespace">
                            </td>
                        </tr>
<?php
			$iterations++;
		}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $.parser.parse();
    //$('#panelExample').panel('collapse');
    //$('#panelRelations').panel('collapse');
</script>
<style type="text/css">
<?php
		$iterations = 0;
		foreach ($data->ce['styles'] as $style) {
			?>    .ce_<?php echo $style['ce'] /* line 69 */ ?> {color: #<?php echo LR\Filters::escapeCss($style['rgbFg']) /* line 69 */ ?>; background-color: #<?php
			echo LR\Filters::escapeCss($style['rgbBg']) /* line 69 */ ?>;}
<?php
			$iterations++;
		}
?>

</style><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['ce'])) trigger_error('Variable $ce overwritten in foreach on line 23');
		if (isset($this->params['name'])) trigger_error('Variable $name overwritten in foreach on line 46');
		if (isset($this->params['cxns'])) trigger_error('Variable $cxns overwritten in foreach on line 46');
		if (isset($this->params['style'])) trigger_error('Variable $style overwritten in foreach on line 68');
		
	}

}
