<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/annotation/views/main\sentences.html

use Latte\Runtime as LR;

class Template92c816184d extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		?><form id="formNotifySupervisor" method="post" action=<?php echo LR\Filters::escapeHtmlAttrUnquoted(LR\Filters::safeUrl($manager->getURL('annotation/main/notifySupervisor'))) /* line 1 */ ?>>
    <input type="hidden" id="asForSupervisor" name="asForSupervisor" value="">
</form>

<form id="formChangeStatus" method="post" action=<?php echo LR\Filters::escapeHtmlAttrUnquoted(LR\Filters::safeUrl($manager->getURL('annotation/main/changeStatusAS'))) /* line 5 */ ?>>
    <input type="hidden" id="asToChange" name="asToChange" value="">
    <input type="hidden" id="asNewStatus" name="asNewStatus" value="">
</form>

<table id="annotationSet"  style="width:100%" >
    <thead>
    <tr>
        <th data-options="field:'idAnnotationSet', hidden:true">idAnnotationSet</th>
        <th data-options="field:'chkSentence'" checkbox="true"></th>
        <th data-options="field:'idSentence',sortable:true" width="9%">idSentence</th>
        <th data-options="field:'text' <?php
		if (($data->userLanguage == 'ar')) {
			?>, align:'right' <?php
		}
?>" width="81%">Sentence</th>
        <th data-options="field:'status',sortable:true,formatter:asColorBox" width="10%">Status</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">
    function asColorBox(value,row,index) {
        return "<span class='fa fa-square' style='width:16px;color:#" + row['rgbBg'] + "'></span><span>" + row['status'] + "</span>";
    }

    $(function () {

        annotation.idSubCorpus = <?php echo LR\Filters::escapeJs($data->idSubCorpus) /* line 29 */ ?>;

        annotation.toolbarAS = [
            {
                text:'Notify Supervisor',
                iconCls:'fa fa-share-square-o fa16px',
                handler: function(){
                    var data = JSON.stringify(annotation.annotationSets);
                    $('#asForSupervisor').val(data);
                    manager.doPostBack('formNotifySupervisor');
                }
            },
            {
                text:'Selecteds > IGNORE',
                iconCls:'fa fa-ban fa16px',
                handler: function(){
                    var as = [];
                    var checked = $('#annotationSet').datagrid('getChecked');
                    $.each(checked, function(index, row) {
                        as[as.length] = row.idAnnotationSet;
                    });
                    var data = JSON.stringify(as);
                    $('#asToChange').val(data);
                    $('#asNewStatus').val('ast_ignore');
                    manager.doPostBack('formChangeStatus');
                }
            },
            {
                text:'Selecteds > DOUBT',
                iconCls:'fa fa-frown-o fa16px',
                handler: function(){
                    var as = [];
                    var checked = $('#annotationSet').datagrid('getChecked');
                    $.each(checked, function(index, row) {
                        as[as.length] = row.idAnnotationSet;
                    });
                    var data = JSON.stringify(as);
                    $('#asToChange').val(data);
                    $('#asNewStatus').val('ast_doubt');
                    manager.doPostBack('formChangeStatus');
                }
            }
        ];

        annotation.toolbarASMaster = [
            {
                text:'Selecteds > IGNORE',
                iconCls:'fa fa-ban fa16px',
                handler: function(){
                    var as = [];
                    var checked = $('#annotationSet').datagrid('getChecked');
                    $.each(checked, function(index, row) {
                        as[as.length] = row.idAnnotationSet;
                    });
                    var data = JSON.stringify(as);
                    $('#asToChange').val(data);
                    $('#asNewStatus').val('ast_ignore');
                    manager.doPostBack('formChangeStatus');
                }
            },
            {
                text:'Selecteds > DOUBT',
                iconCls:'fa fa-frown-o fa16px',
                handler: function(){
                    var as = [];
                    var checked = $('#annotationSet').datagrid('getChecked');
                    $.each(checked, function(index, row) {
                        as[as.length] = row.idAnnotationSet;
                    });
                    var data = JSON.stringify(as);
                    $('#asToChange').val(data);
                    $('#asNewStatus').val('ast_doubt');
                    manager.doPostBack('formChangeStatus');
                }
            }

        ];

        $('#annotationSet').datagrid({
            title: <?php echo LR\Filters::escapeJs($data->title) /* line 108 */ ?>,
            singleSelect: true,
            //collapsible: true,
            fit: true,
            nowrap: false,
            checkOnSelect: false,
            selectOnCheck: false,
            idField: 'idAnnotationSet',
            toolbar: annotation.isMaster ? annotation.toolbarASMaster : annotation.toolbarAS,
            url: <?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/annotationSet')) /* line 117 */ ?> + '/' + <?php
		echo LR\Filters::escapeJs($data->idSubCorpus) /* line 117 */ ?>,
            method: 'get',
            onSelect: function (rowIndex, rowData) {
                $('#layersPane').html('');
                console.log(rowData);
                window.open(<?php echo LR\Filters::escapeJs($manager->getURL('annotation/main/annotation')) /* line 122 */ ?> + '/' + rowData.idSentence + '/' + rowData.idAnnotationSet + '/' + annotation.type, '_blank');
            }
        });
    });
</script>
<?php
		return get_defined_vars();
	}

}
