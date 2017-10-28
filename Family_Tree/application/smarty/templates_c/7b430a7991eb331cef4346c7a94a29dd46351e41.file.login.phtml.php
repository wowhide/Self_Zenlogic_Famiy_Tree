<?php /* Smarty version Smarty-3.1.19, created on 2016-02-17 16:43:32
         compiled from "../../Photo_System/application/smarty/templates/login.phtml" */ ?>
<?php /*%%SmartyHeaderCode:185989002856be5c72d03535-86776098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b430a7991eb331cef4346c7a94a29dd46351e41' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/login.phtml',
      1 => 1455694995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185989002856be5c72d03535-86776098',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56be5c72d9a5d0_63144896',
  'variables' => 
  array (
    'caution' => 0,
    'defaultID' => 0,
    'isChecked' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56be5c72d9a5d0_63144896')) {function content_56be5c72d9a5d0_63144896($_smarty_tpl) {?><!DOCTYPE html>
<HTML lang="jp">
<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>衣装アプリ　更新オーダーシステム</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function clearForm() {
        document.loginForm.user_name.value = "";
        document.loginForm.password.value = "";
    }
    </script>
</HEAD>
<BODY>
    <br>
    <header class="container">
        <div id="title" class="text-center">
            <h1>
                スタジオフォトキューブ
                <br>
                <br>　Point_System
                <br>
            </h1>
        </div>
    </header>
    <br>
    <div class="text-center">
        &nbsp;
        <strong class="text-danger"><?php echo $_smarty_tpl->tpl_vars['caution']->value;?>
</strong>
        &nbsp;
    </div>
    <br>
    <div class="col-xs-4 col-xs-offset-4" style="background-color: #E1E1E1">
        <br>
        <form name="loginForm" class="form-horizontal" action="checkaccount" method="post" role="form">
            <div class="form-group">
                <label for="user_name" class="col-xs-3 control-label">ログインID</label>
                <div class="col-xs-9">
                    <input name="user_name" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['defaultID']->value;?>
" />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-xs-3 control-label">パスワード</label>
                <div class="col-xs-9">
                    <input name="password" class="form-control" type="password" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3">
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" <?php echo $_smarty_tpl->tpl_vars['isChecked']->value;?>
>ログインIDを記憶する
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3 form-inline">
                    <input name="login" class="form-control btn btn-default" type="submit" value="ログイン" />
                    &nbsp;&nbsp;
                    <input name="clear" class="form-control btn btn-default" type="button" value="クリア" onclick="clearForm();" />
                </div>
            </div>
        </form>
    </div>
</BODY>
</HTML>
<?php }} ?>
