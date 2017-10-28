<?php /* Smarty version Smarty-3.1.19, created on 2015-07-01 16:56:45
         compiled from "../../BridalOrder/application/smarty/templates/toppage.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1969409048558d32bff1b9e1-00340615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b16fe3c79272c88258b768b10a658767980025e' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/toppage.phtml',
      1 => 1435737375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1969409048558d32bff1b9e1-00340615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_558d32c0155959_86496295',
  'variables' => 
  array (
    'bienname' => 0,
    'general_caution' => 0,
    'cos_year_array' => 0,
    'cos_select_year' => 0,
    'cos_month_array' => 0,
    'cos_select_month' => 0,
    'cos_day_array' => 0,
    'cos_select_day' => 0,
    'c_title' => 0,
    'cos_date_caution' => 0,
    'cos_file_caution' => 0,
    'notice_year_array' => 0,
    'notice_select_year' => 0,
    'notice_month_array' => 0,
    'notice_select_month' => 0,
    'notice_day_array' => 0,
    'notice_select_day' => 0,
    'notice_date_caution' => 0,
    'n_title' => 0,
    'notice_title_caution' => 0,
    'n_body' => 0,
    'notice_caution' => 0,
    'coupon_file_caution' => 0,
    'n_URL' => 0,
    'url_caution' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d32c0155959_86496295')) {function content_558d32c0155959_86496295($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/function.html_options.php';
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
<div style="margin-top:-20px;">
        <img alt="Brand" src="../imges/rogo.png"></div>
      </a>
    </div>
<!-- <a href="logout" class="btn btn-default navbar-btn">Log out</a> -->
<p class="navbar-text" style="font-size:20px;">ようこそ<span style="margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['bienname']->value;?>
様</span></a> </p>
<!-- <button class="btn btn-default navbar-text navbar-right" > <a href="logout" class="navbar-link">Log out</a></button>
 -->             
     <a href="logout" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">ログアウト</a>

    <a href="pwchange" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">パスワード変更</a>

<!--     <a href="orderrireki" class="btn btn-default navbar-text navbar-right" role="button" style="margin-bottom:-30px; margin-left:20px;">注文履歴</a>
 -->
  </div>

</nav>
    <div class="col-xs-8 col-xs-offset-2">
        <div class="col-xs-12" style="text-center">
            <h4 class="text-center text-danger"><strong><?php echo $_smarty_tpl->tpl_vars['general_caution']->value;?>
&nbsp;</strong></h4>
        </div>
        <form style="margin-top:90px;"class="form-horizontal" name="order" action="confirm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <h3 style="border-left: 5px solid #FAA4D0;
                padding:3px 10px 3px 10px;">衣裳画像</h3>
            <div class="form-group">
              <!--   <label class="control-label col-xs-2 col-xs-offset-1">タイトル</label>
                <div class="col-xs-5 form-inline">
                    <select name="cos_year" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cos_year_array']->value,'selected'=>$_smarty_tpl->tpl_vars['cos_select_year']->value),$_smarty_tpl);?>

                    </select>
                    <label>年</label>
                    <select name="cos_month" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cos_month_array']->value,'selected'=>$_smarty_tpl->tpl_vars['cos_select_month']->value),$_smarty_tpl);?>

                    </select>
                    <label>月</label>
                    <select name="cos_day" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cos_day_array']->value,'selected'=>$_smarty_tpl->tpl_vars['cos_select_day']->value),$_smarty_tpl);?>

                    </select>
                    <label>日</label>
                </div> -->

                  <label class="control-label col-xs-2 col-xs-offset-1">タイトル</label>
                <div class="col-xs-5">
                    <input class="form-control" type="text" name="cos_title" value=<?php echo $_smarty_tpl->tpl_vars['c_title']->value;?>
>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['cos_date_caution']->value;?>
</strong>
            </div> 


              <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1"></label>

                <div class="col-xs-7">
                    <p>※タイトルは<code>１５文字以内</code>でお願いします。</p>
                    <div>

                    </div>
                </div>
          
            </div>




            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">衣裳画像</label>

                <div class="col-xs-5">
                    <span id="cosFileForm">
                        <input id="costumes" class="form-control" type="file" name="costume[]" accept="image/*" multiple />
                    </span>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['cos_file_caution']->value;?>
</strong>
           
            </div>





                 <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1"></label>

                <div class="col-xs-7">
                    <p>※ファイルは複数選択できます。一度に<code>２０個</code>までアップロードできます。</p>
                    <div>

                    </div>
                </div>
          
            </div>
<hr />

            <h3 style="border-left: 5px solid #FAA4D0;
                padding:3px 10px 3px 10px;">お知らせ</h3>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">配信予定日</label>
                <div class="col-xs-5 form-inline">
                    <select name="notice_year" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_year_array']->value,'selected'=>$_smarty_tpl->tpl_vars['notice_select_year']->value),$_smarty_tpl);?>

                    </select>
                    <label>年</label>
                    <select name="notice_month" class="form-control" id="selectmonth" onchange="entryChange4();">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_month_array']->value,'selected'=>$_smarty_tpl->tpl_vars['notice_select_month']->value),$_smarty_tpl);?>

                    </select>
                    <label>月</label>
                    <select name="notice_day" class="form-control" id="selectday" onchange="entryChange4();">
                       <span id="select"> <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_day_array']->value,'selected'=>$_smarty_tpl->tpl_vars['notice_select_day']->value),$_smarty_tpl);?>
</span>
                 </select>
                    <label>日</label>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['notice_date_caution']->value;?>
</strong>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">タイトル</label>
                <div class="col-xs-5">
                    <input class="form-control" type="text" name="notice_title" value=<?php echo $_smarty_tpl->tpl_vars['n_title']->value;?>
>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['notice_title_caution']->value;?>
</strong>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">本文</label>
                <div class="col-xs-5">
                    <textarea class="form-control" name="notice" rows="4" cols="40"><?php echo $_smarty_tpl->tpl_vars['n_body']->value;?>
</textarea>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['notice_caution']->value;?>
</strong>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">お知らせ画像</label>
                <div class="col-xs-5">
                    <span id="noticeFileForm">
                        <input id="coupons" class="form-control" type="file" name="coupon" accept="image/*" />
                    </span>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['coupon_file_caution']->value;?>
</strong>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-1">URL</label>
                <div class="col-xs-5">
                    <input class="form-control" type="text" name="notice_URL" value=<?php echo $_smarty_tpl->tpl_vars['n_URL']->value;?>
>
                </div>
                <strong class="col-xs-4 text-danger"><?php echo $_smarty_tpl->tpl_vars['url_caution']->value;?>
</strong>
            </div>
            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-3 form-inline">
                    <input class="form-control" type="button" value="オーダー確認" onclick="checkFileSize();" />
                    &nbsp;&nbsp;
                    <input class="form-control" type="button" value="クリア" onclick="clearForm();" />
                </div>
            <div class="col-xs-12">
                                <p style="margin-top:20px; margin-left:60px;">※衣裳画像はオーダー翌日の午前10時までに、お知らせは配信予定日の午前10時までに更新完了となります。</p>


            </div>
        </form>
    </div>
</BODY>
</HTML>
<?php }} ?>
