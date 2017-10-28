<?php /* Smarty version Smarty-3.1.19, created on 2016-03-01 14:42:09
         compiled from "../../Family_Tree/application/smarty/templates/fileup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65365366656d51a580af7e1-55438724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c740490c6a3fd62b8d062592a5c9e493da5e239' => 
    array (
      0 => '../../Family_Tree/application/smarty/templates/fileup.tpl',
      1 => 1456810924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65365366656d51a580af7e1-55438724',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d51a580da3d4_80804004',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d51a580da3d4_80804004')) {function content_56d51a580da3d4_80804004($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>画像ファイルアップロード</title>
</head>
<body>
<h1>ログイン_index3.html</h1>
       <hr>
         <div align="center">
              <table border="0">
                <form action="../orderpage/testfileupimg" method="post" enctype="multipart/form-data">
                     <tr>
                        <th>
                             ＩＤ
                         </th>
                        <td>
                          <input type="text" name="userid" value="" size="24">
                      </td>
                    </tr>
                    <th>
                             ファイルアップロード
                         </th>
                        <td>
                            <input type="file" name="image" accept="image/*">
                      </td>
                    </tr>
                      
                     <tr>
                         <td colspan="2">
                             <input type="submit" value="送信">
                         </td>
                     </tr>
                 </form>
            </table>
        </div>

</body>
</html>
<?php }} ?>
