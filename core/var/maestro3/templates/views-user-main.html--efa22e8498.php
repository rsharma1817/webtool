<?php
// source: C:\wamp64\www\webtool/apps/webtool/modules/auth/views/user\main.html

use Latte\Runtime as LR;

class Templateefa22e8498 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="authUserLayout" style="width:100%;height:100%;">
    <div id="authUserNorthPane" data-options="collapsible:false, region:'north', title:'<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'User')) ?>'" style="height:70px">
        <div style="float:left;padding:5px">
            <input id="login" name="login" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Login')) ?>">
        </div>
        <div style="float:left;padding:5px">
            <input id="name" name="name" type="text" style="width:200px; padding:5px" placeholder="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Search Name')) ?>">
        </div>
        <div style="float:left;padding:5px">
           <input id="status" name="Status" placeholder="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Status')) ?>">
        </div>
    </div>
    <div id="authUserLeftPane" region="west" split="true" style="height: 100%;width:200px">
        <ul id="authUserTree"></ul>
    </div>
    <div id="authUserCenterPane" region="center" style="height: 100%">
        
    </div>
</div>
<div id="authUserMenuMain" style="display:none;width:120px;">
    <div onclick="authUser.newUser()" data-options="iconCls:'icon-add'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'New User')) ?></div>
</div>
<div id="authUserMenuUser" style="display:none;width:120px;">
    <div onclick="authUser.preferences()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Preferences')) ?></div>
    <div onclick="authUser.authorize()" data-options="iconCls:'icon-edit'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Authorize')) ?></div>
    <div onclick="authUser.deleteUser()" data-options="iconCls:'icon-remove'"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Delete User')) ?></div>
