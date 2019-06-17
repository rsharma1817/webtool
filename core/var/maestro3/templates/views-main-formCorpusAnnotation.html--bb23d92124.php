<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/annotation/views/main\formCorpusAnnotation.html

use Latte\Runtime as LR;

class Templatebb23d92124 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="annoLayout" style="width:100%;height:100%;">
    <div id="annoLeftPane" region="west" split="true" title="Corpus" style="height: 100%">
        <div style="padding:5px">
            <input id="corpus" name="corpus" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Corpus')) ?>">
        </div>
        <div style="padding:5px">
            <input id="idSentence" name="idSentence" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, '#sentence')) ?>">
        </div>
        <ul id="corpusTree"></ul>
    </div>
    <div id="annoCenterPane" region="center" title="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Corpus Annotation')) ?>" style="height: 100%">
        <div class="easyui-layout" style="width:100%;height:100%;">
            <div id="sentencesPane" region="center" style="width:100%;height:100%"   split="true" data-options="border:1"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var annotation = {
        type: 'c',
        isMaster: <?php echo $data->isMaster /* line 21 */ ?>,
        isSenior: <?php echo $data->isSenior /* line 22 */ ?>,
        rgbColors: <?php echo $data->colors /* line 23 */ ?>,
        layerType: <?php echo $data->layerType /* line 24 */ ?>,
        instantiationType: <?php echo $data->instantiationType /* line 25 */ ?>,
        instantiationTypeObj: <?php echo $data->instantiationTypeObj /* line 26 */ ?>

    };

    annotation.showDocument = function (document) {
        $('#layersPane').html('');
        manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/sentences')) /* line 31 */ ?> + '/' + document,'sentencesPane');
    }

    annotation.showSubCorpus = function (subCorpus) {
        $('#layersPane').html('');
        manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/sentences')) /* line 36 */ ?> + '/' + subCorpus,'sentencesPane');
    }

    $(function () {

        $('#annoLayout').layout({
            fit:true
        });
        
        $('#corpus').textbox({
            buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Corpus')) ?>,
            //iconCls:'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Corpus')) ?>,
            onClickButton: function() {
                $('#corpusTree').tree({queryParams: {corpus: $('#corpus').textbox('getValue')}});
            }
        });

        $('#idSentence').textbox({
            buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Annotate Sentence')) ?>,
            //iconCls:'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, '#sentence')) ?>,
            onClickButton: function() {
                var idSentence = $('#idSentence').textbox('getValue');
                window.open(<?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/annotation')) /* line 62 */ ?> + '/' + idSentence + '/0/' + annotation.type, '_blank');
            }
        });

        $('#corpusTree').tree({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/corpusTree')) /* line 67 */ ?>,
            onSelect: function (node) {
                console.log(node);
                if (node.id.charAt(0) == 'd') {
                    annotation.showDocument(node.id);
                }
            }
        });
    });
</script>
<?php
		return get_defined_vars();
	}

}
