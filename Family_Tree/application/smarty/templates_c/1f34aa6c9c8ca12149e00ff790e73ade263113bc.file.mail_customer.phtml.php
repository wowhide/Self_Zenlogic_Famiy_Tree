<?php /* Smarty version Smarty-3.1.19, created on 2015-06-14 09:09:12
         compiled from "../../BridalOrder/application/smarty/templates/mail_customer.phtml" */ ?>
<?php /*%%SmartyHeaderCode:191259456354eaea97019f45-53832314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f34aa6c9c8ca12149e00ff790e73ade263113bc' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/mail_customer.phtml',
      1 => 1434240467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191259456354eaea97019f45-53832314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaea97058052_40906032',
  'variables' => 
  array (
    'bienname' => 0,
    'cos_filename' => 0,
    'notice_schedule' => 0,
    'notice_title' => 0,
    'notice' => 0,
    'notice_URL' => 0,
    'coupon_filename' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaea97058052_40906032')) {function content_54eaea97058052_40906032($_smarty_tpl) {?>
 <?php echo $_smarty_tpl->tpl_vars['bienname']->value;?>
御中

この度は衣裳アプリ更新のご用命を頂きありがとうございます。
以下の内容で承りましたのでご案内申し上げます。

■衣裳画像
衣裳画像：
<?php echo $_smarty_tpl->tpl_vars['cos_filename']->value;?>


■お知らせ
配信予定日：<?php echo $_smarty_tpl->tpl_vars['notice_schedule']->value;?>

タイトル：<?php echo $_smarty_tpl->tpl_vars['notice_title']->value;?>

本文：
<?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

URL：<?php echo $_smarty_tpl->tpl_vars['notice_URL']->value;?>


お知らせ画像：<?php echo $_smarty_tpl->tpl_vars['coupon_filename']->value;?>




----*----*----*----*----*----*----
株式会社デジタルスペースワウ
アプリ開発チーム
developer@photoappli.com
981-0923 仙台市青葉区東勝山3-5-10
TEL022-727-0861　FAX022-727-0864
----*----*----*----*----*----*----
<?php }} ?>
