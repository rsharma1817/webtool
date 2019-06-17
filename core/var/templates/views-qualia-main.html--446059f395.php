<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/structure/views/qualia\main.html

use Latte\Runtime as LR;

class Template446059f395 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="structureLayout" style="width:100%;height:100%;">
    <div id="structureNorthPane" data-options="collapsible:false, region:'north', title:'<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Qualia')) ?>'" style="height:70px">
        <div style="float:left;padding:5px">
           <input id="idQualiaType" name="idQualiaType" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Qualia Type')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="frame" name="frame" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Frame')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="fe" name="fe" type="text" style="width:200px; padding:5px" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search FE')) ?>">
        </div>
        <div style="float:left;padding:5px" class=""clearfix">
            <input id="lu" name="lu" type="text" style="width:200px; padding:5px" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search LU')) ?>">
        </div>
    </div>
    <div id="structureLeftPane" region="west" split="true" style="height: 100%">
        <ul id="framesTree"></ul>
    </div>
    <div id="structureCenterPane" region="center" style="height: 100%">
        
    </div>
</div>
<div id="menuQualiaRootFrames" style="display:none, width:120px;">
    <div onclick="structure.reloadFrame()" data-options="iconCls:'icon-reload'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Reload Frames')) ?></div>
    <div onclick="structure.showStructure()" data-options="iconCls:'icon-more'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Show Structure')) ?></div>
    <div onclick="structure.showRelations()" data-options="iconCls:'icon-more'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Show Relations')) ?></div>
</div>
<div id="menuQualiaFrame" style="display:none, width:120px;">
    <div onclick="structure.frameQualiaFormal()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Formal')) ?></div>
    <div onclick="structure.frameQualiaAgentive()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Agentive')) ?></div>
    <div onclick="structure.frameQualiaTelic()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Telic')) ?></div>
    <div onclick="structure.frameQualiaConstitutive()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Constitutive')) ?></div>
</div>
<div id="menuQualiaLU" style="display:none, width:120px;">
    <div onclick="structure.luQualiaFormal()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Formal')) ?></div>
    <div onclick="structure.luQualiaAgentive()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Agentive')) ?></div>
    <div onclick="structure.luQualiaTelic()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Telic')) ?></div>
    <div onclick="structure.luQualiaConstitutive()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Constitutive')) ?></div>
</div>
<div id="menuQualiaQualia" style="display:none, width:120px;">
    <div onclick="structure.frameDeleteQualia()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Qualia')) ?></div>
</div>
<div id="menuQualiaQualiaRelation" style="display:none, width:120px;">
    <div onclick="structure.luChangeQualia()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Change Qualia Structure')) ?></div>
    <div onclick="structure.luDeleteQualia()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Qualia Relation')) ?></div>
</div>
<div id="menuQualiaElement" style="display:none, width:120px;">
    <div onclick="structure.qualiaChangeElement()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Change Element')) ?></div>
</div>

<?php
		/* line 51 */
		$this->createTemplate($manager->getThemePath('css/graph.css'), $this->params, "include")->renderToContentType('html');
?>

