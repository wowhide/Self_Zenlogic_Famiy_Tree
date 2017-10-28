<?php /* Smarty version Smarty-3.1.19, created on 2016-02-13 13:27:05
         compiled from "../../Photo_System/application/smarty/templates/pwchange.phtml" */ ?>
<?php /*%%SmartyHeaderCode:183959743556beb0991560d2-07431674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57d54c42c3811ff723890836ee2a80d0b752c00' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/pwchange.phtml',
      1 => 1455315502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183959743556beb0991560d2-07431674',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pw' => 0,
    'bienname' => 0,
    'general_caution' => 0,
    'notice_URL_caution' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56beb0991c8450_40212600',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56beb0991c8450_40212600')) {function content_56beb0991c8450_40212600($_smarty_tpl) {?><!DOCTYPE html>
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
<script type="text/javascript">
 function errorcheck(){
var nowpw = '<?php echo $_smarty_tpl->tpl_vars['pw']->value;?>
';
var kara ='';


if (form1.text1.value != form1.text2.value) {
  document.getElementById("cation").innerHTML="新しいパスワードと確認用パスワードが違います"
  return false;
  
}else if(form1.nowtext.value != nowpw){
    document.getElementById("nowcation").innerHTML="現在のパスワードが正しくありません"
    return false;

    }else if(form1.text1.value == kara && form1.text2.value == kara){
    document.getElementById("cation").innerHTML="現在のパスワードを入力してください"
    return false;

    }




    else{
        return true;

    }

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
<!-- <a href="logout" class="btn btn-default navbar-btn">Log out</a> -->
 <p class="navbar-text" style="font-size:20px;">ようこそ<span style="margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['bienname']->value;?>
様</span></a> </p>
 <!-- <button class="btn btn-default navbar-text navbar-right" > <a href="logout" class="navbar-link">Log out</a></button>
 -->                <a href="logout" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">ログアウト</a>

  </div>

</nav>
    <div class="col-xs-8 col-xs-offset-2">
        <div class="col-xs-12" style="text-center">
            <h4 class="text-center text-danger"><strong><?php echo $_smarty_tpl->tpl_vars['general_caution']->value;?>
&nbsp;</strong></h4>
        </div>
        <form id="form1" style="margin-top:120px;"class="form-horizontal" name="order" action="passchange" method="post" enctype="multipart/form-data" onsubmit="return errorcheck();">
           
            <h3 style="border-left: 5px solid #FAA4D0;
                padding:3px 10px 3px 10px; margin-top:20px;">ログインパスワードの変更</h3>

                  <div class="col-xs-12">
                                <p style="margin-top:20px; margin-left:60px;">4〜16文字の半角英数「0〜9,A〜Z,a〜z」が指定可能です。</p>


            </div>
              <div class="col-xs-12">
                                <p style="margin-left:60px; margin-bottom:30px;">英字の大文字と小文字は区別されますのでご注意ください。</p>


            </div>

          <hr class="line" style="margint-top:20px;">
               
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">現在のパスワード</label>
                <div class="col-xs-4">
                    <input class="form-control" type="text" name="nowpassword" id="nowtext">
                </div>
                <strong class="col-xs-4 text-danger" id="nowcation"></strong>
             </div>
            
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">新しいパスワード</label>
                <div class="col-xs-4">
                    <input class="form-control" type="password" name="newpassword" id="text1">
                </div>
                <strong class="col-xs-4 text-danger" id="cation"></strong>

           </div>

              <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1"></label>
                <div class="col-xs-8">
                    <label>確認のため、新しいパスワードをもう一度入力してください。</label>
                </div>
                
            </div>






             <div class="form-group" style="margin-top:-20px;">
                <label class="control-label col-xs-2 col-xs-offset-1"></label>
                <div class="col-xs-4">
                    <input class="form-control" type="password" name="newpasswordkakunin" id="text2">
                </div>
<!--                 <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['notice_URL_caution']->value;?>
</strong>
 -->            </div>
            <div class="form-group" style="margin-top:30px;">
<!--                 <div class="col-xs-9 col-xs-offset-3 form-inline">
 -->
                <label class="control-label col-xs-2 col-xs-offset-1"></label>
                                <div class="col-xs-2 form-inline">

 　　　　　　　　　　　　
 <input name="pwchan" class="form-control btn btn-default" type="submit" value="上記内容で更新" id="send"/ style="marign-right:50px; margin-top:-30px;">
  </div>

  <div class="col-xs-2 form-inline" style="margin-left:30px;">
                         <a href="pwtoppage" class="btn btn-default" role="button">キャンセル</a>
                        </div>
               </div>
          
        </form>
    </div>
</BODY>
</HTML>
<?php }} ?>
