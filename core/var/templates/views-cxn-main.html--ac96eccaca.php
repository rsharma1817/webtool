<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/structure/views/cxn\main.html

use Latte\Runtime as LR;

class Templateac96eccaca extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="structureLayout" style="width:100%;height:100%;">
    <div id="structureNorthPane" data-options="collapsible:false, region:'north', title:'<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Constructions')) ?>'" style="height:70px">
        <div style="float:left;padding:5px">
            <input id="idDomain" name="domain" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Domain')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="cxn" name="cxn" type="text" style="width:200px; padding:5px" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search CxN')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="ce" name="ce" type="text" style="width:200px; padding:5px" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search CE')) ?>">
        </div>
        <div style="float:left;padding:5px">
            Only Active:
            <input id="active" name ="active" style="width:200px;height:30px">
        </div>
    </div>
    <div id="structureLeftPane" region="west" split="true" style="height: 100%">
        <ul id="cxnTree"></ul>
    </div>
    <div id="structureCenterPane" region="center" style="height: 100%">
        
    </div>
</div>
<div id="menuRootCxns" style="display:none, width:120px;">
    <div onclick="structure.reloadCxn()" data-options="iconCls:'icon-reload'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Reload Cxns')) ?></div>
    <div onclick="structure.newCxn()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New Cxn')) ?></div>
</div>
<div id="menuCxn" style="display:none, width:120px;">
    <div onclick="structure.editCxn()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Cxn')) ?></div>
    <div onclick="structure.editEntry()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Entries')) ?></div>
    <div onclick="structure.deleteCxn()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Cxn')) ?></div>
    <div onclick="structure.newCxnElement()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New CxnElement')) ?></div>
    <div onclick="structure.addConstraint()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Add Constraint')) ?></div>
    <div onclick="structure.cxnDomain()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Domains')) ?></div>
    <div onclick="structure.importTxt()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Import Txt')) ?></div>
    <div onclick="structure.viewGraph()" data-options="iconCls:'icon-more'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'View Graph')) ?></div>
</div>
<div id="menuCxnElement" style="display:none, width:120px;">
    <div onclick="structure.editCxnElement()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit CxnElement')) ?></div>
    <div onclick="structure.editEntry()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Entries')) ?></div>
    <div onclick="structure.deleteCxnElement()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete CxnElement')) ?></div>
    <div onclick="structure.addConstraint()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Add Constraint')) ?></div>
</div>
<div id="menuCxnConstraint" style="display:none, width:120px;">
    <div onclick="structure.addConstraint()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Add Constraint')) ?></div>
    <div onclick="structure.deleteConstraint()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Constraint')) ?></div>
</div>
<div id="menuCxnDelConstraint" style="display:none, width:120px;">
    <div onclick="structure.deleteConstraint()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Constraint')) ?></div>
</div>


<style>
    /****
    Flags by language name (description on table Language)
     */
    .fnbrFlagPortuguese {
        width:16px;
        height:16px;
        background: url(<?php echo $manager->getStaticURL($manager->getApp(), 'images/br.png') /* line 60 */ ?>) no-repeat center center;
    }

    .fnbrFlagEnglish {
        width:16px;
        height:16px;
        background: url(<?php echo $manager->getStaticURL($manager->getApp(), 'images/en.png') /* line 66 */ ?>) no-repeat center center;
    }

    .fnbrFlagSwedish {
        width:16px;
        height:16px;
        background: url(<?php echo $manager->getStaticURL($manager->getApp(), 'images/se.png') /* line 72 */ ?>) no-repeat center center;
    }
</style>

