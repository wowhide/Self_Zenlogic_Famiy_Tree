<?php /* Smarty version Smarty-3.1.19, created on 2015-06-15 20:38:20
         compiled from "../../BridalOrder/application/smarty/templates/pwmail_customer.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1496579401555dd5ad144224-77821568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28f86fe624fab52269947758ccdbf9036e6573bb' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/pwmail_customer.phtml',
      1 => 1434239806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1496579401555dd5ad144224-77821568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_555dd5ad176624_77932106',
  'variables' => 
  array (
    'bienname' => 0,
    'pwnew' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555dd5ad176624_77932106')) {function content_555dd5ad176624_77932106($_smarty_tpl) {?>
 <?php echo $_smarty_tpl->tpl_vars['bienname']->value;?>
御中

パスワード変更のリクエストを受け付けました。
変更パスワードについては下記の通りです。

■新しいパスワード

パスワード：<?php echo $_smarty_tpl->tpl_vars['pwnew']->value;?>



パスワード変更のリクエストに覚えがない場合は、ご連絡ください。

---*----*----*----*----*----*----
株式会社デジタルスペースワウ
アプリ開発チーム
developer@photoappli.com
981-0923 仙台市青葉区東勝山3-5-10
TEL022-727-0861　FAX022-727-0864
----*----*----*----*----*----*----
<?php }} ?>