</div>
<div id="dialogUser" title="User" style="padding:15px">
    <form class="form-horizontal" id="formUser" name="formUser" action="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($manager->getURL('auth/user/save'))) /* line 29 */ ?>">
        <input type="hidden" id="user_idUser" name="user_idUser" value="">
        <input type="hidden" id="user_active" name="user_active" value="">
        <div class="form-group">
            <div class="col-sm-12">
                <span>Authorization: </span><span id="user_status"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="sb_user_active">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="user_login" name="user_login">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="user_name" name="user_name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="user_nick" name="user_nick">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="user_email" name="user_email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input id="user_userLevel" name="user_userLevel">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var authUser = {
        app: <?php echo LR\Filters::escapeJs($manager->getApp()) /* line 72 */ ?>,
        isMaster: <?php echo $isMaster /* line 73 */ ?>,
        node: null
    };
    $(function () {
        $('#authUserLayout').layout({
            fit:true
        });

        authUser.showUser = function (id) {
            authUser.editUser(id);
        }
        authUser.newUser = function () {
            $('#authUserCenterPane').html('');
            $('#dialogUser').dialog('doLayout');
            $('#dialogUser').dialog('open');
        }

        authUser.editUser = function (id) {
            if ($.type(id) === "undefined") {
                id = authUser.node.id.substr(1);
            }
            var user = manager.doGetObject(<?php echo LR\Filters::escapeJs($manager->getURL('auth/user/get')) /* line 94 */ ?> + '/' + id);
            console.log(user);
            $('#user_idUser').attr('value', user.idUser);
            $('#user_login').textbox('setValue', user.login);
            $('#user_name').textbox('setValue', user.name);
            $('#user_email').textbox('setValue', user.email);
            $('#user_nick').textbox('setValue', user.nick);
            $('#user_active').attr('value', user.active);
            (user.active == 1) ? $('#sb_user_active').switchbutton('check') : $('#sb_user_active').switchbutton('uncheck');
            (user.status == '1') ? $("#user_status").html('Authorized') : $("#user_status").html('Not Authorized');
            $('#user_userLevel').combobox('setValue', user.userLevel);
            $('#authUserCenterPane').html('');
            $('#dialogUser').dialog('doLayout');
            $('#dialogUser').dialog('open');
        }

        authUser.authorize = function (id) {
            if ($.type(id) === "undefined") {
                id = authUser.node.id.substr(1);
            }
            $('#authUserCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('auth/user/authorize')) /* line 115 */ ?> + '/' + id,'authUserCenterPane');
        }

        authUser.deleteUser = function (id) {
            if ($.type(id) === "undefined") {
                id = authUser.node.id.substr(1);
            }
            $('#authUserCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('auth/user/delete')) /* line 123 */ ?> + '/' + id,'authUserCenterPane');
        }

        authUser.preferences = function (id) {
            if ($.type(id) === "undefined") {
                id = authUser.node.id.substr(1);
            }
            $('#authUserCenterPane').html('');
            manager.doGet(<?php echo LR\Filters::escapeJs($manager->getURL('auth/user/formPreferences')) /* line 131 */ ?> + '/' + id,'authUserCenterPane');
        }

        authUser.contextMenu = function(e, node) {
            e.preventDefault();
            console.log(node);
            authUser.node = node;
            var $menu = '';
            if (authUser.isMaster) {
                $(this).tree('select', node.target);
                if (node.id == 'root') {
                    $menu = $('#authUserMenuMain');
                } else if (node.id.charAt(0) == 'u') {
                    $menu = $('#authUserMenuUser');
                }
                if ($menu != '') {
                    $menu.menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    });
                }
            }
        }

        $('#authUserMenuMain').menu({});
        $('#authUserMenuUser').menu({});

        $('#login').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Login')) ?>,
            onClickButton: function() {
                $('#authUserTree').tree({queryParams: {login: $('#login').textbox('getValue')}});
            }
        });

        $('#name').textbox({
            buttonIcon: 'icon-search',
            iconAlign:'right',
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Search Name')) ?>,
            onClickButton: function() {
                $('#authUserTree').tree({queryParams: {name: $('#name').textbox('getValue')}});
            }
        });

        $('#status').combobox({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('auth/user/statusList')) /* line 177 */ ?>,
            prompt: <?php echo LR\Filters::escapeJs(call_user_func($this->filters->translate, 'Select Status')) ?>,
            onChange: function() {
                $('#authUserTree').tree({queryParams: {status: $('#status').combobox('getValue')}});
            }
        });

        $('#authUserTree').tree({
            url: <?php echo LR\Filters::escapeJs($manager->getURL('auth/user/tree')) /* line 185 */ ?>,
            queryParams: {status: $('#status').combobox('getValue')},
            onClick: function (node) {
                //console.log(node);
                if (node.id.charAt(0) == 'u') {
                    authUser.showUser(node.id.substr(1));
                }
            },
            onContextMenu: authUser.contextMenu
        });

        $('#user_login').textbox({width:300, label: 'Login', prompt:'Login'});
        $('#user_name').textbox({width:300, label: 'Name', prompt:'Name'});
        $('#user_email').textbox({width:300, label: 'email', prompt:'email'});
        $('#user_nick').textbox({width:200, label: 'Nick', prompt:'Nick'});
        $('#sb_user_active').switchbutton({
            width: 80,
            onText: 'active',
            offText: 'inactive',
            onChange: function(checked){
                $('#user_active').attr('value', (checked ? '1' : '0'));
            }
        });
        $('#user_userLevel').combobox({
            url:<?php echo LR\Filters::escapeJs($manager->getURL('apidata/getSelectionUserLevel')) /* line 209 */ ?>,
            width: 200,
            label: 'Level'
        });

        $('#dialogUser').dialog({
            modal:true,
            closed:true,
            toolbar:[
                {
                    text: 'Save',
                    iconCls: 'icon-save',
                    handler: function () {
                        manager.doPostBack('formUser');
                        $('#dialogUser').dialog('close');
                    }
                },
                {
                    text:'Close',
                    iconCls:'icon-cancel',
                    handler: function(){
                        $('#dialogUser').dialog('close');
                    }
            }],
            onClose: function() {
            }
        });

    });
</script>
<?php
		return get_defined_vars();
	}

}
