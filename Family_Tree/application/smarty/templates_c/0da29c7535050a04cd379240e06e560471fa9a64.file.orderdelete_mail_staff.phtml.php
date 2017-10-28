<?php /* Smarty version Smarty-3.1.19, created on 2015-06-03 12:46:04
         compiled from "../../BridalOrder/application/smarty/templates/orderdelete_mail_staff.phtml" */ ?>
<?php /*%%SmartyHeaderCode:832210339556e787c798684-06547045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0da29c7535050a04cd379240e06e560471fa9a64' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/orderdelete_mail_staff.phtml',
      1 => 1433303119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '832210339556e787c798684-06547045',
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
  'unifunc' => 'content_556e787c7e1bd2_91780870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556e787c7e1bd2_91780870')) {function content_556e787c7e1bd2_91780870($_smarty_tpl) {?>ビアンベールアプリお客様が注文履歴を削除しました。
更新作業をお願いします。

■お客様名
<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
様

■DB番号
　番号:<?php echo $_smarty_tpl->tpl_vars['nid']->value;?>

<?php }} ?>
