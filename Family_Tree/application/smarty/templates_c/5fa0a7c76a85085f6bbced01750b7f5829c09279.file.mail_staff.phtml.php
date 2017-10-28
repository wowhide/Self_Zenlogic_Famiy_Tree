<?php /* Smarty version Smarty-3.1.19, created on 2015-06-05 00:20:31
         compiled from "../../BridalOrder/application/smarty/templates/mail_staff.phtml" */ ?>
<?php /*%%SmartyHeaderCode:159773250754eaea971950d7-89527027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fa0a7c76a85085f6bbced01750b7f5829c09279' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/mail_staff.phtml',
      1 => 1433428387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159773250754eaea971950d7-89527027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaea971b2142_84849481',
  'variables' => 
  array (
    'email' => 0,
    'cos_dirname' => 0,
    'notice_schedule' => 0,
    'notice_title' => 0,
    'notice' => 0,
    'notice_URL' => 0,
    'coupon_filename' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaea971b2142_84849481')) {function content_54eaea971b2142_84849481($_smarty_tpl) {?>衣裳アプリ更新のオーダーを頂きました。
更新作業をお願いします。

■お客様名
<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様

■衣裳画像
衣裳画像ディレクトリ：<?php echo $_smarty_tpl->tpl_vars['cos_dirname']->value;?>


■お知らせ
配信予定日：<?php echo $_smarty_tpl->tpl_vars['notice_schedule']->value;?>

タイトル：<?php echo $_smarty_tpl->tpl_vars['notice_title']->value;?>

本文：
<?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

URL：<?php echo $_smarty_tpl->tpl_vars['notice_URL']->value;?>

お知らせ画像：<?php echo $_smarty_tpl->tpl_vars['coupon_filename']->value;?>
<?php }} ?>
