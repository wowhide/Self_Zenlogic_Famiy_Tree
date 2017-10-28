<?php /* Smarty version Smarty-3.1.19, created on 2016-08-03 13:05:21
         compiled from "../../Family_Tree/application/smarty/templates/family_temp_test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:438632309579c116dd2b6c0-51313549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '818efa90264075216abb77933d08cb8d2f46350d' => 
    array (
      0 => '../../Family_Tree/application/smarty/templates/family_temp_test.tpl',
      1 => 1470197117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '438632309579c116dd2b6c0-51313549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579c116dd5ab87_36860766',
  'variables' => 
  array (
    'customerId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579c116dd5ab87_36860766')) {function content_579c116dd5ab87_36860766($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>

    <style type="text/css">


</style>

</head>
<body>

<form action="../orderpage/androidtest" method="post" data-ajax="false">
                     <tr>
                        <th>
                         </th>
                        <td>
                          <input type="text" name="customer_id" value="<?php echo $_smarty_tpl->tpl_vars['customerId']->value;?>
" size="24">
                      </td>
                    </tr>



                <div data-role="fieldcontain">        
                     <tr>
                         <td colspan="2">
                             <input type="submit" id="submit-1" value="登録">
                         </td>
                     </tr>
                </div> 
            
            </form>

</body>
</html><?php }} ?>
