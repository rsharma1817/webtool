<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/modules/admin/views/domain/main.html

use Latte\Runtime as LR;

class Template568695dc80 extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'toolbarList' => 'blockToolbarList',
		'controls' => 'blockControls',
		'list' => 'blockList',
		'toolbarData' => 'blockToolbarData',
		'form' => 'blockForm',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'title' => 'html',
		'toolbarList' => 'html',
		'controls' => 'html',
		'list' => 'html',
		'toolbarData' => 'html',
		'form' => 'html',
		'script' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		$this->renderBlock('toolbarList', get_defined_vars());
?>

<?php
		$this->renderBlock('controls', get_defined_vars());
?>

<?php
		$this->renderBlock('list', get_defined_vars());
?>

<?php
		$this->renderBlock('toolbarData', get_defined_vars());
?>

<?php
		$this->renderBlock('form', get_defined_vars());
?>


<?php
		$this->renderBlock('script', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		$this->parentName = $templateCRUD;
		
	}


	function blockTitle($_args)
	{
		?>Domain<?php
	}


	function blockToolbarList($_args)
	{
?>    <input id="inputSearch">
    <a id="btnAdd" href="#">New</a>
    <a id="massAction" href="javascript:void(0)">Mass Action</a>
<?php
	}


	function blockControls($_args)
	{
?><div id="menuInlineAction" class="menuInlineAction">
    <div onclick="domainHandler.actionUpdate()" data-options="iconCls:'icon-edit'">Edit</div>
    <div onclick="domainHandler.actionDelete()" data-options="iconCls:'icon-delete'">Delete</div>
</div>
<div id="menuMassAction" class="menuInlineAction">
    <div data-options="iconCls:'icon-delete'">Delete All</div>
</div>
<?php
	}


	function blockList($_args)
	{
?><table id="domainGrid"></table>
<?php
	}


	function blockToolbarData($_args)
	{
?>    <a id="btnSave" href="#">Save</a>
<?php
	}


	function blockForm($_args)
	{
?><form id="domainForm" method="post" data-loading>
    <input type="hidden" id="domain_idDomain" name="domain_idDomain">
    <div class="row">
        <input id="domain_entry" name="domain_entry">
    </div>
</form>
<?php
	}


	function blockScript($_args)
	{
		extract($_args);
?>
<script type="application/javascript">

    var domainHandler = {
        idGrid: '#domainGrid',
        urlGrid: "<?php echo $appURL /* line 44 */ ?>admin/domain/gridData",
        idCurrent: -1,
        actionAdd: function() {
            // $('#domainDialog').dialog('open');
            $('#commonLayoutTabs').tabs('select', 1);
        },
        actionUpdate: function() {
            $('#commonLayoutTabs').tabs('select', 1);
            //manager.doAction('^admin/domain/formObject/' + domainHandler.idCurrent);
            //$('#domainDialog').dialog('open');
            $('#domainForm').form('load', "<?php echo $appURL /* line 54 */ ?>admin/domain/formData/" + domainHandler.idCurrent);
        },
        actionDelete: function() {
            manager.doAction('^admin/domain/delete/' + domainHandler.idCurrent);
        },
        actionEntry: function (value) {
            manager.doAction("^structure/entry/formUpdate/" + value);
        },
        actionSave: function() {
            manager.doSubmit('domainForm', "<?php echo $appURL /* line 63 */ ?>admin/domain/save");
            $(domainHandler.idGrid).datagrid('reload');
        }

    }

    $(domainHandler.idGrid).datagrid({
        border:true,
        width:'100%',
        fitColumns: true,
        url: domainHandler.urlGrid,
        pagination: true,
        pageSize: 15,
        pageList: [5,10,15,20,30,50],
        checkOnSelect: false,
        frozenColumns: [[
            {"field":'ck',"checkbox":true},
            {"field":"inlineAction","title":"",width:'25px',fixed:true,formatter: function(value,row,index) {
                    return "<a href='#'>" + <?php echo LR\Filters::escapeJs($icon->carbon('overflow-menu', "icon-16 inlineAction")) /* line 81 */ ?> + "</a>";
                }}
        ]],
        columns: [[
            {"field":"idDomain","title":null,"hidden":true},
            {"field":"entry","title":"Entry",width:'50%',"hidden":false,formatter: function(value,row,index) {
                return "<a>" + value + "</a>";
            }},
        ]],
        onClickCell: function(index,field,value){
            if (field == 'entry') {
                domainHandler.actionEntry(value);
            }
            if (field == 'inlineAction') {
                var rows=$(domainHandler.idGrid).datagrid("getRows");
                var row = rows[index];
                domainHandler.idCurrent = row.idDomain;
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

    $('#menuInlineAction').menu({});

    $('#massAction').menubutton({
        menu: '#menuMassAction',
        plain: false
    });

    $('#inputSearch').textbox({
        buttonIcon: 'icon-search',
        iconAlign:'right',
        prompt: 'Search',
        onClickButton: function() {
            $(domainHandler.idGrid).datagrid('filter',$('#inputSearch').textbox('getValue'));
        }
    });

    $('#btnAdd').linkbutton({
        iconCls: 'icon-add',
        onClick: function() {
            domainHandler.actionAdd();
        }
    });

    $('#btnTest').linkbutton({
        iconCls: 'icon-add',
        onClick: function() {
            //manager.doAction('^admin/domain/formObject|dlgFormObject');
            console.log($('#domainGrid').datagrid('getChecked'));
        }
    });

    $('#btnDelete').linkbutton({
        iconCls: 'icon-remove',
        plain: true,
        onClick: function() {
            manager.doAction("<?php echo $appURL /* line 145 */ ?>admin/domain/delete");
        }
    });

    $('#btnSave').linkbutton({
        iconCls: 'icon-save',
        plain: false,
        onClick: function() {
            domainHandler.actionSave();
        }
    });

    $('#domain_entry').textbox({
        required: true,
        labelPosition: 'top',
        width: '100%',
        label:'Entry',
        validateOnBlur:true,
        validateOnCreate: false,
        err: manager.form.validationError
    })

</script>

<?php
	}

}
