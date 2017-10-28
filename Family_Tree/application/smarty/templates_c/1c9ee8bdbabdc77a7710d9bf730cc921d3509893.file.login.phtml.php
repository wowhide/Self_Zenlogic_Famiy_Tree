<?php /* Smarty version Smarty-3.1.19, created on 2015-03-02 15:26:21
         compiled from "../../BridalOrder/application/smarty/templates/login.phtml" */ ?>
<?php /*%%SmartyHeaderCode:178562624454eaca03d9b5e5-45035413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c9ee8bdbabdc77a7710d9bf730cc921d3509893' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/login.phtml',
      1 => 1425277574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178562624454eaca03d9b5e5-45035413',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaca03dcd980_88867477',
  'variables' => 
  array (
    'caution' => 0,
    'defaultID' => 0,
    'isChecked' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaca03dcd980_88867477')) {function content_54eaca03dcd980_88867477($_smarty_tpl) {?><!DOCTYPE html>
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
                BIEN VEIL<br>
                <small>BRIDAL COSTUME</small>
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
