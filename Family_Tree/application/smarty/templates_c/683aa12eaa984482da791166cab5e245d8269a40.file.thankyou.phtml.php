<?php /* Smarty version Smarty-3.1.19, created on 2015-06-26 20:29:36
         compiled from "../../BridalOrder/application/smarty/templates/thankyou.phtml" */ ?>
<?php /*%%SmartyHeaderCode:2104880983558d37a0103f84-22759923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '683aa12eaa984482da791166cab5e245d8269a40' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/thankyou.phtml',
      1 => 1435306226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2104880983558d37a0103f84-22759923',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_558d37a012b670_98853836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d37a012b670_98853836')) {function content_558d37a012b670_98853836($_smarty_tpl) {?><!DOCTYPE html>
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
  </div>
</nav>
    <div class="col-xs-8 col-xs-offset-2">
    	<div class="row">
    		<div class="col-xs-offset-1 col-xs-11">
    			<h2>オーダーを承りました</h2>
    		</div>
    	</div>
		<div class="row" style="margin-top:70px;">
			<div class="col-xs-offset-1 col-xs-11">
		    <h5　style="margin-top:30px;">
		    		衣裳アプリ更新のご用命を頂きありがとうございます。<br>
		    		<br>
		    		ご入力内容の確認メールを送信いたしましたので、ご確認ください。<br>
		    		万一メールが届いていない場合は、お手数をおかけしますが、下記までお電話にてご連絡ください。<br>
		    		<br>
		    	※配信予定日は、配信日（午前0時）の最短で24時間前までにオーダーお願いいたします。<br>
		  ※衣裳画像はオーダー翌日の午前10時までに、お知らせは配信予定日の午前10時までに更新完了となります。<br>
		    		<br>
		    		株式会社デジタルスペースワウ<br>
		    		022-727-0861<br>
				</h5>
			</div>
		</div>
        <div class="row" style="margin-top:40px;">
            <div class="col-xs-offset-1 col-xs-11">
                <a href="logout" class="btn btn-default active" role="button">ログアウト</a>
                &nbsp;&nbsp;
                <a href="toppage" class="btn btn-default active" role="button">続けてオーダーを入力する</a>
            </div>
        </div>
        &nbsp;
    </div>
</BODY>
</HTML>
<?php }} ?>
