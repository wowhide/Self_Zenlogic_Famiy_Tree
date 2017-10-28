<?php /* Smarty version Smarty-3.1.19, created on 2015-06-05 01:13:30
         compiled from "../../BridalOrder/application/smarty/templates/orderedit_mail_staff.phtml" */ ?>
<?php /*%%SmartyHeaderCode:16155531145570792a2278e3-68834907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9298e5e83d3e8f60051544e72fad0c6fbe44d510' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/orderedit_mail_staff.phtml',
      1 => 1433433980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16155531145570792a2278e3-68834907',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'nid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5570792a25a3e4_28250109',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5570792a25a3e4_28250109')) {function content_5570792a25a3e4_28250109($_smarty_tpl) {?>ビアンベールアプリお客様が注文履歴を削除しました。
更新作業をお願いします。

■お客様名
<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様

■DB番号
　番号:<?php echo $_smarty_tpl->tpl_vars['nid']->value;?>

<?php }} ?>
