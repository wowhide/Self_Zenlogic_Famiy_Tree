<?php /* Smarty version Smarty-3.1.19, created on 2016-02-13 15:18:58
         compiled from "../../Photo_System/application/smarty/templates/mng_point_user_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179475361556becad2678200-78040977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afc7ab449283bb6c781bb955d776d9b42c0282c8' => 
    array (
      0 => '../../Photo_System/application/smarty/templates/mng_point_user_info.tpl',
      1 => 1455343641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179475361556becad2678200-78040977',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pointUser' => 0,
    'historyList' => 0,
    'history' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56becad277efe4_46099750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56becad277efe4_46099750')) {function content_56becad277efe4_46099750($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/h-yamato/h-yamato.xsrv.jp/library/Smarty/libs/plugins/modifier.date_format.php';
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
<script type="text/javascript" src="../../js/pointuser-info.js?var=201511091013"></script>
</head>
<body>
<div id="container">
    <div id="main">
        <?php echo $_smarty_tpl->getSubTemplate ("include/mng_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("include/jsng.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div id="jsok" style="display:none;">
            <?php echo $_smarty_tpl->getSubTemplate ("include/mng_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <div id="contents">
                <h2>ポイント機能　利用者情報</h2>
                <input id="update_reload_btn" class="btn" type="button" value="更新" />

                <!-- 利用者ID検索フォーム -->
                <div id="pointUser_info_search_area">
                    <form id="search_user" method="get" action="../mng/searchpointuser">
                        利用者検索&nbsp;
                        <input id="userId_txtfld" type="text" name="search_userId" placeholder="ポイントIDを入力" />
                        &nbsp;
                        <input id="search_btn" class="btn" type="submit" name="search" value="検索" />
                    </form>
                </div>
                <div id="boxArea">
                    <!-- 利用者情報 -->
                    <div id="boxLeft">
                        <div id="pointUser_info_area">
                            <h2>お客様情報</h2>
                            <table id="pointUser_info_table">
                                <tr>
                                    <td class="header">ポイントID</td>
                                    <td class="data"><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
</td>
                                </tr>
                                <tr>
                                    <td class="header">お名前</td>
                                    <td class="data">
                                        <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserName()=='') {?>
                                            未登録
                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserName();?>
&nbsp;様
                                        <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="header">生年月日</td>
                                    <td class="data">
                                        <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday()=="0000-00-00") {?>
                                            未登録
                                        <?php } else { ?>
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pointUser']->value->getUserBirthday(),"%Y/%m/%d");?>

                                        <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="header">住所</td>
                                    <td class="data">
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
                                    <td class="header">TEL</td>
                                    <td class="data">
                                        <?php if ($_smarty_tpl->tpl_vars['pointUser']->value->getUserTel()=='') {?>
                                            未登録
                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserTel();?>

                                        <?php }?>
                                    </td>
                                </tr>
                            </table>
                            <table id="point_table">
                                <tr>
                                    <td class="header">保有ポイント</td>
                                    <td class="data"><?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getPoint();?>
</td>
                                </tr>
                            </table>
                        </div><!-- pointUser_info_area -->
                    </div><!-- boxLeft -->
                    <div id="boxRight">
                        <!-- ポイントを増やすエリア -->
                        <div id="addPoint_area">
                            <h2>ポイントを増やす</h2>
                            <form method="post" action="../mng/disppointuserinfo">
                                <input id="addPoint_txtfld" type="text" name="addPointTxtfld" placeholder="ポイントを入力" />
                                &nbsp;
                                <input id="addPoint_btn" class="btn" type="submit" name="addPointBtn" value="増やす" />
                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
" />
                            </form>
                        </div><!-- addPoint_area -->

                        <!-- ポイントを使うエリア -->
                        <div id="usePoint_area">
                            <h2>ポイントを使う</h2>
                            <form method="post" action="../mng/disppointuserinfo">
                                <input id="usePoint_txtfld" type="text" name="usePointTxtfld" placeholder="ポイントを入力" />
                                &nbsp;
                                <input id="usePoint_btn" class="btn" type="submit" name="usePointBtn" value="使う" />
                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
" />
                            </form>
                        </div><!-- usePoint_area-->

                        <!-- ポイント履歴エリア -->
                        <div id="pointHistory_area">
                            <h2>ポイント履歴</h2>
                            <table id="pointHistory_table">
                                <thead class="scrollHead">
                                    <tr>
                                        <th class="history_date">日時</th>
                                        <th class="history_category">履歴種別</th>
                                        <th class="history_point">ポイント増減</th>
                                        <th class="history_clear"></th>
                                    </tr>
                                </thead>
                                <tbody class="scrollBody">
                                    <?php  $_smarty_tpl->tpl_vars["history"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["history"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['historyList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["history"]->key => $_smarty_tpl->tpl_vars["history"]->value) {
$_smarty_tpl->tpl_vars["history"]->_loop = true;
?>
                                    <tr>
                                        <td class="history_date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['history']->value["entry_datetime"],"%Y/%m/%d %H:%M");?>
</td>
                                        <?php if ((int)$_smarty_tpl->tpl_vars['history']->value["manual_addPoint_flg"]===1) {?>
                                        <td class="history_category">手動付与</td>
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['history']->value["auto_addPoint1_flg"]===1) {?>
                                        <td class="history_category">故人登録(QR)</td>
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['history']->value["auto_addPoint2_flg"]===1) {?>
                                        <td class="history_category">故人登録(手入力)</td>
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['history']->value["auto_addPoint3_flg"]===1) {?>
                                        <td class="history_category">お知らせ表示</td>
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['history']->value["auto_addPoint4_flg"]===1) {?>
                                        <td class="history_category">データ引継</td>
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['history']->value["auto_addPoint5_flg"]===1) {?>
                                        <td class="history_category">自動付与５</td>
                                        <?php }?>
                                        <td class="history_point"><?php echo $_smarty_tpl->tpl_vars['history']->value["point"];?>
</td>
                                        <td class="history_clear">
                                            <form method="post" action="../mng/disppointuserinfo">
                                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['pointUser']->value->getUserId();?>
" />
                                                <input type="hidden" name="history_no" value="<?php echo $_smarty_tpl->tpl_vars['history']->value['history_no'];?>
" />
                                                <input type="submit" class="btn_mini" name="undoBtn" value="取消" />
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- boxRight -->
                </div><!-- boxArea -->
                <div id="return_btn_area">
                    <a class="btn" href="../mng/disppointuserlist">戻る</a>
                </div>
            </div><!-- contents -->
        </div><!-- jsok -->
    </div><!-- main -->
    <?php echo $_smarty_tpl->getSubTemplate ("include/mng_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><!-- container -->
</body>
</html>
<?php }} ?>
