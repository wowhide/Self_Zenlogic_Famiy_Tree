<?php /* Smarty version Smarty-3.1.19, created on 2015-06-04 15:30:14
         compiled from "../../BridalOrder/application/smarty/templates/orderresultzero.phtml" */ ?>
<?php /*%%SmartyHeaderCode:601725844556db284479d37-97742630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2f49558edbb2dd270f4c23fe087791484ce300e' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/orderresultzero.phtml',
      1 => 1433398624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '601725844556db284479d37-97742630',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_556db28452ab93_52366151',
  'variables' => 
  array (
    'email' => 0,
    'now' => 0,
    'all' => 0,
    'total' => 0,
    'firstItemNumber' => 0,
    'lastItemNumber' => 0,
    'pagesInRange' => 0,
    'page' => 0,
    'entries' => 0,
    'entry' => 0,
    'entriescount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556db28452ab93_52366151')) {function content_556db28452ab93_52366151($_smarty_tpl) {?><!DOCTYPE html>
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
<style type="text/css">      
body {
      background-image: url(../imges/bk_menu_top.jpg);
       background-position: center center;
       background-repeat: no-repeat;
       background-size: cover;
       background-attachment: fixed;
  }

hr.line {

border: 1px #e6e6e6 solid;

}

  </style>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</HEAD>
<BODY>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding:10px 10px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
<div style="margin-top:-20px;">
        <img alt="Brand" src="../imges/rogo.png"></div>
      </a>
    </div>
    <p class="navbar-text" style="font-size:20px;">ようこそ<span style="margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様</span></a> </p>
<a href="pwtoppage" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:50px; margin-right:20px;">戻る</a>
  </div>
</nav>

    <!-- Begin page content -->
    <div class="container" style="margin-top:80px;">
      <div class="page-header">
        <h3>ご注文履歴</h3>
      </div>
      <h4 style="margin-top:30px;">ご注文履歴はありません。

      </h4>
      <div style="margin-top:40px;">


    <!--   <p>**件中**件表示しています<span style="margin-left:30px;"></p>
 -->

<!--  <p class="page" style="font-size:18px;"><?php echo $_smarty_tpl->tpl_vars['now']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['all']->value;?>
ページ　<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
件中<?php echo $_smarty_tpl->tpl_vars['firstItemNumber']->value;?>
～<?php echo $_smarty_tpl->tpl_vars['lastItemNumber']->value;?>
件を表示</p>
<p class="page">
<?php  $_smarty_tpl->tpl_vars["page"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["page"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagesInRange']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["page"]->key => $_smarty_tpl->tpl_vars["page"]->value) {
$_smarty_tpl->tpl_vars["page"]->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['now']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&nbsp;&nbsp;
    <?php } else { ?>
        <a href="#"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>&nbsp;&nbsp;
    <?php }?>
<?php } ?>
</p>
 -->
<!-- <ul>
<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['entries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['entry']->value['id'];?>
<?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_day'];?>
<?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_title'];?>
<?php echo $_smarty_tpl->tpl_vars['entry']->value['created'];?>
</li>
<?php } ?>
</ul>
 -->
<div style="margin-top:30px;">


</div>
<!-- <p><?php echo $_smarty_tpl->tpl_vars['entriescount']->value;?>
</p>
 -->      
</div>
    </div>

    </div>
<script>
$(function() {
    $('.deleteLink').click(function() {
        if (confirm("削除してもよろしいですか？")) {
            $.post('deletedata', {
                id: $(this).data('id')
            }, function(rs) {
                $('#entry_' + rs).fadeOut(800);
            });
        }
    });
});
</script>
</BODY>
</HTML>
<?php }} ?>
