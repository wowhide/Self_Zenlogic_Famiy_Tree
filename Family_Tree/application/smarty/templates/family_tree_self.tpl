<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css?var=20120829" />
    <link href="../css/jquery.mobile.datepicker.css" rel="stylesheet">
    <link href="../css/jquery.mobile.datepicker.theme.css" rel="stylesheet">
    <link href="http://www.htmlhifive.com/ja/res/lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://code.htmlhifive.com/h5.css" rel="stylesheet" >
    <link href="../css/style.css?var=20120829" rel="stylesheet">
    <link href="../css/sweetalert.css" rel="stylesheet">
    <title>家系図_自分情報登録</title>

    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">


    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <script src="../js/jquery.mobile.datepicker.js"></script>
    <script src="http://www.htmlhifive.com/ja/res/lib/jquery/jquery-2.js"></script>
    <script src="http://www.htmlhifive.com/ja/res/lib/bootstrap3/js/bootstrap.min.js"></script>
    <script src="http://code.htmlhifive.com/h5.dev.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/form.js"></script>
    <script src="../js/sweetalert.min.js"></script>


    <style type="text/css">

body{

}

div.Box {
width: 1280px;
}

div.Box div {
width: 50px;
height: 70px;
background-color: #f5f5f5;
float: left;
font-size: 7px;
border: 1px #ccc solid;
background-repeat: no-repeat;
background-position: right bottom;
background-size:auto 40px;

/*影*/
-webkit-box-shadow: 0 10px 6px -6px #777;
-moz-box-shadow: 0 10px 6px -6px #777;
    box-shadow: 0 10px 6px -6px #777;


}

.clearLeft {
clear: left;
}

/*必須項目*/
.attention{
    color:#ff0000;
}

/*セレクトのみのフォントサイズ*/
select {
    font-size: 16px;
}

/* タブレットのスタイル */

    /*表示領域が480px以上の場合に適用するスタイル*/
    @media all and (min-width: 480px) {
        body{
            zoom:1.5;
        }
    }

</style>

<script>

