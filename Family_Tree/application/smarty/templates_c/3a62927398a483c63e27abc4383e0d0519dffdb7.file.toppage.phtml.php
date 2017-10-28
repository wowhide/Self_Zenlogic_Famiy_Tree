<?php /* Smarty version Smarty-3.1.19, created on 2016-02-17 16:44:42
         compiled from "../../Photo_System/application/smarty/templates/toppage.phtml" */ ?>
<?php /*%%SmartyHeaderCode:35421540356beb086786207-99704533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a62927398a483c63e27abc4383e0d0519dffdb7' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/toppage.phtml',
      1 => 1455694997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35421540356beb086786207-99704533',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56beb086891f76_16814991',
  'variables' => 
  array (
    'general_caution' => 0,
    'search_userId_value' => 0,
    'search_userName_value' => 0,
    'optionsYear' => 0,
    'selectedYear' => 0,
    'optionsMonth' => 0,
    'selectedMonth' => 0,
    'optionsDay' => 0,
    'selectedDay' => 0,
    'now' => 0,
    'all' => 0,
    'total' => 0,
    'firstItemNumber' => 0,
    'lastItemNumber' => 0,
    'pagesInRange' => 0,
    'page' => 0,
    'pointUserList' => 0,
    'pointUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56beb086891f76_16814991')) {function content_56beb086891f76_16814991($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<HTML lang="jp">
<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フォトキューブ　ポイント管理システム</title>

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
/*      background-image: url(../imges/bk_menu_top.jpg);
*/       background-position: center center;
       background-repeat: no-repeat;
       background-size: cover;
       background-attachment: fixed;
  }
  </style>  

    <script type="text/javascript">
    function clearForm() {
        ans = confirm("入力内容をクリアします。\nよろしいですか？");
        if(ans == true) {
        //     // 配信用画像フォームクリア
         //document.order.cos_year.value = "";
        // document.order.cos_month.value = "";
        // document.order.cos_day.value = "";
        document.order.cos_title.value = "";

         var cosFile = document.getElementById('cosFileForm');
        var temp = cosFile.innerHTML;
         cosFile.innerHTML = temp;

        // お知らせフォームクリア
        document.order.notice_year.value = "";
        document.order.notice_month.value = "";
        document.order.notice_day.value = "";

        document.order.notice_title.value = "";
        document.order.notice.value = "";
         document.order.notice_URL.value = "";


        var noticeFile = document.getElementById('noticeFileForm');
        temp = noticeFile.innerHTML;
        noticeFile.innerHTML = temp;
       
        }else{
             alert("キャンセルされました。");
        }

        
    }

          function entryChange4(){
              var id = document.getElementById('selectmonth').value;
              var id2 = document.getElementById('selectday').value;

              if(id2 == '31'&& id =='6') {
      
             // document.order.notice_month.value = "";
             document.order.notice_day.value = "";


          alert("日付が正しくありません");


      }
      
  
  }
 
    function checkFileSize() {
        var cosFiles = document.getElementById("costumes").files;
        var couponFiles = document.getElementById("coupons").files;
        var sum = 0;
        var maxSize = 30000000;

        for(var counter = 0;counter < cosFiles.length;counter++) {
            sum = sum + cosFiles[counter].size;
        }

        for(var counter = 0;counter < couponFiles.length;counter++) {
            sum = sum + couponFiles[counter].size;
        }

        if(sum > maxSize) {
            alert("画像ファイルの合計ファイルサイズが30MBを超えています。");
        } else {
            document.order.submit();
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

      </a>
    </div>

<p class="navbar-text" style="font-size:20px;">スタジオフォトキューブ_ポイント管理システム</span></p>
    <a href="logout" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">ログアウト</a>   

     <a href="pwchange" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">設定</a>

  </div>

</nav>
    <div class="col-xs-8 col-xs-offset-2">
        <div class="col-xs-12" style="text-center">
<!--             <h4 class="text-center text-danger"><strong><?php echo $_smarty_tpl->tpl_vars['general_caution']->value;?>
&nbsp;</strong></h4>
 -->        </div>
        <form style="margin-top:90px;"class="form-horizontal" name="order" action="confirm" method="post" enctype="multipart/form-data">
            <div style="margin-top:20px;">
                <h3 style="border-left: 5px solid #f0ad4e;
                padding:3px 10px 3px 10px;">利用者検索</h3>
            </div>
            <div class="form-group">
            
   
            </div> 

            <div class="form-group">
<!--                 <div class="col-xs-9 col-xs-offset-3 form-inline">
                    <input class="form-control" type="button" value="オーダー確認" onclick="checkFileSize();" />
                    &nbsp;&nbsp;
                    <input class="form-control" type="button" value="クリア" onclick="clearForm();" />
                -->

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

            </div> 

        </form>

<hr />

            <h3 style="border-left: 5px solid #f0ad4e;
                padding:3px 10px 3px 10px;">利用者一覧</h3>
                <p class="page" style="font-size:18px;"><?php echo $_smarty_tpl->tpl_vars['now']->value;?>
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
        <a href="../orderpage/disppointuserlist?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>&nbsp;&nbsp;
    <?php }?>
<?php } ?>
</p>


            <div style="margin-top:30px;">
              <table class="table table-condensed">
                <tr>
                    <th>ポイントID</th>
                    <th>お名前</th>
                    <th>保有ポイント</th>
                    <th>生年月日</th>
                    <th>住所</th>
                    <th></th>
                </tr>
<?php  $_smarty_tpl->tpl_vars["pointUser"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["pointUser"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pointUserList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["pointUser"]->key => $_smarty_tpl->tpl_vars["pointUser"]->value) {
$_smarty_tpl->tpl_vars["pointUser"]->_loop = true;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserName()=='') {?>
                未登録
            <?php } else { ?>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pointUser']->value->getUserName(), ENT_QUOTES, 'UTF-8', true);?>
&nbsp;様
            <?php }?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getPoint();?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday()=="0000-00-00") {?>
                未登録
            <?php } else { ?>
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday(),"%Y/%m/%d");?>

            <?php }?>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserAddress()=='') {?>
                未登録
            <?php } else { ?>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pointUser']->value->getUserAddress(), ENT_QUOTES, 'UTF-8', true);?>

            <?php }?>
        </td>
        <td class="operate"><a class="btn_mini" href="../orderpage/disppointuserinfo?user_id=<?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
">表示</a></td>
    </tr>
<?php } ?>

        </table>   
    </div>
</BODY>
</HTML>
<?php }} ?>
