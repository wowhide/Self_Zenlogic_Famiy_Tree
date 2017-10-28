<?php /* Smarty version Smarty-3.1.19, created on 2015-06-27 16:43:45
         compiled from "../../BridalOrder/application/smarty/templates/mail_staff.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1693385764558d360ac3aee0-23674321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4294f9993424d77abf8e743e8e3f8d97a20dd1ce' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/mail_staff.phtml',
      1 => 1435390418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1693385764558d360ac3aee0-23674321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_558d360ac55a20_37202252',
  'variables' => 
  array (
    'email' => 0,
    'cos_title' => 0,
    'cos_dirname' => 0,
    'notice_schedule' => 0,
    'notice_title' => 0,
    'notice' => 0,
    'notice_URL' => 0,
    'coupon_filename' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d360ac55a20_37202252')) {function content_558d360ac55a20_37202252($_smarty_tpl) {?>衣裳アプリ更新のオーダーを頂きました。
更新作業をお願いします。

■お客様名
<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様

■衣裳画像
タイトル：<?php echo $_smarty_tpl->tpl_vars['cos_title']->value;?>

衣裳画像ディレクトリ：<?php echo $_smarty_tpl->tpl_vars['cos_dirname']->value;?>


■お知らせ
配信予定日：<?php echo $_smarty_tpl->tpl_vars['notice_schedule']->value;?>

タイトル：<?php echo $_smarty_tpl->tpl_vars['notice_title']->value;?>

本文：
<?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

URL：<?php echo $_smarty_tpl->tpl_vars['notice_URL']->value;?>

お知らせ画像：<?php echo $_smarty_tpl->tpl_vars['coupon_filename']->value;?>
<?php }} ?>
