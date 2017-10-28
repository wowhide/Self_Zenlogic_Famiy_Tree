<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
    <link href="http://www.htmlhifive.com/ja/res/lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://code.htmlhifive.com/h5.css" rel="stylesheet" >
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
        <h1 style="margin-top:30px; margin-bottom:60px;">エラーが発生しました。<br>お手数ですが、再度情報を登録してください。</h1>
    </div>
    <div data-role="content">
                <form action="../orderpage/entry" method="post" data-ajax="false" >
                     <tr>
                        <td>
                          <input type="hidden" name="userid" value="{$customerId}" size="24">
                      </td>
                    </tr>
    
                   
                     <tr>
                         <td colspan="2">
                             <input type="submit" id="submit-1" value="トップへ戻る">
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