<script type="text/javascript">
    var idCenterPane = "structureCenterPane";
    var structure = {
        app: <?php echo LR\Filters::escapeJs($manager->getApp()) /* line 56 */ ?>,
        isMaster: <?php echo $data->isMaster /* line 57 */ ?>,
        isAnno: <?php echo $data->isAnno /* line 58 */ ?>,
        node: null
    };
    $(function () {
        $('#structureLayout').layout({
            fit:true
        });

        structure.currentParent = null;

        structure.showStructure = function () {
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('report/qualia/showStructure')) /* line 70 */ ?>, 'structureCenterPane');
        }

        structure.showRelations = function () {
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('report/qualia/showRelations')) /* line 75 */ ?>, 'structureCenterPane');
        }

        structure.reloadFrame = function () {
            $('#structureCenterPane').html('');
            var node = $('#framesTree').tree('getSelected');
            if (node) {
                $('#framesTree').tree('reload', node.target);
            }
        }

        structure.reloadParent = function () {
            $('#structureCenterPane').html('');
            var node = $('#framesTree').tree('getSelected') || structure.node;
            console.log(node);
            if (node) {
                $('#framesTree').tree('select', node.target);
                var parent = $('#framesTree').tree('getParent', node.target) || structure.currentParent;
                structure.currentParent = parent;
                console.log(parent);
                if (parent) {
                    $('#framesTree').tree('reload', parent.target);
                }
            }
        }

        // Qualia

        structure.frameQualiaFormal = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formQualiaFormal')) /* line 108 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.frameQualiaAgentive = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formQualiaAgentive')) /* line 116 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.frameQualiaTelic = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formQualiaTelic')) /* line 124 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.frameQualiaConstitutive = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formQualiaConstitutive')) /* line 132 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.frameDeleteQualia = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formDeleteQualia')) /* line 140 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luQualiaFormal = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formLUQualiaFormal')) /* line 148 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luQualiaAgentive = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formLUQualiaAgentive')) /* line 156 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luQualiaTelic = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formLUQualiaTelic')) /* line 164 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luQualiaConstitutive = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formLUQualiaConstitutive')) /* line 172 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luChangeQualia = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formChangeQualiaStructure')) /* line 180 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.luDeleteQualia = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formDeleteQualiaRelation')) /* line 188 */ ?> + '/' + id,'structureCenterPane');
        }


        structure.qualiaChangeElement = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/formQualiaChangeElement')) /* line 197 */ ?> + '/' + id,'structureCenterPane');
        }
        // end Qualia


        structure.contextMenuQualia = function(e, node) {
            e.preventDefault();
            console.log(node);
            structure.node = node;
            var $menu = '';
            if (structure.isMaster) {
                $(this).tree('select', node.target);
                if (node.id == 'root') {
                    $menu = $('#menuQualiaRootFrames');
                } else if (node.id.charAt(0) == 'f') {
                    $menu = $('#menuQualiaFrame');
                } else if (node.id.charAt(0) == 'l') {
                    $menu = $('#menuQualiaLU');
                } else if (node.id.charAt(0) == 'q') {
                    $menu = $('#menuQualiaQualia');
                } else if (node.id.charAt(0) == 'y') {
                    $menu = $('#menuQualiaQualiaRelation');
                } else if (node.id.charAt(0) == 'e') {
                    $menu = $('#menuQualiaElement');
                }
                if ($menu != '') {
                    $menu.menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    });
                }
            }
        }

        $('#menuQualiaRootFrames').menu({});
        $('#menuQualiaFrame').menu({});
        $('#menuQualiaLU').menu({});
        $('#menuQualiaQualia').menu({});
        $('#menuQualiaQualiaRelation').menu({});
        $('#menuQualiaElement').menu({});

        $('#lu').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search LU')) ?>,
            onClickButton: function() {
                $('#framesTree').tree({queryParams: {lu: $('#lu').textbox('getValue')}});
            }
        });
        $('#fe').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search FE')) ?>,
            onClickButton: function() {
                $('#framesTree').tree({queryParams: {fe: $('#fe').textbox('getValue')}});
            }
        });
        $('#frame').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Frame')) ?>,
            onClickButton: function() {
                $('#framesTree').tree({queryParams: {frame: $('#frame').textbox('getValue')}});
            }
        });

        $('#idQualiaType').combobox({
            data: JSON.parse(<?php echo LR\Filters::escapeJs($data->qualiaType) /* line 267 */ ?>),
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Select Qualia Type')) ?>,
            valueField:'idQualiaType',
            textField:'name',
            onSelect: function() {
                $('#framesTree').tree({queryParams: {idQualiaType: $('#idQualiaType').combobox('getValue')}});
            },
            onChange: function() {
                $('#framesTree').tree({queryParams: {idQualiaType: $('#idQualiaType').combobox('getValue')}});
            }
        });

        $('#framesTree').tree({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('structure/qualia/frameTree')) /* line 280 */ ?>,
            onClick: function (node) {
                console.log(node);
                if (node.id.charAt(0) == 'f') {
                    structure.showFrame(node.id.substr(1));
                }
                if (node.id.charAt(0) == 'l') {
                    structure.showLU(node.id.substr(1));
                }
            },
            onContextMenu: structure.contextMenuQualia
        });
    });
</script>
<?php
		return get_defined_vars();
	}

}
