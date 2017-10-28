<?php /* Smarty version Smarty-3.1.19, created on 2015-11-20 18:45:18
         compiled from "../../BridalOrder/application/smarty/templates/forgetpwmail_customer.phtml" */ ?>
<?php /*%%SmartyHeaderCode:325920864564eebae275938-95447020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1269af29ce7794bd02d6e9ebdcd532ab7c15eee' => 
    array (
      0 => '../../BridalOrder/application/smarty/templates/forgetpwmail_customer.phtml',
      1 => 1435306226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325920864564eebae275938-95447020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'forgetid' => 0,
    'forgetpw' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564eebae2f7c55_82665982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564eebae2f7c55_82665982')) {function content_564eebae2f7c55_82665982($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['forgetid']->value;?>
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
