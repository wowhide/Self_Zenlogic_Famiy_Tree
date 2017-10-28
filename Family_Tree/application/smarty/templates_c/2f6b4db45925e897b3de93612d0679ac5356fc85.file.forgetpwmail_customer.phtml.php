<?php /* Smarty version Smarty-3.1.19, created on 2015-06-24 14:13:49
         compiled from "../../BridalOrder/application/smarty/templates/forgetpwmail_customer.phtml" */ ?>
<?php /*%%SmartyHeaderCode:64613310655654d0fe4d760-92918755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f6b4db45925e897b3de93612d0679ac5356fc85' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/forgetpwmail_customer.phtml',
      1 => 1434239728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64613310655654d0fe4d760-92918755',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55654d0fed2573_19927580',
  'variables' => 
  array (
    'forgetid' => 0,
    'forgetpw' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55654d0fed2573_19927580')) {function content_55654d0fed2573_19927580($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['forgetid']->value;?>
御中

パスワードのリクエストを受け付けました。
現在のID・パスワードについては下記の通りです。

ID       : <?php echo $_smarty_tpl->tpl_vars['forgetid']->value;?>


パスワード : <?php echo $_smarty_tpl->tpl_vars['forgetpw']->value;?>



ご不明な点がございましたらお手数をおかけいたしますが
メールにてお問い合わせお願いします。

---*----*----*----*----*----*----
株式会社デジタルスペースワウ
アプリ開発チーム
developer@photoappli.com
981-0923 仙台市青葉区東勝山3-5-10
TEL022-727-0861　FAX022-727-0864
----*----*----*----*----*----*----
<?php }} ?>
