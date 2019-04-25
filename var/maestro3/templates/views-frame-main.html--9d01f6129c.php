<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/modules/structure/views/frame/main.html

use Latte\Runtime as LR;

class Template9d01f6129c extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'toolbarList' => 'blockToolbarList',
		'list' => 'blockList',
		'tabData1' => 'blockTabData1',
		'toolbarData' => 'blockToolbarData',
		'form' => 'blockForm',
		'north' => 'blockNorth',
		'left' => 'blockLeft',
		'controls' => 'blockControls',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'title' => 'html',
		'toolbarList' => 'html',
		'list' => 'html',
		'tabData1' => 'html',
		'toolbarData' => 'html',
		'form' => 'html',
		'north' => 'html',
		'left' => 'html',
		'controls' => 'html',
		'script' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		$this->renderBlock('toolbarList', get_defined_vars());
?>

<?php
		$this->renderBlock('list', get_defined_vars());
?>

<?php
		$this->renderBlock('tabData1', get_defined_vars());
?>





<?php
		$this->renderBlock('north', get_defined_vars());
		$this->renderBlock('left', get_defined_vars());
?>

<?php
		$this->renderBlock('controls', get_defined_vars());
?>

<?php
		$this->renderBlock('script', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		$this->parentName = $templateStructure;
		
	}


	function blockTitle($_args)
	{
		?>Frames<?php
	}


	function blockToolbarList($_args)
	{
		extract($_args);
		?>    <input id="idDomain" name="domain" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Domain')) ?>" styles="height:30px">
    <input id="frame" name="frame" type="text" style="width:200px; padding:5px" placeholder="Search Frame">
    <input id="fe" name="fe" type="text" style="width:200px; padding:5px" placeholder="Search FE">
    <input id="lu" name="lu" type="text" style="width:200px; padding:5px" placeholder="Search LU">
<?php
	}


	function blockList($_args)
	{
?><table id="frameGrid"></table>
<?php
	}


	function blockTabData1($_args)
	{
		extract($_args);
?>
<div id="commonLayoutTabData" class="tabCRUD" title="Data">
    <div id="commonLayoutTabDataPane" style="width:100%;height:100%;">
        <div id="commonLayoutTabDataPaneNorth" class="dataCRUDToolbar"
             data-options="collapsible:false, region:'north', title:''">
            <?php
		$this->renderBlock('toolbarData', get_defined_vars());
?>
        </div>
        <div id="commonLayoutTabDataPaneCenter" class="dataCRUD" region="center" style="height: 100%">
            <div class="containerForm">
                <?php
		$this->renderBlock('form', get_defined_vars());
		?>                <?php echo $page->fetchThemeComponent('cv-loading',['idLoadingDiv' => 'bxLoadingForm']) /* line 25 */ ?>

            </div>
        </div>
    </div>
</div>
<?php
	}


	function blockToolbarData($_args)
	{
		
	}


	function blockForm($_args)
	{
		
	}


	function blockNorth($_args)
	{
		
	}


	function blockLeft($_args)
	{
?><ul id="framesTree"></ul>
<?php
	}


	function blockControls($_args)
	{
		extract($_args);
?>

<div id="menuRootFrames" style="display:none, width:120px;">
    <div onclick="structure.reloadFrame()" data-options="iconCls:'icon-reload'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Reload Frames')) ?></div>
    <div onclick="structure.newFrame()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New Frame')) ?></div>
</div>
<div id="menuFrame" style="display:none, width:120px;">
    <div onclick="structure.editFrame()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Entry')) ?></div>
    <div onclick="structure.editEntry()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Frame')) ?></div>
    <div onclick="structure.deleteFrame()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Frame')) ?></div>
    <div onclick="structure.newFrameElement()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New FrameElement')) ?></div>
    <div onclick="structure.newLU()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New LU')) ?></div>
    <div onclick="structure.createTemplate()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Create Template from Frame')) ?></div>
    <div onclick="structure.frameDomain()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Domains')) ?></div>
    <div onclick="structure.frameStatus()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Status')) ?></div>
    <div onclick="structure.frameSemanticType()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Semantic Types')) ?></div>
</div>
<div id="menuFrameAnno" style="display:none, width:120px;">
    <div onclick="structure.newLU()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New LU')) ?></div>
</div>
<div id="menuFrameElement" style="display:none, width:120px;">
    <div onclick="structure.editFrameElement()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit FrameElement')) ?></div>
    <div onclick="structure.editEntry()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit Entry')) ?></div>
    <div onclick="structure.deleteFrameElement()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete FrameElement')) ?></div>
    <div onclick="structure.feAddConstraint()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Add Constraint')) ?></div>
</div>
<div id="menuFrameConstraint" style="display:none, width:120px;">
    <div onclick="structure.feDeleteConstraint()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Constraint')) ?></div>
</div>
<div id="menuLU" style="display:none, width:120px;">
    <div onclick="structure.editLU()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit LU')) ?></div>
    <div onclick="structure.deleteLU()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete LU')) ?></div>
    <div onclick="structure.luAddConstraint()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Add Constraint')) ?></div>
    <div onclick="structure.importWS()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Import WS')) ?></div>
</div>
<div id="menuLUAnno" style="display:none, width:120px;">
    <div onclick="structure.editLU()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Edit LU')) ?></div>
    <div onclick="structure.deleteLU()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete LU')) ?></div>
</div>
<div id="menuLUConstraint" style="display:none, width:120px;">
    <div onclick="structure.luDeleteConstraint()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete Constraint')) ?></div>
</div>
<div id="menuSubCorpus" style="display:none, width:120px;">
    <div onclick="structure.deleteSubCorpus()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete SubCorpus')) ?></div>
</div>

<?php
	}


	function blockScript($_args)
	{
		extract($_args);
?>

<script type="text/javascript">
    $(function () {

        var handler = {
            idGrid: '#frameGrid',
            urlGrid: "api/structure/Frame/frameTreeGrid",
            idCurrent: -1,
            actionAdd: function() {
                // $('#domainDialog').dialog('open');
                $('#commonLayoutTabs').tabs('select', 1);
            },
            actionUpdate: function() {
                $('#commonLayoutTabs').tabs('select', 1);
                //manager.doAction('^admin/domain/formObject/' + domainHandler.idCurrent);
                //$('#domainDialog').dialog('open');
                $('#domainForm').form('load', "<?php echo $appURL /* line 107 */ ?>admin/domain/formData/" + domainHandler.idCurrent);
            },
            actionDelete: function() {
                manager.doAction('^admin/domain/delete/' + domainHandler.idCurrent);
            },
            actionEntry: function (value) {
                manager.doAction("^structure/entry/formUpdate/" + value);
            },
            actionSave: function() {
                manager.doSubmit('domainForm', "<?php echo $appURL /* line 116 */ ?>admin/domain/save");
                $(domainHandler.idGrid).datagrid('reload');
            }

        }

        $('#frameGrid').treegrid({
            url: handler.urlGrid,
            idField:'id',
            treeField:'text',
            border:true,
            width:'100%',
            fitColumns: true,
            url: handler.urlGrid,
            pagination: true,
            pageSize: 15,
            pageList: [5,10,15,20,30,50],
            checkOnSelect: false,
            frozenColumns: [[
                {"field":"inlineAction","title":"",width:'25px',fixed:true,formatter: function(value,row,index) {
                        return "<a href='#'>" + <?php echo LR\Filters::escapeJs($icon->carbon('overflow-menu', "icon-16 inlineAction")) /* line 136 */ ?> + "</a>";
                    }}
            ]],
            columns: [[
                {"field":"idFrame","title":null,"hidden":true},
                {"field":"text","title":"Name",width:'25%'},
                {"field":"definition","title":"Definition",width:'70%'},
            ]],
            onClickCell: function(index,field,value){
                if (field == 'inlineAction') {
                    var rows=$(domainHandler.idGrid).datagrid("getRows");
                    var row = rows[index];
                    frameHandler.idCurrent = row.idDomain;
                    var e = window.event;
                    $('#menuInlineAction').menu('show',{
                        left:e.pageX,
                        top:e.pageY
                    });
                }
            },
            onBeforeSelect: function(index,row) {
                return false;
            }
        });


/*


        var structure = {
            app: 'webtool',
            isMaster: "<?php echo $data->isMaster /* line 167 */ ?>",
            isAnno: "<?php echo $data->isAnno /* line 168 */ ?>",
            node: null,
            get: function (url, id) {
                $('#commonLayoutCenterPane').html('');
                manager.doGet("<?php echo $appURL /* line 172 */ ?>" + url + '/' + id, 'commonLayoutCenterPane');
            },
            lu: {
                show: function (idLU) {
                    structute.get("report/lu/showLU", idLU);
                },
                new: function (idFrame) {
                    if ($.type(idFrame) === "undefined") {
                        idFrame = structure.node.id.substr(1);
                    }
                    $('#commonLayoutCenterPane').html('');
                    manager.doAction('^' + structure.app + '/structure/frame/formNewLU' + '/' + idFrame);
                },
                edit: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formUpdateLU", id);
                },
                delete: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formDeleteLU", id);
                },
                addConstraint: function (idLU) {
                    console.log(structure.nodeSelected);
                    if ($.type(idLU) === "undefined") {
                        idLU = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formAddConstraintLU", idLU);
                },
                deleteConstraint: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formDeleteConstraintLU", id);
                }
            },
            frame: {
                show: function (id) {
                    structure.get("report/frame/showFrame", id);
                },
                new: function () {
                    structure.get("structure/frame/formNewFrame");
                },
                edit: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formUpdateFrame", id);
                },
                delete: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formDeleteFrame", id);
                },
                reload: function () {
                    $('#commonLayoutCenterPane').html('');
                    var node = $('#framesTree').tree('getSelected');
                    if (node) {
                        $('#framesTree').tree('reload', node.target);
                    }
                },
                reloadParent: function () {
                    $('#commonLayoutCenterPane').html('');
                    var node = $('#framesTree').tree('getSelected');
                    var parent = $('#framesTree').tree('getParent', node.target);
                    if (node) {
                        $('#framesTree').tree('reload', parent.target);
                    }
                },
                semanticType: function (id) {
                    structure.get("structure/frame/formFrameSemanticType", id);
                },
                domain: function (id) {
                    structure.get("structure/frame/formFrameDomain", id);
                },
                status: function (id) {
                    structure.get("structure/frame/formFrameStatus", id);
                },
            },
            relations: {
                edit: function (entry) {
                    if ($.type(entry) === "undefined") {
                        entry = structure.node.entry;
                    }
                    manager.doAction('^' + structure.app + '/structure/frame/formNewFrameRelations/' + entry);
                }
            },
            entry: {
                edit: function (entry, form) {
                    if ($.type(entry) === "undefined") {
                        entry = structure.node.entry;
                    }
                    manager.doAction('^' + structure.app + '/structure/entry/formUpdate/' + entry);
                    if (form) {
                        $('#' + form + '_dialog').dialog('close');
                    }
                }
            },
            frameElement: {
                new: function (idFrame) {
                    if ($.type(idFrame) === "undefined") {
                        idFrame = structure.node.id.substr(1);
                    }
                    $('#commonLayoutCenterPane').html('');
                    manager.doGet({
                    {
                        ('structure/frame/formNewFrameElement')
                    }
                }
                    +'/' + idFrame, 'commonLayoutCenterPane'
                )
                    ;
                },
                edit: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formUpdateFrameElement", id);
                },
                delete: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formDeleteFrameElement", id);
                },
                addConstraint: function (idFE) {
                    if ($.type(idFE) === "undefined") {
                        idFE = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formAddConstraintFE", idFE);
                },
                deleteConstraint: function (id) {
                    if ($.type(id) === "undefined") {
                        id = structure.node.id.substr(1);
                    }
                    structure.get("structure/frame/formDeleteConstraintFE", id);
                }
            },
            deleteSubCorpus: function (id) {
                if ($.type(id) === "undefined") {
                    id = structure.node.id.substr(1);
                }
                structure.get("structure/frame/formDeleteSubCorpus", id);
            },
            importWS: function (id) {
                if ($.type(id) === "undefined") {
                    id = structure.node.id.substr(1);
                }
                structure.get("structure/frame/formImportWS", id);
            },
            createTemplate: function (idFrame) {
                if ($.type(idFrame) === "undefined") {
                    idFrame = structure.node.id.substr(1);
                }
                manager.doAction('^' + structure.app + '/structure/frame/createTemplate' + '/' + idFrame);
            },
            contextMenuFrame: function (e, node) {
                e.preventDefault();
                console.log(node);
                structure.node = node;
                var $menu = '';
                if (structure.isMaster) {
                    $(this).tree('select', node.target);
                    if (node.id == 'root') {
                        $menu = $('#menuRootFrames');
                    } else if (node.id.charAt(0) == 'f') {
                        $menu = $('#menuFrame');
                    } else if (node.id.charAt(0) == 'e') {
                        $menu = $('#menuFrameElement');
                    } else if (node.id.charAt(0) == 'l') {
                        $menu = $('#menuLU');
                    } else if (node.id.charAt(0) == 's') {
                        $menu = $('#menuSubCorpus');
                    } else if (node.id.charAt(0) == 'x') {
                        $menu = $('#menuFrameConstraint');
                    } else if (node.id.charAt(0) == 'y') {
                        $menu = $('#menuLUConstraint');
                    }
                    if ($menu != '') {
                        $menu.menu('show', {
                            left: e.pageX,
                            top: e.pageY
                        });
                    }
                } else if (structure.isAnno) {
                    $(this).tree('select', node.target);
                    console.log('isAnno');
                    if (node.id.charAt(0) == 'f') {
                        $menu = $('#menuFrameAnno');
                    } else if (node.id.charAt(0) == 'l') {
                        $menu = $('#menuLUAnno');
                    } else {
                        return;
                    }
                    if ($menu != '') {
                        $menu.menu('show', {
                            left: e.pageX,
                            top: e.pageY
                        });
                    }
                }
            }

        };

        $('#menuRootFrames').menu({});
        $('#menuFrame').menu({});
        $('#menuFrameElement').menu({});
        $('#menuLU').menu({});
        $('#menuSubCorpus').menu({});
        $('#menuFrameConstraint').menu({});
        $('#menuLUConstraint').menu({});
        $('#menuFrameAnno').menu({});
        $('#menuLUAnno').menu({});

        $('#lu').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign: 'right',
            prompt: "Search LU",
            onClickButton:
                function () {
                    $('#framesTree').tree({queryParams: {lu: $('#lu').textbox('getValue')}});
                }
        })
        $('#fe').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign: 'right',
            prompt: "Search FE",
            onClickButton:
                function () {
                    $('#framesTree').tree({queryParams: {fe: $('#fe').textbox('getValue')}});
                }
        })
        $('#frame').textbox({
            //buttonText:<?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search')) ?>,
            buttonIcon: 'icon-search',
            iconAlign: 'right',
            prompt: "Search Frame",
            onClickButton:
                function () {
                    $('#framesTree').tree({queryParams: {frame: $('#frame').textbox('getValue')}});
                }
        })

        $('#idDomain').combobox({
            data: JSON.parse({{
            $data - > domain
        }
    }),
        prompt: {
            {
                _
                'Select Domain'
            }
        }
    ,
        valueField:'idDomain',
            textField
    :
        'name',
            onSelect
    :

        function () {
            $('#framesTree').tree({queryParams: {idDomain: $('#idDomain').combobox('getValue')}});
        }

    ,
        onChange: function () {
            $('#framesTree').tree({queryParams: {idDomain: $('#idDomain').combobox('getValue')}});
        }
    })
        ;

        $('#framesTree').tree({
            url: 'structure/frame/frameTree',
            onClick: function (node) {
                console.log(node);
                if (node.id.charAt(0) == 'f') {
                    structure.frame.show(node.id.substr(1));
                }
                if (node.id.charAt(0) == 'l') {
                    structure.frame.show(node.id.substr(1));
                }
            },
            onContextMenu: structure.contextMenuFrame
        })
*/

    })
</script>

<?php
	}

}