<script type="text/javascript">
    var structure = {
        app: <?php echo LR\Filters::escapeJs($manager->getApp()) /* line 78 */ ?>,
        isMaster: <?php echo $data->isMaster /* line 79 */ ?>,
        nodeSelected: null,
        nodeSelectedParent: null,
        node: null
    };
    $(function () {
        $('#structureLayout').layout({
            fit:true
        });

        structure.showCxn = function (idCxn) {
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('report/cxn/showCxn')) /* line 91 */ ?> + '/' + idCxn, 'structureCenterPane');
        }

        structure.newCxn = function () {
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formNewCxn')) /* line 96 */ ?>,'structureCenterPane');
        }

        structure.editCxn = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formUpdateCxn')) /* line 104 */ ?> + '/' + id,'structureCenterPane');
        }
        
        structure.deleteCxn = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formDeleteCxn')) /* line 112 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.reloadCxn = function () {
            $('#structureCenterPane').html('');
            var node = $('#cxnTree').tree('getSelected');
            if (node) {
                if (node.id == 'root') {
                    $('#cxnTree').tree({queryParams: {cxn: ''}});
                } else {
                    $('#cxnTree').tree('reload', node.target);
                }
            }
        }

        structure.reloadCxnParent = function () {
            $('#structureCenterPane').html('');
            console.log(structure.nodeSelected);
            if (structure.nodeSelected == null) {
                var node = $('#cxnTree').tree('getSelected');
                structure.nodeSelected = node;
                structure.nodeSelectedParent = $('#cxnTree').tree('getParent', node.target);
            }
            console.log(structure.nodeSelectedParent);
            if (structure.nodeSelectedParent) {
                $('#cxnTree').tree('reload', structure.nodeSelectedParent.target);
            }
        }

        structure.editEntry = function (entry, form) {
            if ($.type(entry) === "undefined") {
                entry = structure.node.entry;
            }
            manager.doAction('^' + structure.app + '/structure/entry/formUpdate/' + entry);
            if (form) {
                $('#' + form + '_dialog').dialog('close');
            }
        }

        structure.newCxnElement = function (idCxn) {
            if ($.type(idCxn) === "undefined") {
                idCxn = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formNewCxnElement')) /* line 156 */ ?> + '/' + idCxn,'structureCenterPane');
        }

        structure.editCxnElement = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formUpdateCxnElement')) /* line 164 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.deleteCxnElement = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formDeleteCxnElement')) /* line 172 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.importTxt = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formImportTxt')) /* line 180 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.viewGraph = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/graphCxn')) /* line 188 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.addConstraint = function (id) {
            console.log(structure.nodeSelected);
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            if (structure.node.id.charAt(0) == 'c') {
                manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formAddConstraintCX')) /* line 198 */ ?> + '/' + id,'structureCenterPane');
            }
            if (structure.node.id.charAt(0) == 'e') {
                manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formAddConstraintCE')) /* line 201 */ ?> + '/' + id,'structureCenterPane');
            }
            if (structure.node.id.charAt(0) == 'x') {
                manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formAddConstraintCN')) /* line 204 */ ?> + '/' + id,'structureCenterPane');
            }
        }

        structure.constraints = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formConstraint')) /* line 213 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.deleteConstraint = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formDeleteConstraint')) /* line 221 */ ?> + '/' + id,'structureCenterPane');
        }

        structure.cxnDomain = function (id) {
            if ($.type(id) === "undefined") {
                id = structure.node.id.substr(1);
            }
            $('#structureCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/formCxnDomain')) /* line 229 */ ?> + '/' + id,'structureCenterPane');
        }


        structure.contextMenuFrame = function(e, node) {
            if (!structure.isMaster) {
                return;
            }
            e.preventDefault();
            console.log(node);
            structure.node = node;
            var $menu = '';
            $(this).tree('select',node.target);
            if (node.id == 'root') {
                $menu = $('#menuRootCxns');
            } else if (node.id.charAt(0) == 'c') {
                $menu = $('#menuCxn');
            } else if (node.id.charAt(0) == 'e') {
                $menu = $('#menuCxnElement');
            } else if (node.id.charAt(0) == 'x') {
                $menu = $('#menuCxnConstraint');
            } else if (node.id.charAt(0) == 'n') {
                $menu = $('#menuCxnDelConstraint');
            }
            if ($menu != '') {
                $menu.menu('show',{
                    left: e.pageX,
                    top: e.pageY
                });
            }
        }

        $('#menuRootCxns').menu({});
        $('#menuCxn').menu({});
        $('#menuCxnElement').menu({});
        $('#menuCxnConstraint').menu({});
        $('#menuCxnDelConstraint').menu({});

        $('#ce').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search CE')) ?>,
            onClickButton: function() {
                $('#cxnTree').tree({queryParams: {ce: $('#ce').textbox('getValue')}});
            }
        });
        $('#cxn').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Cxn')) ?>,
            onClickButton: function() {
                $('#cxnTree').tree({queryParams: {cxn: $('#cxn').textbox('getValue')}});
            }
        });
        $('#active').switchbutton({
                checked: false,
                onText:'Yes',
                offText:'No',
                height: 20,
                width: 50,
                onChange: function(checked){
                    $('#cxnTree').tree({
                        queryParams: {
                            cxn: $('#cxn').textbox('getValue'),
                            ce: $('#ce').textbox('getValue'),
                            active: (checked ? '1' : '0')
                        }
                    });
                }
        })

        $('#idDomain').combobox({
            data: JSON.parse(<?php echo LR\Filters::escapeJs($data->domain) /* line 301 */ ?>),
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Select Domain')) ?>,
            valueField:'idDomain',
            textField:'name',
            onSelect: function() {
                $('#cxnTree').tree({queryParams: {idDomain: $('#idDomain').combobox('getValue')}});
            },
            onChange: function() {
                $('#cxnTree').tree({queryParams: {idDomain: $('#idDomain').combobox('getValue')}});
            }
        });

        $('#cxnTree').tree({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('structure/cxn/cxnTree')) /* line 314 */ ?>,
            onClick: function (node) {
                console.log(node);
                if (node.id.charAt(0) == 'c') {
                    structure.showCxn(node.id.substr(1));
                }
            },
            onContextMenu: structure.contextMenuFrame
        });
    });
</script>
<?php
		return get_defined_vars();
	}

}
