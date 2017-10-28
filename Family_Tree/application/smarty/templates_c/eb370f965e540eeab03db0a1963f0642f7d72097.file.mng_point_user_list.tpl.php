<?php /* Smarty version Smarty-3.1.19, created on 2016-02-13 15:20:37
         compiled from "../../Photo_System/application/smarty/templates/mng_point_user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107133244056becb3508ae85-32482425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb370f965e540eeab03db0a1963f0642f7d72097' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/mng_point_user_list.tpl',
      1 => 1455343641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107133244056becb3508ae85-32482425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_userId_value' => 0,
    'search_userName_value' => 0,
    'optionsYear' => 0,
    'selectedYear' => 0,
    'optionsMonth' => 0,
    'selectedMonth' => 0,
    'optionsDay' => 0,
    'selectedDay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56becb350de219_81640019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56becb350de219_81640019')) {function content_56becb350de219_81640019($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/function.html_options.php';
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>法要アプリプレミアム版管理システム</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="robots" content="noindex,nofollow"> 
<meta name="author" content="株式会社デジタルスペースワウ" />
<link rel="stylesheet" type="text/css" media="all" href="../../css/default.css">
<link rel="stylesheet" type="text/css" media="all" href="../../css/layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/smoothness/jquery-ui-1.10.4.custom.min.css" />
<script type="text/javascript" src="../../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="../../js/pointuser-list.js"></script>
</head>
<body>
<div id="container">
<div id="main">
<?php echo $_smarty_tpl->getSubTemplate ("include/mng_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/jsng.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="jsok" style="display:none;">
<?php echo $_smarty_tpl->getSubTemplate ("include/mng_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="contents">
<h2>ポイント機能　利用者一覧</h2>
    <input id="update_reload_btn" class="btn" type="button" value="更新" />

<div id="pointUser_search">
<form id="search_user" method="get" action="../mng/searchpointuser">
    利用者検索&nbsp;
    <input id="userId_txtfld" type="text" name="search_userId" value="<?php echo $_smarty_tpl->tpl_vars['search_userId_value']->value;?>
" placeholder="ポイントIDを入力" />
    &nbsp;
    <input id="userName_txtfld" type="text" name="search_userName" value="<?php echo $_smarty_tpl->tpl_vars['search_userName_value']->value;?>
" placeholder="お名前を入力" />
    &nbsp;
    &nbsp;
    生年月日&nbsp;
    <?php echo smarty_function_html_options(array('name'=>'birthYear','options'=>$_smarty_tpl->tpl_vars['optionsYear']->value,'selected'=>$_smarty_tpl->tpl_vars['selectedYear']->value),$_smarty_tpl);?>
  年
    <?php echo smarty_function_html_options(array('name'=>'birthMonth','options'=>$_smarty_tpl->tpl_vars['optionsMonth']->value,'selected'=>$_smarty_tpl->tpl_vars['selectedMonth']->value),$_smarty_tpl);?>
 月
    <?php echo smarty_function_html_options(array('name'=>'birthDay','options'=>$_smarty_tpl->tpl_vars['optionsDay']->value,'selected'=>$_smarty_tpl->tpl_vars['selectedDay']->value),$_smarty_tpl);?>
   日
    <input id="search_btn" class="btn" type="submit" name="search" value="検索" />
    &nbsp;
    <input id="clear_btn" class="btn" type="submit" name="clear" value="条件解除" />
    &nbsp;
</form>
</div>

<div id="reload">
<?php echo $_smarty_tpl->getSubTemplate ('mng_point_user_list_reload.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><!-- reload -->
</div><!-- contents -->
</div><!-- jsok -->
</div><!-- main -->
<?php echo $_smarty_tpl->getSubTemplate ("include/mng_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><!-- container -->
</body>
</html>
<?php }} ?>