//入力チェック
$(function() {

// 登録バリデーション

    //自分情報登録＿バリデーションチェック
    $('.self_insert_btn_id').click(function(){

      if($("input[name='self_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#self_insert_form_id').submit();

  });

    //父親情報登録＿バリデーションチェック
    $('.father_insert_btn_id').click(function(){

      if($("input[name='father_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#father_insert_form_id').submit();

  });

        //父親情報登録＿大切な故人＿バリデーションチェック
    $('.father_deceased_insert_btn_id').click(function(){

      if($("input[name='father_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#father_deceased_insert_form_id').submit();

  });

    //母親情報登録＿バリデーションチェック
    $('.mather_insert_btn_id').click(function(){

      if($("input[name='mather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#mather_insert_form_id').submit();

  });

    //母親情報登録＿大切な故人＿バリデーションチェック
    $('.mather_deceased_insert_btn_id').click(function(){

      if($("input[name='mather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#mather_deceased_insert_form_id').submit();

  });

    //祖父父方情報登録＿バリデーションチェック
    $('.grandfatherfather_insert_btn_id').click(function(){

      if($("input[name='grandfatherfather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#grandfatherfather_insert_form_id').submit();

  });

    //祖母父方情報登録＿バリデーションチェック
    $('.grandfathermather_insert_btn_id').click(function(){

      if($("input[name='grandfathermather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#grandfathermather_insert_form_id').submit();

  });

    //祖父母方情報登録＿バリデーションチェック
    $('.grandmatherfather_insert_btn_id').click(function(){

      if($("input[name='grandmatherfather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#grandmatherfather_insert_form_id').submit();

  });

    //祖母母方情報登録＿バリデーションチェック
    $('.grandmathermather_insert_btn_id').click(function(){

      if($("input[name='grandmathermather_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#grandmathermather_insert_form_id').submit();

  });


// 修正バリデーション

    //自分情報修正＿バリデーションチェック
    $('.self_update_btn_id').click(function(){

      if($("input[name='self_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#self_update_form_id').submit();

  });


});

</script>


</head>
<body>

<div data-role="page" id="top">
    <!-- ヘッダー -->
    <div data-role="header" data-theme="f">
        <h2 style="margin-left:25%; margin-right:5%; font-weight:bold;"></h2>
        <a style= "float:right; margin-bottom:40px; font-weight:bold;" href="#add" data-role="button" data-icon="plus">登録</a>
    </div>

    <!-- コンテンツ -->
    <div data-role="content">
        <div class="Box">
        <!-- 自分 -->
{if $self_img == 1}
 <div style="background-color: #ffc0cb; background-image: url({$urlocalself}?{$urlquery_img});">
{/if}
{if $self_img == 0}
<div class="self" style="background-color: #ffc0cb; background-image: url(../imges/Entypo.png);">
{/if}
    <span style="font-size:10px;">
        自分<br>
    </span>
    <span style="font-size:8px;">
{if !empty($selfFamilyName) == false}
        <a href="#self_insert">情報登録</a>
{/if}
{if empty($selfFamilyName) == false}
        <a href="#self_change">{$selfFamilyName}</a>
{/if}
    </span>
</div>

        </div>

    </div><!-- 全体 -->

    <!-- フッター -->
    <div data-role="footer" data-theme="f">
        <h1></h1>
    </div>
</div>

<!-- 　　　　　　　　　　　　登録処理　　　　　　　　　　　　　　　　 -->

<div data-role="page" id="add">
    <div data-role="header" data-theme="f">
        <h1>登　録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
        <div data-role="controlgroup">

        <!-- 大切な故人 -->
        <a href="#deceasedadd" data-role="button" data-icon="gear">大切な故人から登録</a>

        <!-- 個人登録 -->
        <a href="#personaladd" data-role="button" data-icon="gear">個人登録</a>

        </div>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 大切な故人 -->
<div data-role="page" id="deceasedadd">
    <div data-role="header" data-theme="f">
        <h1>続　柄</h1>
        <a style= "float:right; font-weight:bold;" href="#add" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
        <div data-role="controlgroup">
        <!-- 祖父父方 -->
        {if !empty($grandfatherfatherFamilyId) == false}
        <a href="#deceased_grandfatherfather_insert" data-role="button" data-icon="gear">祖父（父方）</a>
        {/if}
        <!-- 祖母父方 -->
        {if !empty($grandfathermatherFamilyId) == false}
        <a href="#deceased_grandfathermather_insert" data-role="button" data-icon="gear">祖母（父方）</a>
        {/if}
        <!-- 祖父母方 -->
        {if !empty($grandmatherfatherFamilyId) == false}
        <a href="#deceased_grandmatherfather_insert" data-role="button" data-icon="gear">祖父（母方）</a>
        {/if}
        <!-- 祖母母方 -->
        {if !empty($grandmathermatherFamilyId) == false}
        <a href="#deceased_grandmathermather_insert" data-role="button" data-icon="gear">祖母（母方）</a>
        {/if}
        <!-- 父親 -->
        {if !empty($fatherFamilyId) == false}
        <a href="#deceased_father_insert" data-role="button" data-icon="gear">父親</a>
        {/if}

        <!-- 母親 -->
        {if !empty($matherFamilyId) == false}
        <a href="#deceased_mather_insert" data-role="button" data-icon="gear">母親</a>
        {/if}
        </div>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 個人登録 -->
<div data-role="page" id="personaladd">
    <div data-role="header" data-theme="f">
        <h1>続　柄</h1>
        <a style= "float:right; font-weight:bold;" href="#add" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
        <div data-role="controlgroup">
        <!-- 祖父父方 -->
        {if !empty($grandfatherfatherFamilyId) == false}
        <a href="#grandfatherfather_insert" data-role="button" data-icon="gear">祖父（父方）</a>
        {/if}
        <!-- 祖母父方 -->
        {if !empty($grandfathermatherFamilyId) == false}
        <a href="#grandfathermather_insert" data-role="button" data-icon="gear">祖母（父方）</a>
        {/if}
        <!-- 祖父母方 -->
        {if !empty($grandmatherfatherFamilyId) == false}
        <a href="#grandmatherfather_insert" data-role="button" data-icon="gear">祖父（母方）</a>
        {/if}
        <!-- 祖母母方 -->
        {if !empty($grandmathermatherFamilyId) == false}
        <a href="#grandmathermather_insert" data-role="button" data-icon="gear">祖母（母方）</a>
        {/if}
        <!-- 父親 -->
        {if !empty($fatherFamilyId) == false}
        <a href="#father_insert" data-role="button" data-icon="gear">父親</a>
        {/if}

        <!-- 母親 -->
        {if !empty($matherFamilyId) == false}
        <a href="#mather_insert" data-role="button" data-icon="gear">母親</a>
        {/if}
        </div>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>




<!-- 　　　　　　　　　　　新規登録・修正処理　　　　　　　　　　　　 -->
<!-- 自分ぺージ 新規-->
<div data-role="page" id="self_insert">
    <div data-role="header" data-theme="f">
        <h1>自分情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/selfdatachange" method="post" data-ajax="false" enctype="multipart/form-data" id="self_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             名前<span class="attention"> * </span>
                        </th>
                        <td>
                          <input type="text" name="self_family_name" value="{$selfFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="self_birthday" value="{$selfBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $selfBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="self_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $selfBirthday !== "0000-00-00"}
                            <input type="date" name="self_birthday" value="{$selfBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
              <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                          {if $self_img == 1}
                            <img src="{$urlocalself}?{$urlquery_img_thumb}" style="width: 100%; position:relative;">
                        {/if}
                        {if $self_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="self_profession" value="{$selfProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="self_memo" name="self_memo" placeholder="メモを入力">{$selfMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                            </th>
                            <td>

                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                             <!-- <input type="submit" value="登録"> -->
                             <!-- <button type="button" class="self_insert_btn_id">登録</button> -->
                             <input type="submit" class="self_insert_btn_id" value="登録">
                         </td>
                     </tr>
                </div>
            </div>
            </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 自分ぺージ 修正-->
<div data-role="page" id="self_change">
    <div data-role="header" data-theme="f">
        <h1>自分情報</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/selfdatachange" method="post" data-ajax="false" enctype="multipart/form-data" id="self_update_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            名前
                         </th>
                        <td>
                          <input type="text" name="self_family_name" value="{$selfFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="self_birthday" value="{$selfBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $selfBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="self_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $selfBirthday !== "0000-00-00"}
                            <input type="date" name="self_birthday" value="{$selfBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>
                         </th>
                        <td>
                          {if $self_img == 1}
                            <img src="{$urlocalself}?{$urlquery_img_thumb}" style="width: 100%; position:relative;">
                        {/if}
                        {if $self_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="self_profession" value="{$selfProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="self_memo" name="self_memo" placeholder="メモを入力">{$selfMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                    <tr>
                         <td colspan="2">
                            <!-- <button type="submit"  class="self_update_btn_id">保存</button> -->
                            <input type="submit" class="self_update_btn_id" value="保存">
                         </td>
                     </tr>
                </div>
            </div>

                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 父親ぺージ 新規個人登録-->
<div data-role="page" id="father_insert">
    <div data-role="header" data-theme="f">
        <h1>父親情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/fatherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="father_insert_form_id">
                         <tr>
                            <th>
                                 <!-- ユーザーID -->
                             </th>
                            <td>
                              <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                          </td>
                        </tr>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                              <input type="text" name="father_family_name" value="" size="24" placeholder="名前を入力">
                          </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="father_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_birthday" value="" size="24" data-role="date" data-inline="false">
                          </td>
                        </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="father_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_deathday" value="" size="24" data-role="date" data-inline="false">
                          </td>
                        </tr>
                    </div>
            </div>

            <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>
                        </th>
                        <td>
                        {if $father_img == 1}
                            <img src="{$urlocalfather}?{$urlquery_img_thumb_father}" style="width: 100%; position:relative;">
                        {/if}
                        {if $father_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                    </div>
            </div>

            <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                職業
                             </th>
                            <td>
                              <input type="text" name="father_profession" value="" size="24" placeholder="職業を入力">
                          </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                             </th>
                            <td>
<!--                              <input type="textarea" name="father_memo" value="">
 -->
                            <textarea id="father_memo" name="father_memo" placeholder="メモを入力"></textarea>
                         </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                             <!-- <input type="submit" value="登録"> -->
                            <!-- <button type="button" class="father_insert_btn_id">登録</button> -->
                                <input type="submit" class="father_insert_btn_id" value="登録">
                            </td>
                        </tr>
                    </div>
            </div>

                 </form>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 母親ぺージ 新規個人登録-->
<div data-role="page" id="mather_insert">
    <div data-role="header" data-theme="f">
        <h1>母親情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/matherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="mather_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

             <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            名前<span class="attention"> * </span>
                         </th>
                        <td>
                          <input type="text" name="mather_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
             </div>

             <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="mather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_birthday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             没年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="mather_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_deathday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th style="margin-top:10px;">
                             顔写真<br>

                            </th>
                            <td>
                            {if $mather_img == 1}
                                <img src="{$urlocalmather}?{$urlquery_img_thumb_mather}" style="width: 100%; position:relative;">
                            {/if}
                            {if $mather_img == 0}
                                <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                            {/if}
                            </td>
                        </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="mather_profession" value="{$matherProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="mather_memo" name="mather_memo" placeholder="メモを入力">{$matherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                             <!-- <input type="submit" value="登録"> -->
                             <!-- <button type="button" class="mather_insert_btn_id">登録</button> -->
                             <input type="submit" class="mather_insert_btn_id" value="登録">
                         </td>
                     </tr>
                    </div>
                </div>
                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖父（父方）ぺージ 新規個人情報-->
<div data-role="page" id="grandfatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父父方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfatherfatherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="grandfatherfather_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            名前<span class="attention"> * </span>
                         </th>
                        <td>
                          <input type="text" name="grandfatherfather_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandfatherfather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_birthday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             没年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandfatherfather_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                        <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_deathday" value="" size="24" data-role="date" data-inline="false">


                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandfatherfather_img == 1}
                            <img src="{$urlocalgrandfatherfather}?{$urlquery_img_thumb_grandfatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                        </th>
                        <td>
                            <input type="text" name="grandfatherfather_profession" value="" size="24" placeholder="職業を入力">
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="grandfatherfather_memo" name="grandfatherfather_memo" placeholder="メモを入力">{$grandfatherfatherMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <input type="submit" value="登録"> -->
                            <!-- <button type="button" class="grandfatherfather_insert_btn_id">登録</button> -->
                            <input type="submit" class="grandfatherfather_insert_btn_id" value="登録">
                         </td>
                     </tr>
                </div>
            </div>

                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖母父方ぺージ 新規個人情報-->
<div data-role="page" id="grandfathermather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖母父方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfathermatherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="grandfathermather_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            名前<span class="attention"> * </span>
                         </th>
                        <td>
                          <input type="text" name="grandfathermather_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandfathermather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_birthday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             没年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandfathermather_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_deathday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandfathermather_img == 1}
                            <img src="{$urlocalgrandfathermather}?{$urlquery_img_thumb_grandfathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                        </th>
                        <td>
                            <input type="text" name="grandfathermather_profession" value="" size="24" placeholder="職業を入力">
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="grandfathermather_memo" name="grandfathermather_memo" placeholder="メモを入力">{$grandfathermatherMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
<!--                             <input type="submit" value="登録">
 -->                        <!-- <button type="button" class="grandfathermather_insert_btn_id">登録</button> -->
                            <input type="submit" class="grandfathermather_insert_btn_id" value="登録">
                         </td>
                     </tr>
                </div>
            </div>

                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖父母方ぺージ 新規個人入力-->
<div data-role="page" id="grandmatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父母方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmatherfatherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="grandmatherfather_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            名前<span class="attention"> * </span>
                         </th>
                        <td>
                          <input type="text" name="grandmatherfather_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandmatherfather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_birthday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             没年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandmatherfather_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_deathday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandmatherfather_img == 1}
                            <img src="{$urlocalgrandmatherfather}?{$urlquery_img_thumb_grandmatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                        </th>
                        <td>
                            <input type="text" name="grandmatherfather_profession" value="" size="24" placeholder="職業を入力">
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="grandmatherfather_memo" name="grandmatherfather_memo" placeholder="メモを入力">{$grandmatherfatherMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <input type="submit" value="登録"> -->
                            <!-- <button type="button" class="grandmatherfather_insert_btn_id">登録</button> -->
                            <input type="submit" class="grandmatherfather_insert_btn_id" value="登録">
                         </td>
                     </tr>
                </div>
            </div>

                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖母母方ぺージ 新規個人登録-->
<div data-role="page" id="grandmathermather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖母母方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmathermatherdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="grandmathermather_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            名前<span class="attention"> * </span>
                         </th>
                        <td>
                          <input type="text" name="grandmathermather_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             生年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandmathermather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_birthday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             没年月日
                         </th>
                        <td>
                          <!-- <input type="date" name="grandmathermather_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_deathday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandmathermather_img == 1}
                            <img src="{$urlocalgrandmathermather}?{$urlquery_img_thumb_grandmathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                        </th>
                        <td>
                            <input type="text" name="grandmathermather_profession" value="" size="24" placeholder="職業を入力">
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                            </th>
                            <td>
                                <textarea id="grandmathermather_memo" name="grandmathermather_memo" placeholder="メモを入力">{$grandmathermatherMemo}</textarea>
                            </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <input type="submit" value="登録"> -->
                            <!-- <button type="button" class="grandmathermather_insert_btn_id">登録</button> -->
                            <input type="submit" class="grandmathermather_insert_btn_id" value="登録">
                         </td>
                     </tr>
                </div>
            </div>

                </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 　　　　　　　　　　故　人　様　一　覧　よ　り　追　加　処　理　　　　　　　　　　　　　 -->
<!-- 父親ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_father_insert">
    <div data-role="header" data-theme="f">
        <h1>父親情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/fatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="father_deceased_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                                <select class="deceasedlistfather" name="father_family_name">
                                    <option value="">大切な故人から選ぶ</option>
                                     {foreach from=$deceased_name_list item="deceasedname"}
                                    <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                 <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="father_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_birthday" value="" size="24" data-role="date" data-inline="false" id="father_birthday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="father_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_deathday" value="" size="24" data-role="date" data-inline="false" id="father_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>
                        </th>
                        <td>
                        {if $father_img == 1}
                            <img src="{$urlocalfather}?{$urlquery_img_thumb_father}" style="width: 100%; position:relative;">
                        {/if}
                        {if $father_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="father_deceasedlist_change">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                    </div>
            </div>

            <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <!-- 大切な個人＿写真 -->
                             </th>
                            <td>
                              <input type="hidden" name="father_img_name" value="" size="24" placeholder="" id="father_deceasedlist_img_name">
                          </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                職業
                             </th>
                            <td>
                              <input type="text" name="father_profession" value="" size="24" placeholder="職業を入力">
                          </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                メモ
                             </th>
                            <td>
<!--                              <input type="textarea" name="father_memo" value="">
 -->
                            <textarea id="father_memo" name="father_memo" placeholder="メモを入力"></textarea>
                         </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
            </div>

            <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="button" class="father_deceased_insert_btn_id">登録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
            </div>

            </form>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 母親ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_mather_insert">
    <div data-role="header" data-theme="f">
        <h1>母親情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/matherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="mather_deceased_insert_form_id">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                                <select class="deceasedlistmather" name="mather_family_name">
                                  <option value="">大切な故人から選ぶ</option>
                                   {foreach from=$deceased_name_list item="deceasedname"}
                                  <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                  {/foreach}
                              </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="mather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_birthday" value="" size="24" data-role="date" data-inline="false" id="mather_birthday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="mather_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_deathday" value="" size="24" data-role="date" data-inline="false" id="mather_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th style="margin-top:10px;">
                             顔写真<br>

                            </th>
                            <td>
                            {if $mather_img == 1}
                                <img src="{$urlocalmather}?{$urlquery_img_thumb_mather}" style="width: 100%; position:relative;">
                            {/if}
                            {if $mather_img == 0}
                                 <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="mather_deceasedlist_change">
                            {/if}
                            </td>
                        </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <!-- 大切な個人＿写真 -->
                             </th>
                            <td>
                              <input type="hidden" name="mather_img_name" value="" size="24" placeholder="" id="mather_deceasedlist_img_name">
                          </td>
                         </tr>
                    </div>
                </div>
                
                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="mather_profession" value="{$matherProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="mather_memo" name="mather_memo" placeholder="メモを入力">{$matherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="submit">登　録</button> -->
                                <!-- <button type="button" class="mather_deceased_insert_btn_id">登録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
                </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖父父方ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_grandfatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父父方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfatherfatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                              <select class="deceasedlistgrandfatherfather" name="grandfatherfather_family_name">
                                <option value="">大切な故人から選ぶ</option>
                                 {foreach from=$deceased_name_list item="deceasedname"}
                                <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                {/foreach}
                            </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandfatherfather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_birthday" value="" size="24" data-role="date" data-inline="false" id="grandfatherfather_birthday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandfatherfather_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_deathday" value="" size="24" data-role="date" data-inline="false" id="grandfatherfather_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandfatherfather_img == 1}
                            <img src="{$urlocalgrandfatherfather}?{$urlquery_img_thumb_grandfatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="grandfatherfather_profession" value="{$grandfatherfatherProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="grandfatherfather_memo" name="grandfatherfather_memo" placeholder="メモを入力">{$grandfatherfatherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="submit">登　録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
                </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖母父方ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_grandfathermather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖母父方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfathermatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                              <select class="deceasedlistgrandfathermather" name="grandfathermather_family_name">
                                <option value="">大切な故人から選ぶ</option>
                                 {foreach from=$deceased_name_list item="deceasedname"}
                                <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                {/foreach}
                            　</select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandfathermather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_birthday" value="" size="24" data-role="date" data-inline="false" id="grandfathermather_birthday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandfathermather_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_deathday" value="" size="24" data-role="date" data-inline="false" id="grandfathermather_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandfathermather_img == 1}
                            <img src="{$urlocalgrandfathermather}?{$urlquery_img_thumb_grandfathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="grandfathermather_profession" value="{$grandfathermatherProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="grandfathermather_memo" name="grandfathermather_memo" placeholder="メモを入力">{$grandfathermatherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="submit">登　録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
                </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖父母方ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_grandmatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父母方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmatherfatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                            <select class="deceasedlistgrandmatherfather" name="grandmatherfather_family_name">
                                <option value="">大切な故人から選ぶ</option>
                                 {foreach from=$deceased_name_list item="deceasedname"}
                                <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                {/foreach}
                            　</select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandmatherfather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_birthday" value="" size="24" data-role="date" data-inline="false" id="grandmatherfather_birthday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandmatherfather_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_deathday" value="" size="24" data-role="date" data-inline="false" id="grandmatherfather_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandmatherfather_img == 1}
                            <img src="{$urlocalgrandmatherfather}?{$urlquery_img_thumb_grandmatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                         </th>
                        <td>
                          <input type="text" name="grandmatherfather_profession" value="{$grandmatherfatherProfession}" size="24" placeholder="職業を入力">
                      </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="grandmatherfather_memo" name="grandmatherfather_memo" placeholder="メモを入力">{$grandmatherfatherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>

                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="submit">登　録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
                </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖母母方ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_grandmathermather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖母母方情報登録</h1>
        <a style= "float:right; font-weight:bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmathermatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                名前<span class="attention"> * </span>
                             </th>
                            <td>
                                <select class="deceasedlistgrandmathermather" name="grandmathermather_family_name">
                                <option value="">大切な故人から選ぶ</option>
                                 {foreach from=$deceased_name_list item="deceasedname"}
                                <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                {/foreach}
                            　</select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 生年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandmathermather_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_birthday" value="" size="24" data-role="date" data-inline="false" id="grandmathermather_birthday_insert">

                          </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                 没年月日
                             </th>
                            <td>
                              <!-- <input type="date" name="grandmathermather_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_deathday" value="" size="24" data-role="date" data-inline="false" id="grandmathermather_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $grandmathermather_img == 1}
                            <img src="{$urlocalgrandmathermather}?{$urlquery_img_thumb_grandmathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                      </td>
                    </tr>
                    <tr>
                        <th style="margin-top:20px;">
                        </th>
                        <td>
                         <input type="file" name="image" id='upload'/>
                      </td>
                    </tr>
                </div>
            </div>

                <div style="margin-top:20px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            職業
                        </th>
                        <td>
                          <input type="text" name="grandmathermather_profession" value="{$grandmathermatherProfession}" size="24" placeholder="職業を入力">
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            メモ
                        </th>
                        <td>
                            <textarea id="grandmathermather_memo" name="grandmathermather_memo" placeholder="メモを入力">{$grandmathermatherMemo}</textarea>
                        </td>
                     </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <tr>
                            <th>
                                <span class="attention"> * </span>は必須項目です
                             </th>
                            <td>
                         </td>
                         </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <button type="submit">登　録</button> -->
                                <input type="submit" value="登録">
                            </td>
                        </tr>
                    </div>
                </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


</body>
</html>
