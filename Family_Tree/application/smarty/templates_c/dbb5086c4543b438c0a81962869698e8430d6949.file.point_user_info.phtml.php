<?php /* Smarty version Smarty-3.1.19, created on 2016-02-17 16:50:01
         compiled from "../../Photo_System/application/smarty/templates/point_user_info.phtml" */ ?>
<?php /*%%SmartyHeaderCode:36984052256c26b2a2867f2-31717388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb5086c4543b438c0a81962869698e8430d6949' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/point_user_info.phtml',
      1 => 1455695395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36984052256c26b2a2867f2-31717388',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56c26b2a335e21_65004657',
  'variables' => 
  array (
    'search_userId_value' => 0,
    'pointUser' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c26b2a335e21_65004657')) {function content_56c26b2a335e21_65004657($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<HTML lang="jp">
<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>スタジオフォトキューブ　ポイント管理システム</title>

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
       background-position: center center;
       background-repeat: no-repeat;
       background-size: cover;
       background-attachment: fixed;
  }

hr.line {

border: 1px #e6e6e6 solid;

}

.deleteLink {
    color: #d9534f;
    cursor: pointer;
}

  </style>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
function check(){

  if(window.confirm('削除してよろしいですか？')){ // 確認ダイアログを表示

    return true; // 「OK」時は送信を実行

  }
  else{ // 「キャンセル」時の処理

    window.alert('キャンセルされました'); // 警告ダイアログを表示
    return false; // 送信を中止

  }

}
</script>
</HEAD>
<BODY>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding:10px 10px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
<div style="margin-top:-20px;"></div>
      </a>
    </div>
<p class="navbar-text" style="font-size:20px;">スタジオフォトキューブ_ポイント管理システム</span></p>
<a href="toppage" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:50px; margin-right:20px;">戻る</a>
  </div>
</nav>

    <!-- Begin page content -->
    <div class="container" style="margin-top:80px;">
      <div class="page-header">
        <h3>ポイント機能　利用者情報</h3>
      </div>
        <form style="margin-top:20px;"class="form-horizontal" name="order" action="confirm" method="post" enctype="multipart/form-data">
            <div style="margin-top:20px;">
                <h3 style="border-left: 5px solid #f0ad4e;
                padding:3px 10px 3px 10px;">利用者検索</h3>
            </div>

            <div class="form-group">
                利用者検索&nbsp;
                  <input id="userId_txtfld" type="text" name="search_userId" value="<?php echo $_smarty_tpl->tpl_vars['search_userId_value']->value;?>
" placeholder="ポイントIDを入力" />
                  &nbsp;
                  <input id="search_btn" class="btn" type="submit" name="search" value="検索" />
                  &nbsp;
            </div> 
        </form>
      </h4>
      <div style="margin-top:40px;">


      <div class="row">
      <div style="margin-top:30px;">
      <div class="col-md-6">
          <table class="table table-condensed">
          <!-- お客様情報テーブル -->
          <h4>お客様情報</h4>
              <tr>
                <th>ポイントID</th>
                <td><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
</td>
              </tr>
              <tr>
                <th>お名前</th>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserName()=='') {?>
                未登録
                <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserName();?>
&nbsp;様
                <?php }?>
                </td>
              </tr>
              <tr>
                <th>生年月日</th>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday()=="0000-00-00") {?>
                未登録
                <?php } else { ?>
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday(),"%Y/%m/%d");?>

                <?php }?>
                </td>
              </tr>
              <tr>
                <th>住所</th>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserPostalcode()!='') {?>
                  〒<?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserPostalcode();?>
<br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserAddress()=='') {?>
                  未登録
                <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserAddress();?>

                <?php }?>
                </td>
              </tr>
              <tr>
                <th>TEL</th>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserTel()=='') {?>
                  未登録
                <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserTel();?>

                <?php }?>
                </td>
              </tr>
          </table>

          <table class="table table-condensed">
          <!-- 保有ポイントテーブル -->
              <tr>
                <th style="font-size:20px;">保有ポイント</th>
                <td style="font-size:40px;"><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getPoint();?>
</td>
              </tr>            
          </table>
       <a class="btn btn-warning" href="../orderpage/disppointuserlist">　戻　る　</a>

      </div><!-- col-md-6（左側） -->

      <div class="col-md-1"></div><!-- col-md-1(中央) -->

      <div class="col-md-5">
          <!-- ポイントを増やす -->
          <h4>ポイントを増やす</h4>
              <form class="form-inline">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail3">ポイントを増やす</label>
                  <input type="email" class="form-control" id="exampleInputEmail3" placeholder="ポイントを増やす">
                </div>
                <button type="submit" class="btn btn-default">増やす</button>
              </form>

          <!-- ポイントを使う -->
          <h4 style="margin-top:30px;">ポイントを使う</h4>
              <form class="form-inline">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail3">ポイントを使う</label>
                  <input type="email" class="form-control" id="exampleInputEmail3" placeholder="ポイントを使う">
                </div>
                <button type="submit" class="btn btn-default">使う</button>
              </form>
          
          <!-- ポイント履歴 -->
          <table class="table table-condensed">
          <h4 style="margin-top:30px;">ポイント履歴</h4>
              <tr>
                <th>日時</th>
                <th>履歴種別</th>
                <th>ポイント履歴</th>
                <th></th>
              </tr>
              <tr>
                <td>未登録<!-- <?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_day'];?>
 --></td>
                <td>未登録<!-- <?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_day'];?>
 --></td>
                <td>未登録<!-- <?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_day'];?>
 --></td>
                <td><a class="btn_mini" href="#">削除</a><!-- <?php echo $_smarty_tpl->tpl_vars['entry']->value['notice_day'];?>
 --></td>
              </tr>
          </table>


      </div><!-- col-md-5（右側） -->
      </div><!-- row -->
      </div>
</div>
</div>
</div>

</BODY>
</HTML>
<?php }} ?>
