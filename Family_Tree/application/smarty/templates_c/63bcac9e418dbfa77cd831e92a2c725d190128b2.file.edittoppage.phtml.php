<?php /* Smarty version Smarty-3.1.19, created on 2015-06-07 00:07:46
         compiled from "../../BridalOrder/application/smarty/templates/edittoppage.phtml" */ ?>
<?php /*%%SmartyHeaderCode:211375291556eb5aca99aa7-07064958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63bcac9e418dbfa77cd831e92a2c725d190128b2' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/edittoppage.phtml',
      1 => 1433603238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211375291556eb5aca99aa7-07064958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_556eb5acb73b60_31507757',
  'variables' => 
  array (
    'email' => 0,
    'general_caution' => 0,
    'notice_title' => 0,
    'notice_day_year' => 0,
    'notice_year_array' => 0,
    'notice_day_month' => 0,
    'notice_month_array' => 0,
    'notice_day_day' => 0,
    'notice_day_array' => 0,
    'notice_note' => 0,
    'noticeBlockOpt' => 0,
    'noticeImage' => 0,
    'notice_url' => 0,
    'numberid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556eb5acb73b60_31507757')) {function content_556eb5acb73b60_31507757($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/photo-cube/photoappli.com/library/Smarty/libs/plugins/function.html_options.php';
?><!DOCTYPE html>
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

  td{
    margin-left: 20px;
    width: 200px;
  }
  </style>  


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
<!-- <a href="logout" class="btn btn-default navbar-btn">Log out</a> -->
<p class="navbar-text" style="font-size:20px;">ようこそ<span style="margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様</span></a> </p>
<!-- <button class="btn btn-default navbar-text navbar-right" > <a href="logout" class="navbar-link">Log out</a></button>
 -->             
     <a href="logout" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">ログアウト</a>

    <a href="pwchange" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">パスワード変更</a>

    <a href="orderrireki" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">注文履歴</a>

  </div>

</nav>
    <div class="col-xs-8 col-xs-offset-2">
        <div class="col-xs-12" style="text-center">
            <h4 class="text-center text-danger"><strong><?php echo $_smarty_tpl->tpl_vars['general_caution']->value;?>
&nbsp;</strong></h4>
        </div>
        <form style="margin-top:90px;"class="form-horizontal" action="editdatasend" method="post" enctype="multipart/form-data">
      

    <!-- Begin page content -->
    <div class="container" style="margin-top:80px;">
   
        <h3>注文履歴の編集</h3>
   
      <h5 style="margin-top:30px;">*パソコンでは入力できない旧漢字の文字や環境依存文字は使用できませんのでご了承ください。</h5>

      <h5 style="margin-top:30px;">*アップロードした画像の変更はできません。画像変更をご希望のお客様は注文履歴を削除し、もう一度ご注文をお願いします。</h5>

  
    </div>

<table class="table" style="margin-top:50px; margin-rights:50px;">
<!-- <tr>
    <th>衣裳画像</th>  <td colspan=3><?php echo $_smarty_tpl->tpl_vars['notice_title']->value;?>
</td>
</tr> -->
<tr>
    <th>お知らせ配信予定日</th>


    <td><div class="form-group">
    <label class="col-sm-2 control-label" for="noticeday_month">年:</label>
    <div class="col-sm-7">
<select name="notice_year" class="form-control" value = <?php echo $_smarty_tpl->tpl_vars['notice_day_year']->value;?>
>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['notice_day_year']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_year_array']->value,'selected'=>$_tmp1),$_smarty_tpl);?>

                    </select>
                        </div>
  </div>
  </td>


   <td><div class="form-group">
    <label class="col-sm-2 control-label" for="noticeday_month">月:</label>
    <div class="col-sm-7">
<select name="notice_month" class="form-control"><?php echo $_smarty_tpl->tpl_vars['notice_day_month']->value;?>

                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['notice_day_month']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_month_array']->value,'selected'=>$_tmp2),$_smarty_tpl);?>

                    </select>
                    </div>
  </div>
  </td>

  <td><div class="form-group">
    <label class="col-sm-2 control-label" for="noticeday_day">日:</label>
    <div class="col-sm-7">
<select name="notice_day" class="form-control" value = <?php echo $_smarty_tpl->tpl_vars['notice_day_day']->value;?>
>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['notice_day_day']->value;?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_day_array']->value,'selected'=>$_tmp3),$_smarty_tpl);?>

                    </select>    </div>
  </div>
  </td>
</tr>
<tr>
    <th>お知らせタイトル</th>  <td colspan=3><input type="text" class="form-control" name="notice_title" value = <?php echo $_smarty_tpl->tpl_vars['notice_title']->value;?>
></td>
</tr>
<tr>
    <th>お知らせ本文</th>  <td colspan=3><textarea class="form-control" rows="3" name="notice_note"><?php echo $_smarty_tpl->tpl_vars['notice_note']->value;?>
</textarea></td>
</tr>
<div <?php echo $_smarty_tpl->tpl_vars['noticeBlockOpt']->value;?>
>
 <tr>
    <th>お知らせ画像</th>  <td colspan=3><?php echo $_smarty_tpl->tpl_vars['noticeImage']->value;?>
</td>
</tr> 
</div>
<tr>
    <th>お知らせURL</th>  <td colspan=3><input type="text" class="form-control" name="notice_url" value = <?php echo $_smarty_tpl->tpl_vars['notice_url']->value;?>
></td>
</tr>


</table>

<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['numberid']->value;?>
">

<div class="form-group" style="margin-top:30px;">
                <div class="col-xs-9 col-xs-offset-3 form-inline">
                    <input class="form-control" type="button" value="戻る" onClick="history.back(); return false;">


                    <input class="form-control" type="submit" value="編集" style="margin-left:50px;" />

           </div>
           


        </form>
    </div>
</BODY>
</HTML>
<?php }} ?>
