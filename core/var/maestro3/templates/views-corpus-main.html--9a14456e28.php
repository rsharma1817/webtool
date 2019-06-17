<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/report/views/corpus\main.html

use Latte\Runtime as LR;

class Template9a14456e28 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="reportCorpusLayout" style="width:100%;height:100%;">
    <div id="reportCorpusNorthPane" data-options="collapsible:false, region:'north', title:'<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Corpus Annotation Report')) ?>'">
        <div style="float:left;padding:5px">
            <input id="corpus" name="corpus" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Corpus')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="document" name="document" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Document')) ?>">
        </div>
    </div>
    <div id="reportCorpusLeftPane" region="west" split="true" style="height: 100%; width:280px">
        <ul id="corpusTree"></ul>
    </div>
    <div id="reportCorpusCenterPane" region="center" style="height: 100%">
        
    </div>
</div>
<div id="menuReportRootCorpus" style="display:none, width:120px;">
    <div onclick="reportCorpus.reloadCorpus()" data-options="iconCls:'icon-reload'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Reload Corpus')) ?></div>
</div>
<div id="menuReportCorpus" style="display:none, width:120px;">
    <div onclick="reportCorpus.reportCorpus()" data-options="iconCls:'fa fa-table fa16px'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Report Corpus')) ?></div>
</div>
<div id="menuReportDocument" style="display:none, width:120px;">
    <div onclick="reportCorpus.reportDocument()" data-options="iconCls:'fa fa-table fa16px'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Report Document')) ?></div>
    <div onclick="reportCorpus.reportAnnotation()" data-options="iconCls:'fa fa-table fa16px'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Report Annotation')) ?></div>
    <div onclick="reportCorpus.exportCONLL()" data-options="iconCls:'fa fa-table fa16px'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Export CONLL')) ?></div>
</div>

<script type="text/javascript">
    var reportCorpus = {
        app: <?php echo LR\Filters::escapeJs($manager->getApp()) /* line 31 */ ?>,
        isMaster: <?php echo $data->isMaster /* line 32 */ ?>,
        node: null
    };
    $(function () {
        $('#reportCorpusLayout').layout({
            fit:true
        });

        reportCorpus.reloadCorpus = function () {
            $('#corpusTree').tree('reload');
        }

        reportCorpus.reportCorpus = function (id) {
            if ($.type(id) === "undefined") {
                id = reportCorpus.node.id.substr(1);
            }
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('report/corpus/reportCorpus')) /* line 48 */ ?> + '/' + id,'reportCorpusCenterPane');
        }

        reportCorpus.reportDocument = function (id) {
            if ($.type(id) === "undefined") {
                id = reportCorpus.node.id.substr(1);
            }
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('report/corpus/reportDocument')) /* line 55 */ ?> + '/' + id,'reportCorpusCenterPane');
        }

        reportCorpus.reportAnnotation = function (id) {
            if ($.type(id) === "undefined") {
                id = reportCorpus.node.id.substr(1);
            }
            manager.doAction('@report/corpus/reportAnnotation' + '/' + id);
        }

        reportCorpus.exportCONLL = function (id) {
            if ($.type(id) === "undefined") {
                id = reportCorpus.node.id.substr(1);
            }
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('utils/export/exportCONLL')) /* line 69 */ ?> + '/' + id,'reportCorpusCenterPane');
        }

        reportCorpus.contextReportMenu = function(e, node) {
            e.preventDefault();
            console.log(node);
            reportCorpus.node = node;
            var $menu = '';
            $(this).tree('select',node.target);
            if (node.id == 'root') {
                $menu = $('#menuReportRootCorpus');
            } else if (node.id.charAt(0) == 'c') {
                $menu = $('#menuReportCorpus');
            } else if (node.id.charAt(0) == 'd') {
                $menu = $('#menuReportDocument');
            }
            if ($menu != '') {
                $menu.menu('show',{
                    left: e.pageX,
                    top: e.pageY
                });
            }
        }

        $('#menuReportRootCorpus').menu({});
        $('#menuReportCorpus').menu({});
        $('#menuReportDocument').menu({});

        $('#corpus').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Corpus')) ?>,
            onClickButton: function() {
                $('#corpusTree').tree({queryParams: {corpus: $('#corpus').textbox('getValue')}});
            }
        });
        $('#document').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Document')) ?>,
            onClickButton: function() {
                $('#corpusTree').tree({queryParams: {document: $('#document').textbox('getValue')}});
            }
        });
        $('#corpusTree').tree({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('structure/corpus/corpusTree')) /* line 114 */ ?>,
            onContextMenu: reportCorpus.contextReportMenu
        });
    });
</script>
<?php
		return get_defined_vars();
	}

}
