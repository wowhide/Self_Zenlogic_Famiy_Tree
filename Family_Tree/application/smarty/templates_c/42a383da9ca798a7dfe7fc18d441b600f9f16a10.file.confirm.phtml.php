<?php /* Smarty version Smarty-3.1.19, created on 2015-06-14 09:09:10
         compiled from "../../BridalOrder/application/smarty/templates/confirm.phtml" */ ?>
<?php /*%%SmartyHeaderCode:77545465154eacba064d375-43882959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42a383da9ca798a7dfe7fc18d441b600f9f16a10' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/confirm.phtml',
      1 => 1434203429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77545465154eacba064d375-43882959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eacba068c439_56696401',
  'variables' => 
  array (
    'bienname' => 0,
    'general_caution' => 0,
    'cosBlockOpt' => 0,
    'cosSchedule' => 0,
    'cosPicture' => 0,
    'noticeBlockOpt' => 0,
    'noticeSchedule' => 0,
    'noticeTitle' => 0,
    'noticeBody' => 0,
    'couponBlockOpt' => 0,
    'couponImage' => 0,
    'noticeURL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eacba068c439_56696401')) {function content_54eacba068c439_56696401($_smarty_tpl) {?><!DOCTYPE html>
<HTML lang="jp">
<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>衣裳アプリ　更新オーダーシステム</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/minilogo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    function backTopPage() {
        document.confirm.action = 'back';
    }
    </script>
</HEAD>
<BODY>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding:10px 10px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <a class="navbar-brand" href="#"> -->
      <a class="navbar-brand">
<div style="margin-top:-20px;">
        <img alt="Brand" src="../imges/rogo.png"></div>
      </a>
    </div>
<p class="navbar-text" style="font-size:20px;">ようこそ<span style="margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['bienname']->value;?>
様</span></a> </p>
  </div>
</nav>
     <div class="col-xs-8 col-xs-offset-2">
        <div class="col-xs-12" style="text-center">
            <h4 style="margin-top:120px;" class="text-center text-danger"><strong><?php echo $_smarty_tpl->tpl_vars['general_caution']->value;?>
&nbsp;</strong></h4>
        </div>
        <h2>オーダーのご確認</h2>
        <div <?php echo $_smarty_tpl->tpl_vars['cosBlockOpt']->value;?>
>
            <h3 style="border-left: 5px solid #FAA4D0;
                padding:3px 10px 3px 10px;">衣裳画像</h3>
        <!--     <div class="row">
                <h4 class="col-xs-11 col-xs-offset-1">配信予定日&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cosSchedule']->value;?>
</h4>
            </div> -->
            <div class="row">
                <h4 class="col-xs-11 col-xs-offset-1">衣裳画像</h4>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['cosPicture']->value;?>

        </div>
        <div <?php echo $_smarty_tpl->tpl_vars['noticeBlockOpt']->value;?>
>
            <h3 style="border-left: 5px solid #FAA4D0;
                padding:3px 10px 3px 10px;">お知らせ</h3>
            <div class="row">
                <h4 class="col-xs-11 col-xs-offset-1">配信予定日&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['noticeSchedule']->value;?>
</h4>
            </div>
            <div class="row">
                <h4 class="col-xs-11 col-xs-offset-1">タイトル&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['noticeTitle']->value;?>
</h4>
            </div>
            <div class="row">
                <h4 class="col-xs-11 col-xs-offset-1">本文</h4>
            </div>
            <div class="row">
                <h4 class="col-xs-10 col-xs-offset-2"><?php echo $_smarty_tpl->tpl_vars['noticeBody']->value;?>
</h4>
            </div>
            <div <?php echo $_smarty_tpl->tpl_vars['couponBlockOpt']->value;?>
>
                <div class="row">
                    <h4 class="col-xs-11 col-xs-offset-1">お知らせ画像</h4>
                </div>
                <?php echo $_smarty_tpl->tpl_vars['couponImage']->value;?>

            </div>

             <div class="row">
                <h4 class="col-xs-10 col-xs-offset-1">URL</h4>
            <div class="row">
                <h4 class="col-xs-10 col-xs-offset-2"><?php echo $_smarty_tpl->tpl_vars['noticeURL']->value;?>
</h4>
            </div>
        </div>


        </div>
        <br>
        <form class="form-horizontal" name="confirm" action="orderexec" method="post">
            <div class="form-group">
                <div class="form-inline col-xs-11 col-xs-offset-1">
                    <input class="form-control" type="submit" value="オーダーを送信"/>
                    &nbsp;&nbsp;
                    <input class="form-control" type="submit" value="戻る" onclick="backTopPage();" />
                </div>
            </div>
        </form>
    </BR>
</BODY>
</HTML>
<?php }} ?>
