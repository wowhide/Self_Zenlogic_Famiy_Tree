<?php /* Smarty version Smarty-3.1.19, created on 2016-02-13 07:19:39
         compiled from "../../Photo_System/application/smarty/templates/error.phtml" */ ?>
<?php /*%%SmartyHeaderCode:4049429156be5a7b6cc4e4-78581686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a2fb55ae3a96389f9f5d551a2ee55552c979cf' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/error.phtml',
      1 => 1455315502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4049429156be5a7b6cc4e4-78581686',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56be5a7b6f6f43_43688125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56be5a7b6f6f43_43688125')) {function content_56be5a7b6f6f43_43688125($_smarty_tpl) {?><!DOCTYPE html>
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

	<form style="margin-top:120px;"class="form-horizontal" name="order" action="confirm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        </div>
    </div>
    <div class="col-xs-8 col-xs-offset-2" style="background-color: #FFFFFF">
    	<div class="row">
    		<div class="col-xs-offset-1 col-xs-11">
    			<h3 class="text-danger" style="border-left: 5px solid #d9534f;
                padding:3px 10px 3px 10px">エラーが発生しました</h2>
    		</div>
    	</div>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-11">
		    	<h5> 
		    		ご迷惑をおかけして申し訳ありません。<br>
		    		ログインＩＤ･パスワードが異なります。<br>
		    		お手数をおかけしますが、下記の「ログインフォームへ」より、再度ログインお願いします。<br>
		    		
		    		<br>
		    		株式会社デジタルスペースワウ<br>
		    		022-727-0861<br>
				</h5>
			</div>
		</div>
        <div class="row">
            <div class="col-xs-offset-1 col-xs-11">
<!--                 <a href="logout" class="btn btn-default active" role="button">ログインページへ</a>
 -->            
       <a href="logout">ログインフォームへ</a>

 </div>
        </div>
        &nbsp;
	</div>
</BODY>
</HTML>
<?php }} ?>
