<?php /* Smarty version Smarty-3.1.19, created on 2016-12-21 14:06:35
         compiled from "../../Family_Tree/application/smarty/templates/family_tree_delete_result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126498994457e1ee8e8bb317-95796727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd033671f589e9b44b94defa84d3a29513c9db024' => 
    array (
      0 => '../../Family_Tree/application/smarty/templates/family_tree_delete_result.tpl',
      1 => 1482292980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126498994457e1ee8e8bb317-95796727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57e1ee8e9090b9_74236905',
  'variables' => 
  array (
    'customerId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e1ee8e9090b9_74236905')) {function content_57e1ee8e9090b9_74236905($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
    <link href="http://www.htmlhifive.com/ja/res/lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://code.htmlhifive.com/h5.css" rel="stylesheet" >

    <title>削除完了</title>

    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <script src="http://www.htmlhifive.com/ja/res/lib/jquery/jquery-2.js"></script>
    <script src="http://www.htmlhifive.com/ja/res/lib/bootstrap3/js/bootstrap.min.js"></script>
    <script src="http://code.htmlhifive.com/h5.dev.js"></script>
    <script src="../js/form.js"></script>

    <style type="text/css">

body{

}

</style>

</head>
<body>

<div data-role="page">
    <div data-role="header" data-theme="f">
        <h1 style="margin-top:30px; margin-bottom:60px;">削除完了!</h1>
    </div>
    <div data-role="content">
                <form action="../orderpage/entry" method="post" data-ajax="false" >
                     <tr>
                        <td>
                          <input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['customerId']->value;?>
" size="24">
                      </td>
                    </tr>


                     <tr>
                         <td colspan="2">
                             <input type="submit" value="トップへ戻る">
                         </td>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

</body>
</html>
<?php }} ?>
