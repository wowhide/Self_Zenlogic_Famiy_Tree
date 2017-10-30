<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css?var=20120829" />
    <link href="../../../../Family_Tree/css/jquery.mobile.datepicker.css" rel="stylesheet">
    <link href="../../../../Family_Tree/css/jquery.mobile.datepicker.theme.css" rel="stylesheet">
    <link href="//www.htmlhifive.com/ja/res/lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <link href="//code.htmlhifive.com/h5.css" rel="stylesheet" >
    <link href="../../../../Family_Tree/css/style.css?var=20120829" rel="stylesheet">
    <link href="../../../../Family_Tree/css/sweetalert.css" rel="stylesheet">
    <title>家系図_血族関係</title>

    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">


    <script src="//code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="//code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <script src="../../../../Family_Tree/js/jquery.mobile.datepicker.js"></script>
    <script src="//www.htmlhifive.com/ja/res/lib/jquery/jquery-2.js"></script>
    <script src="//www.htmlhifive.com/ja/res/lib/bootstrap3/js/bootstrap.min.js"></script>
    <script src="//code.htmlhifive.com/h5.dev.js"></script>
    <script src="../../../../Family_Tree/js/jquery.validate.min.js"></script>
    <script src="../../../../Family_Tree/js/form.js"></script>
    <script src="../../../../Family_Tree/js/sweetalert.min.js"></script>


    <style type="text/css">

body{
    background-color: #E8E8E8;
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
position: relative;

/*影*/
-webkit-box-shadow: 0 10px 6px -6px #777;
-moz-box-shadow: 0 10px 6px -6px #777;
    box-shadow: 0 10px 6px -6px #777;
}


div.Box div.ios {
width: 48px;
height: 40px;
position: absolute;
text-align:right;
border: 0px #ccc solid;
background-color: rgba(0, 0, 255, 0);
margin-top: 3.5px;
/*影*/
-webkit-box-shadow: 0 0 0 0 #777;
-moz-box-shadow: 0 0 0 0 #777;
    box-shadow: 0 0 0 0 #777;
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


// ---------------登録バリデーション------------------

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

    //配偶者情報登録＿バリデーションチェック
    $('.spouse_insert_btn_id').click(function(){

      if($("input[name='spouse_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#spouse_insert_form_id').submit();
  });

    //兄弟姉妹１情報登録＿バリデーションチェック
    $('.brotherone_insert_btn_id').click(function(){

      if($("input[name='brotherone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#brotherone_insert_form_id').submit();
  });


    //兄弟姉妹２情報登録＿バリデーションチェック
    $('.brothertwo_insert_btn_id').click(function(){

      if($("input[name='brothertwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#brothertwo_insert_form_id').submit();
  });

    //兄弟姉妹３情報登録＿バリデーションチェック
    $('.brotherthree_insert_btn_id').click(function(){

      if($("input[name='brotherthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#brotherthree_insert_form_id').submit();
  });

    //子供１情報登録＿バリデーションチェック
    $('.childone_insert_btn_id').click(function(){

      if($("input[name='childone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childone_insert_form_id').submit();
  });

    //子供２情報登録＿バリデーションチェック
    $('.childtwo_insert_btn_id').click(function(){

      if($("input[name='childtwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childtwo_insert_form_id').submit();
  });

    //子供３情報登録＿バリデーションチェック
    $('.childthree_insert_btn_id').click(function(){

      if($("input[name='childthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childthree_insert_form_id').submit();
  });

    //子供４情報登録＿バリデーションチェック
    $('.childfour_insert_btn_id').click(function(){

      if($("input[name='childfour_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childfour_insert_form_id').submit();
  });

    //子供１孫１情報登録＿バリデーションチェック
    $('.childonegrandsonone_insert_btn_id').click(function(){

      if($("input[name='childonegrandsonone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childonegrandsonone_insert_form_id').submit();
  });

    //子供１孫２情報登録＿バリデーションチェック
    $('.childonegrandsontwo_insert_btn_id').click(function(){

      if($("input[name='childonegrandsontwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childonegrandsontwo_insert_form_id').submit();
  });

    //子供１孫３情報登録＿バリデーションチェック
    $('.childonegrandsonthree_insert_btn_id').click(function(){

      if($("input[name='childonegrandsonthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childonegrandsonthree_insert_form_id').submit();
  });

    //子供２孫１情報登録＿バリデーションチェック
    $('.childtwograndsonone_insert_btn_id').click(function(){

      if($("input[name='childtwograndsonone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childtwograndsonone_insert_form_id').submit();
  });

    //子供２孫２情報登録＿バリデーションチェック
    $('.childtwograndsontwo_insert_btn_id').click(function(){

      if($("input[name='childtwograndsontwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childtwograndsontwo_insert_form_id').submit();
  });

    //子供２孫３情報登録＿バリデーションチェック
    $('.childtwograndsonthree_insert_btn_id').click(function(){

      if($("input[name='childtwograndsonthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childtwograndsonthree_insert_form_id').submit();
  });

    //子供３孫1情報登録＿バリデーションチェック
    $('.childthreegrandsonone_insert_btn_id').click(function(){

      if($("input[name='childthreegrandsonone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childthreegrandsonone_insert_form_id').submit();
  });

    //子供３孫２情報登録＿バリデーションチェック
    $('.childthreegrandsontwo_insert_btn_id').click(function(){

      if($("input[name='childthreegrandsontwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childthreegrandsontwo_insert_form_id').submit();
  });

    //子供３孫３情報登録＿バリデーションチェック
    $('.childthreegrandsonthree_insert_btn_id').click(function(){

      if($("input[name='childthreegrandsonthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childthreegrandsonthree_insert_form_id').submit();
  });

    //子供４孫1情報登録＿バリデーションチェック
    $('.childfourgrandsonone_insert_btn_id').click(function(){

      if($("input[name='childfourgrandsonone_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childfourgrandsonone_insert_form_id').submit();
  });

    //子供４孫２情報登録＿バリデーションチェック
    $('.childfourgrandsontwo_insert_btn_id').click(function(){

      if($("input[name='childfourgrandsontwo_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childfourgrandsontwo_insert_form_id').submit();
  });

    //子供４孫３情報登録＿バリデーションチェック
    $('.childfourgrandsonthree_insert_btn_id').click(function(){

      if($("input[name='childfourgrandsonthree_family_name']").val() == ""){
            //実行内容
            // alert('名前が入力されていません');
            swal("Error..", "名前が入力されていません");
            return false;
        };
        // return true;
            $('#childfourgrandsonthree_insert_form_id').submit();
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
            // //実行内容
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



// ------------修正バリデーション---------------------

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
        <h1></h1>

        <a style= "float:right; font-weight:bold;" href="#add" data-role="button" data-icon="plus">登録</a>

    </div>

    <!-- コンテンツ -->
    <div data-role="content">

<!-- 祖父・祖母 -->
<div class="Box" style="margin-bottom:30px;">

<!-- 祖父父方 -->
{if $grandfatherfather_img == 1}
 <div style="background-image: url({$urlocalgrandfatherfather}?{$urlquery_img_grandfatherfather});">
{/if}
{if $grandfatherfather_img == 0}
<div class="grandfatherfather" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $grandfatherfather_img == 2}
<div>
{/if}
{if $grandfatherfather_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        祖父父方<br>
    </span>
    <span style="font-size:{$grandfatherfatherFontSize}px;">
{if !empty($grandfatherfatherFamilyId) == false}
        <a href="#grandfatherfather_insert">情報登録</a>
{/if}

{if !empty($grandfatherfatherFamilyName) == false &&
    empty($grandfatherfatherFamilyId) == false
}
        <a href="#grandfatherfather_change">名前登録</a>
{/if}
{if empty($grandfatherfatherFamilyId) == false}
        <a href="#grandfatherfather_change">{$grandfatherfatherFamilyName}</a>
{/if}
    </span>
{if $grandfatherfather_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfatherfatherFamilyId}&deceasedlist_img_name={$grandfatherfatherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $grandfatherfather_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfatherfatherFamilyId}&deceasedlist_img_name={$grandfatherfatherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>

<!-- 祖父（父方）ー＞　祖母（父方）線  -->
<div style="background-color:gray; width:22px; height:0px; margin-top:35px; border: none;"></div>

<!-- 祖母父方 -->
{if $grandfathermather_img == 1}
 <div style="background-image: url({$urlocalgrandfathermather}?{$urlquery_img_grandfathermather});">
{/if}
{if $grandfathermather_img == 0}
<div class="grandfathermather" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $grandfathermather_img == 2}
<div>
{/if}
{if $grandfathermather_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        祖母父方<br>
    </span>
    <span style="font-size:{$grandfathermatherFontSize}px;">
{if !empty($grandfathermatherFamilyId) == false}
        <a href="#grandfathermather_insert">情報登録</a>
{/if}

{if !empty($grandfathermatherFamilyName) == false &&
    empty($grandfathermatherFamilyId) == false
}
        <a href="#grandfathermather_change">名前登録</a>
{/if}
{if empty($grandfathermatherFamilyId) == false}
        <a href="#grandfathermather_change">{$grandfathermatherFamilyName}</a>
{/if}
    </span>
{if $grandfathermather_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfathermatherFamilyId}&deceasedlist_img_name={$grandfathermatherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $grandfathermather_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfathermatherFamilyId}&deceasedlist_img_name={$grandfathermatherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>

<!-- 祖父母方 -->
{if $grandmatherfather_img == 1}
 <div style="margin-left:20px; background-image: url({$urlocalgrandmatherfather}?{$urlquery_img_grandmatherfather});">
{/if}
{if $grandmatherfather_img == 0}
<div class="grandmatherfather" style="margin-left:20px; background-image: url(../imges/Entypo.png);">
{/if}
{if $grandmatherfather_img == 2}
<div style="margin-left:20px;">
{/if}
{if $grandmatherfather_img == 3}
<div style="margin-left:20px;">
{/if}
    <span style="font-size:10px;">
        祖父母方<br>
    </span>
    <span style="font-size:{$grandmatherfatherFontSize}px;">
{if !empty($grandmatherfatherFamilyId) == false}
        <a href="#grandmatherfather_insert">情報登録</a>
{/if}

{if !empty($grandmatherfatherFamilyName) == false &&
    empty($grandmatherfatherFamilyId) == false
}
        <a href="#grandmatherfather_change">名前登録</a>
{/if}
{if empty($grandmatherfatherFamilyId) == false}
        <a href="#grandmatherfather_change">{$grandmatherfatherFamilyName}</a>
{/if}
    </span>
{if $grandmatherfather_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmatherfatherFamilyId}&deceasedlist_img_name={$grandmatherfatherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $grandmatherfather_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmatherfatherFamilyId}&deceasedlist_img_name={$grandmatherfatherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>

<!--     祖父（母方）ー＞　祖母（母方）線  -->
    <div style="background-color:gray; width:22px; height:0px; margin-top:35px; border: none;"></div>

<!--     <div style="margin-right:50px; background-image: url(../imges/Entypo.png);">祖母(母方）</div>
 -->
 <!-- 祖母母方 -->
{if $grandmathermather_img == 1}
 <div style="margin-right:50px; background-image: url({$urlocalgrandmathermather}?{$urlquery_img_grandmathermather});">
{/if}
{if $grandmathermather_img == 0}
<div class="grandmathermather" style="margin-right:50px; background-image: url(../imges/Entypo.png);">
{/if}
{if $grandmathermather_img == 2}
<div style="margin-right:50px;">
{/if}
{if $grandmathermather_img == 3}
<div style="margin-right:50px;">
{/if}
    <span style="font-size:10px;">
        祖母母方<br>
    </span>
    <span style="font-size:{$grandmathermatherFontSize}px;">
{if !empty($grandmathermatherFamilyId) == false}
        <a href="#grandmathermather_insert">情報登録</a>
{/if}

{if !empty($grandmathermatherFamilyName) == false &&
    empty($grandmathermatherFamilyId) == false
}
        <a href="#grandmathermather_change">名前登録</a>
{/if}
{if empty($grandmathermatherFamilyId) == false}
        <a href="#grandmathermather_change">{$grandmathermatherFamilyName}</a>
{/if}
    </span>
{if $grandmathermather_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmathermatherFamilyId}&deceasedlist_img_name={$grandmathermatherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $grandmathermather_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmathermatherFamilyId}&deceasedlist_img_name={$grandmathermatherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
</div>
<div>
        <!-- ライン -->
        <!-- 祖父（父方）・父親上線 -->
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:25px;">
        <!-- 祖母（父方）下線 -->
            <span style="background-color:gray; width:2px; height:20px; margin-left:80px; float: left;">
        <!-- 祖父（母方）・母親上線 -->
            <div style="background-color:gray; width:2px; height:20px; margin-left:50px;">
        <!-- 祖母（母方）下線 -->
            <div style="background-color:gray; width:2px; height:20px; margin-left:90px;">
            </div>
            </div>
            </span>
        </div>
        <!-- 祖父（父方）・父親中央横線 -->
        <div class="clearLeft" style="background-color:gray; width:82px; height:2px; margin-left:25px;">
        <!-- 祖父（母方）・母親中央横線 -->
            <span style="background-color:gray; width:92px; height:2px; margin-left:130px; float: left;">
            </span>
        </div>
        <!-- 祖父（父方）・父親下線 -->
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:25px;">
        <!-- 祖父（母方）・母親下線 -->
            <span style="background-color:gray; width:2px; height:20px; margin-left:130px; float: left;">
            </span>
        </div>


<!-- 父親・母親 -->
<div class="Box">

<!-- 父親 -->
{if $father_img == 1}
 <div style="background-image: url({$urlocalfather}?{$urlquery_img_father});">
{/if}
{if $father_img == 0}
<div class="father" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $father_img == 2}
<div>
{/if}
{if $father_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        父親<br>
    </span>
    <span style="font-size:{$fatherFontSize}px;">
{if !empty($fatherFamilyId) == false}
        <a href="#father_insert">情報登録</a>
{/if}

{if !empty($fatherFamilyName) == false &&
    empty($fatherFamilyId) == false
}
        <a href="#father_change">名前登録</a>
{/if}
{if empty($fatherFamilyId) == false}
        <a href="#father_change">{$fatherFamilyName}</a>
{/if}
    </span>

{if $father_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$fatherFamilyId}&deceasedlist_img_name={$fatherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $father_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$fatherFamilyId}&deceasedlist_img_name={$fatherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>

        <!-- ライン -->
        <!-- 父親・母親線 -->
        <div style="background-color:gray; width:70px; height:0px; margin-top:35px; border: none;"></div>

<!-- 母親 -->
{if $mather_img == 1}
 <div style="background-image: url({$urlocalmather}?{$urlquery_img_mather});">
{/if}
{if $mather_img == 0}
<div class="mather" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $mather_img == 2}
<div>
{/if}
{if $mather_img == 3}
<div>
{/if}


    <span style="font-size:10px;">
        母親<br>
    </span>
    <span style="font-size:{$matherFontSize}px;">
{if !empty($matherFamilyId) == false}
        <a href="#mather_insert">情報登録</a>
{/if}

{if !empty($matherFamilyName) == false &&
    empty($matherFamilyId) == false
}
        <a href="#mather_change">名前登録</a>
{/if}
{if empty($matherFamilyId) == false}
        <a href="#mather_change">{$matherFamilyName}</a>
{/if}
    </span>
{if $mather_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$matherFamilyId}&deceasedlist_img_name={$matherImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $mather_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$matherFamilyId}&deceasedlist_img_name={$matherImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>

</div>
        <!-- ライン -->
        <!-- 父親・自分上線 -->
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:25px;">

        <!-- 母親下線 -->
        <span style="background-color:gray; width:2px; height:20px; margin-left:120px; float: left;"></span>
        </div>

        <!-- 父親・自分中央横線 -->
        <div class="clearLeft" style="background-color:gray; width:122px; height:2px; margin-left:25px;"></div>

        <!-- 父親・自分下線 （配偶者登録未の時に表示）-->
        {if !empty($spouseFamilyId) == false}
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:25px;">
        </div>
        {/if}

        {if empty($spouseFamilyId) == false}
        <!-- 両親・自分下線 (配偶者登録時に表示）-->
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:80px;"></div>
        {/if}

<!-- 自分・配偶者・兄弟・姉妹 -->
<div class="Box">

<!-- 配偶者 -->
{if empty($spouseFamilyId) == false}

{if $spouse_img == 1}
 <div style="background-image: url({$urlocalspouse}?{$urlquery_img_spouse});">
{/if}
{if $spouse_img == 0}
<div class="spouse" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $spouse_img == 2}
<div>
{/if}
{if $spouse_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        配偶者<br>
    </span>
    <span style="font-size:{$spouseFontSize}px;">
{if !empty($spouseFamilyId) == false}
        <a href="#spouse_insert">情報登録</a>
{/if}

{if !empty($spouseFamilyName) == false &&
    empty($spouseFamilyId) == false
}
        <a href="#spouse_change">名前登録</a>
{/if}
{if empty($spouseFamilyId) == false}
        <a href="#spouse_change">{$spouseFamilyName}</a>
{/if}
    </span>

{if $spouse_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$spouseFamilyId}&deceasedlist_img_name={$spouseImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $spouse_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$spouseFamilyId}&deceasedlist_img_name={$spouseImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

<!-- 自分 -->
{if empty($spouseFamilyId) == false}

<!-- 配偶者・自分横線 -->
<div class="self"style="background-color:gray; width:10px; height:2px; margin-top:35px; border: none;"></div>
{/if}

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

<!-- 兄弟姉妹１（レイアウト） -->
{if empty($brotheroneFamilyId) == false}
<div class="brother_1" style="background-color:gray; width:7px; height:2px; margin-top:35px; border: none;"></div>
{if $brotherone_img == 1}
 <div style="background-image: url({$urlocalbrotherone}?{$urlquery_img_brotherone});">
{/if}
{if $brotherone_img == 0}
<div class="brotherone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $brotherone_img == 2}
<div>
{/if}
{if $brotherone_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        兄弟姉妹<br>
    </span>
    <span style="font-size:{$brotheroneFontSize}px;">
{if !empty($brotheroneFamilyId) == false}
        <a href="#brotherone_insert">情報登録</a>
{/if}

{if !empty($brotheroneFamilyName) == false &&
    empty($brotheroneFamilyId) == false
}
        <a href="#brotherone_change">名前登録</a>
{/if}
{if empty($brotheroneFamilyId) == false}
        <a href="#brotherone_change">{$brotheroneFamilyName}</a>
{/if}
    </span>

{if $brotherone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotheroneFamilyId}&deceasedlist_img_name={$brotheroneImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $brotherone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotheroneFamilyId}&deceasedlist_img_name={$brotheroneImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>

{/if}


<!-- 兄弟姉妹２（レイアウト）-->
{if empty($brothertwoFamilyId) == false}
<div class="brother_2" style="background-color:gray; width:7px; height:2px; margin-top:35px; border: none;"></div>
{if $brothertwo_img == 1}
 <div style="background-image: url({$urlocalbrothertwo}?{$urlquery_img_brothertwo});">
{/if}
{if $brothertwo_img == 0}
<div class="brothertwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $brothertwo_img == 2}
<div>
{/if}
{if $brothertwo_img == 3}
<div>
{/if}

    <span style="font-size:10px;">
        兄弟姉妹<br>
    </span>
    <span style="font-size:{$brothertwoFontSize}px;">
{if !empty($brothertwoFamilyId) == false}
        <a href="#brothertwo_insert">情報登録</a>
{/if}

{if !empty($brothertwoFamilyName) == false &&
    empty($brothertwoFamilyId) == false
}
        <a href="#brothertwo_change">名前登録</a>
{/if}
{if empty($brothertwoFamilyId) == false}
        <a href="#brothertwo_change">{$brothertwoFamilyName}</a>
{/if}
    </span>

{if $brothertwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brothertwoFamilyId}&deceasedlist_img_name={$brothertwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $brothertwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brothertwoFamilyId}&deceasedlist_img_name={$brothertwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

<!-- 兄弟姉妹３（レイアウト） -->
{if empty($brotherthreeFamilyId) == false}
<div class="brother_2" style="background-color:gray; width:7px; height:2px; margin-top:35px; border: none;"></div>
{if $brotherthree_img == 1}
 <div style="background-image: url({$urlocalbrotherthree}?{$urlquery_img_brotherthree});">
{/if}
{if $brotherthree_img == 0}
<div class="brotherthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $brotherthree_img == 2}
<div>
{/if}
{if $brotherthree_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        兄弟姉妹<br>
    </span>
    <span style="font-size:{$brotherthreeFontSize}px;">
{if !empty($brotherthreeFamilyId) == false}
        <a href="#brotherthree_insert">情報登録</a>
{/if}

{if !empty($brotherthreeFamilyName) == false &&
    empty($brotherthreeFamilyId) == false
}
        <a href="#brotherthree_change">名前登録</a>
{/if}
{if empty($brotherthreeFamilyId) == false}
        <a href="#brotherthree_change">{$brotherthreeFamilyName}</a>
{/if}
    </span>

{if $brotherthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotherthreeFamilyId}&deceasedlist_img_name={$brotherthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $brotherthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotherthreeFamilyId}&deceasedlist_img_name={$brotherthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

</div>

</div><!-- 全体 -->

</div>


{if empty($childoneFamilyId) == false
|| empty($childtwoFamilyId) == false
|| empty($childthreeFamilyId) == false
|| empty($childfourFamilyId) == false
}
<div>
        <!-- ライン -->
        <!-- 配偶者下線 -->
         <div class="clearLeft" style="background-color:gray; width:2px; height:15px; margin-left:38px; margin-top:-15px; border: none;">
        <!-- 両親・自分下線 -->
        <span style="background-color:gray; width:2px; height:15px; margin-left:60px; float: left; border: none;"></span>
        </div>
        <!-- 配偶者・自分中央横線 -->
        <div class="clearLeft" style="background-color:gray; width:62px; height:2px; margin-left:38px; border: none;"></div>

        {if empty($childoneFamilyId) == false}
        <!-- 配偶者・自分下線-->
        <div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:70px; border: none;"></div>
        {/if}
</div>
{/if}


<!-- ========= 子供 1とその孫（３人まで）=============== -->
<div class="Box" style="margin-left:45px;">

<!-- 子供１ -->
{if empty($childoneFamilyId) == false}
{if $childone_img == 1}
 <div style="background-image: url({$urlocalchildone}?{$urlquery_img_childone});">
{/if}
{if $childone_img == 0}
<div class="childone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childone_img == 2}
<div>
{/if}
{if $childone_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        子供<br>
    </span>
    <span style="font-size:{$childoneFontSize}px;">
{if !empty($childoneFamilyId) == false}
        <a href="#childone_insert">情報登録</a>
{/if}

{if !empty($childoneFamilyName) == false &&
    empty($childoneFamilyId) == false
}
        <a href="#childone_change">名前登録</a>
{/if}
{if empty($childoneFamilyId) == false}
        <a href="#childone_change">{$childoneFamilyName}</a>
{/if}
    </span>

{if $childone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childoneFamilyId}&deceasedlist_img_name={$childoneImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childoneFamilyId}&deceasedlist_img_name={$childoneImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

<!-- 子供１と子供２をつなぐ線 -->
{if empty($childtwoFamilyId) == false}
<div class="childonegrandsonone"style="background-color:gray; width:10px; height:2px; margin-top:35px; border: none;"></div>
{/if}

<!-- 子供２ -->
{if empty($childtwoFamilyId) == false}
{if $childtwo_img == 1}
 <div style="background-image: url({$urlocalchildtwo}?{$urlquery_img_childtwo});">
{/if}
{if $childtwo_img == 0}
<div class="childtwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childtwo_img == 2}
<div>
{/if}
{if $childtwo_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        子供<br>
    </span>
    <span style="font-size:{$childtwoFontSize}px;">
{if !empty($childtwoFamilyId) == false}
        <a href="#childtwo_insert">情報登録</a>
{/if}

{if !empty($childtwoFamilyName) == false &&
    empty($childtwoFamilyId) == false
}
        <a href="#childtwo_change">名前登録</a>
{/if}
{if empty($childtwoFamilyId) == false}
        <a href="#childtwo_change">{$childtwoFamilyName}</a>
{/if}
    </span>
{if $childtwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwoFamilyId}&deceasedlist_img_name={$childtwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $childtwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwoFamilyId}&deceasedlist_img_name={$childtwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
{/if}

<!-- 子供２と子供３をつなぐ線 -->
{if empty($childthreeFamilyId) == false}
<div class="childonegrandsontwo"style="background-color:gray; width:10px; height:2px; margin-top:35px; border: none;"></div>
{/if}

<!-- 子供３ -->
{if empty($childthreeFamilyId) == false}
{if $childthree_img == 1}
 <div style="background-image: url({$urlocalchildthree}?{$urlquery_img_childthree});">
{/if}
{if $childthree_img == 0}
<div class="childthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childthree_img == 2}
<div>
{/if}
{if $childthree_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        子供<br>
    </span>
    <span style="font-size:{$childthreeFontSize}px;">
{if !empty($childthreeFamilyId) == false}
        <a href="#childthree_insert">情報登録</a>
{/if}

{if !empty($childthreeFamilyName) == false &&
    empty($childthreeFamilyId) == false
}
        <a href="#childthree_change">名前登録</a>
{/if}
{if empty($childthreeFamilyId) == false}
        <a href="#childthree_change">{$childthreeFamilyName}</a>
{/if}
    </span>
{if $childthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreeFamilyId}&deceasedlist_img_name={$childthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $childthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreeFamilyId}&deceasedlist_img_name={$childthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
{/if}

<!-- 子供３と子供４をつなぐ線 -->
{if empty($childfourFamilyId) == false}
<div class="childonegrandsonthree"style="background-color:gray; width:10px; height:2px; margin-top:35px; border: none;"></div>
{/if}

<!-- 子供４ -->
{if empty($childfourFamilyId) == false}
{if $childfour_img == 1}
 <div style="background-image: url({$urlocalchildfour}?{$urlquery_img_childfour});">
{/if}
{if $childfour_img == 0}
<div class="childfour" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childfour_img == 2}
<div>
{/if}
{if $childfour_img == 3}
<div>
{/if}

    <span style="font-size:10px;">
        子供<br>
    </span>
    <span style="font-size:{$childfourFontSize}px;">
{if !empty($childfourFamilyId) == false}
        <a href="#childfour_insert">情報登録</a>
{/if}

{if !empty($childfourFamilyName) == false &&
    empty($childfourFamilyId) == false
}
        <a href="#childfour_change">名前登録</a>
{/if}
{if empty($childfourFamilyId) == false}
        <a href="#childfour_change">{$childfourFamilyName}</a>
{/if}
    </span>

{if $childfour_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourFamilyId}&deceasedlist_img_name={$childfourImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $childfour_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourFamilyId}&deceasedlist_img_name={$childfourImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
{/if}

</div>

{if empty($childonegrandsononeFamilyId) == false
|| empty($childtwograndsononeFamilyId) == false
|| empty($childthreegrandsononeFamilyId) == false
|| empty($childfourgrandsononeFamilyId) == false
}
<!-- 子供１孫１と子供１孫１をつなぐ線 -->
    <!-- データがある場合 -->
{if empty($childonegrandsononeFamilyId) == false}
<div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:70px; border: none;">
{/if}
    <!-- データがない場合で、子供２孫１、子供３孫１、子供４孫１のいずれかのデータがある -->
{if (!empty($childonegrandsononeFamilyId) == false
&& empty($childtwograndsononeFamilyId) == false)
|| (!empty($childonegrandsononeFamilyId) == false
&& empty($childthreegrandsononeFamilyId) == false)
|| (!empty($childonegrandsononeFamilyId) == false
&& empty($childfourgrandsononeFamilyId) == false)
}
<div class="clearLeft" style="background-color:gray; width:0px; height:20px; margin-left:70px; border: none;">
{/if}

        <!-- 子供２孫１と子供２孫１をつなぐ線 -->
            <!-- データがある場合 -->
    {if empty($childtwograndsononeFamilyId) == false}
    <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- データがない場合で、子供1孫１、子供３孫１、子供４孫１のいずれかのデータがある -->
    {if (!empty($childtwograndsononeFamilyId) == false
        && empty($childonegrandsononeFamilyId) == false)
        || (!empty($childtwograndsononeFamilyId) == false
        && empty($childthreegrandsononeFamilyId) == false)
        || (!empty($childtwograndsononeFamilyId) == false
        && empty($childfourgrandsononeFamilyId) == false)
    }
    <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- 子供３孫１と子供３孫１をつなぐ線 -->
                <!-- データがある場合 -->
            {if empty($childthreegrandsononeFamilyId) == false}
            <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- データがない場合で、子供1孫１、子供２孫１、子供４孫１のいずれかのデータがある -->
            {if (!empty($childthreegrandsononeFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false)
                || (!empty($childthreegrandsononeFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false)
                || (!empty($childthreegrandsononeFamilyId) == false
                && empty($childfourgrandsononeFamilyId) == false)
            }
            <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- 子供４と子供４孫１をつなぐ線 -->
                    <!-- データがある場合 -->
                {if empty($childfourgrandsononeFamilyId) == false}
                <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
                {/if}
                    <!-- データがない場合で、子供1孫１、子供２孫１、子供３孫１のいずれかのデータがある -->
                {if (!empty($childfourgrandsononeFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false)
                || (!empty($childfourgrandsononeFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false)
                || (!empty($childfourgrandsononeFamilyId) == false
                && empty($childthreegrandsononeFamilyId) == false)
                }
                <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
                {/if}
                </span>

            </span>
    </span>
</div>
{/if}


<!-- ========= 子供２とその孫（３人まで）========= -->
<div class="Box" style="margin-left:45px;">

<!-- 子供１孫１ -->
    <!-- データがある場合 -->
{if empty($childonegrandsononeFamilyId) == false}
{if $childonegrandsonone_img == 1}
 <div style="background-image: url({$urlocalchildonegrandsonone}?{$urlquery_img_childonegrandsonone});">
{/if}
{if $childonegrandsonone_img == 0}
<div class="childonegrandsonone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childonegrandsonone_img == 2}
<div>
{/if}
{if $childonegrandsonone_img == 3}
<div>
{/if}

    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childonegrandsononeFontSize}px;">
{if !empty($childonegrandsononeFamilyId) == false}
        <a href="#childonegrandsonone_insert">情報登録</a>
{/if}

{if !empty($childonegrandsononeFamilyName) == false &&
    empty($childonegrandsononeFamilyId) == false
}
        <a href="#childonegrandsonone_change">名前登録</a>
{/if}
{if empty($childonegrandsononeFamilyId) == false}
        <a href="#childonegrandsonone_change">{$childonegrandsononeFamilyName}</a>
{/if}
    </span>

{if $childonegrandsonone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsononeFamilyId}&deceasedlist_img_name={$childonegrandsononeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $childonegrandsonone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsononeFamilyId}&deceasedlist_img_name={$childonegrandsononeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供２孫１、子供３孫１、子供４孫１のいずれかのデータがある -->
{if (!empty($childonegrandsononeFamilyId) == false
&& empty($childtwograndsononeFamilyId) == false)
|| (!empty($childonegrandsononeFamilyId) == false
&& empty($childthreegrandsononeFamilyId) == false)
|| (!empty($childonegrandsononeFamilyId) == false
&& empty($childfourgrandsononeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}


<!-- 子供１孫１と子供２孫１をつなぐ線 -->
<div class="childtwograndsonone"style="background-color:gray; width:0px; height:2px; margin-top:35px; border: none;  margin-left:10px;"></div>


<!-- 子供２孫１ -->
    <!-- データがある場合 -->
{if empty($childtwograndsononeFamilyId) == false}
{if $childtwograndsonone_img == 1}
 <div style="background-image: url({$urlocalchildtwograndsonone}?{$urlquery_img_childtwograndsonone});">
{/if}
{if $childtwograndsonone_img == 0}
<div class="childtwograndsonone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childtwograndsonone_img == 2}
<div>
{/if}
{if $childtwograndsonone_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childtwograndsononeFontSize}px;">
{if !empty($childtwograndsononeFamilyId) == false}
        <a href="#childtwograndsonone_insert">情報登録</a>
{/if}

{if !empty($childtwograndsononeFamilyName) == false &&
    empty($childtwograndsononeFamilyId) == false
}
        <a href="#childtwograndsonone_change">名前登録</a>
{/if}
{if empty($childtwograndsononeFamilyId) == false}
        <a href="#childtwograndsonone_change">{$childtwograndsononeFamilyName}</a>
{/if}
    </span>

{if $childtwograndsonone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsononeFamilyId}&deceasedlist_img_name={$childtwograndsononeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}
{if $childtwograndsonone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsononeFamilyId}&deceasedlist_img_name={$childtwograndsononeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供１孫１、子供３孫１、子供４孫１のいずれかのデータがある -->
{if (!empty($childtwograndsononeFamilyId) == false
&& empty($childonegrandsononeFamilyId) == false)
|| (!empty($childtwograndsononeFamilyId) == false
&& empty($childthreegrandsononeFamilyId) == false)
|| (!empty($childtwograndsononeFamilyId) == false
&& empty($childfourgrandsononeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供２孫１と子供３孫１をつなぐ線 -->
<div class="childtwograndsontwo"style="background-color:gray; width:0px; height:2px; margin-top:35px; border: none; margin-left:10px;"></div>

<!-- 子供３孫１ -->
    <!-- データがある場合 -->
{if empty($childthreegrandsononeFamilyId) == false}
{if $childthreegrandsonone_img == 1}
 <div style="background-image: url({$urlocalchildthreegrandsonone}?{$urlquery_img_childthreegrandsonone});">
{/if}
{if $childthreegrandsonone_img == 0}
<div class="childthreegrandsonone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childthreegrandsonone_img == 2}
<div>
{/if}
{if $childthreegrandsonone_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childthreegrandsononeFontSize}px;">
{if !empty($childthreegrandsononeFamilyId) == false}
        <a href="#childthreegrandsonone_insert">情報登録</a>
{/if}

{if !empty($childthreegrandsononeFamilyName) == false &&
    empty($childthreegrandsononeFamilyId) == false
}
        <a href="#childthreegrandsonone_change">名前登録</a>
{/if}
{if empty($childthreegrandsononeFamilyId) == false}
        <a href="#childthreegrandsonone_change">{$childthreegrandsononeFamilyName}</a>
{/if}
    </span>

{if $childthreegrandsonone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsononeFamilyId}&deceasedlist_img_name={$childthreegrandsononeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childthreegrandsonone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsononeFamilyId}&deceasedlist_img_name={$childthreegrandsononeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供１孫１、子供２孫１、子供４孫１のいずれかのデータがある -->
{if (!empty($childthreegrandsononeFamilyId) == false
&& empty($childonegrandsononeFamilyId) == false)
|| (!empty($childthreegrandsononeFamilyId) == false
&& empty($childtwograndsononeFamilyId) == false)
|| (!empty($childthreegrandsononeFamilyId) == false
&& empty($childfourgrandsononeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供３孫１と子供４孫１をつなぐ線 -->
<div class="childtwograndsonthree"style="background-color:gray; width:0px; height:2px; margin-top:35px; border: none; margin-left:10px;"></div>


<!-- 子供４孫１ -->
    <!-- データがある場合 -->
{if empty($childfourgrandsononeFamilyId) == false}
{if $childfourgrandsonone_img == 1}
 <div style="background-image: url({$urlocalchildfourgrandsonone}?{$urlquery_img_childfourgrandsonone});">
{/if}
{if $childfourgrandsonone_img == 0}
<div class="childfourgrandsonone" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childfourgrandsonone_img == 2}
<div>
{/if}
{if $childfourgrandsonone_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childfourgrandsononeFontSize}px;">
{if !empty($childfourgrandsononeFamilyId) == false}
        <a href="#childfourgrandsonone_insert">情報登録</a>
{/if}

{if !empty($childfourgrandsononeFamilyName) == false &&
    empty($childfourgrandsononeFamilyId) == false
}
        <a href="#childfourgrandsonone_change">名前登録</a>
{/if}
{if empty($childfourgrandsononeFamilyId) == false}
        <a href="#childfourgrandsonone_change">{$childfourgrandsononeFamilyName}</a>
{/if}
    </span>

{if $childfourgrandsonone_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsononeFamilyId}&deceasedlist_img_name={$childfourgrandsononeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childfourgrandsonone_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsononeFamilyId}&deceasedlist_img_name={$childfourgrandsononeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供１孫１、子供２孫１、子供３孫１のいずれかのデータがある -->
{if (!empty($childfourgrandsononeFamilyId) == false
&& empty($childonegrandsononeFamilyId) == false)
|| (!empty($childfourgrandsononeFamilyId) == false
&& empty($childtwograndsononeFamilyId) == false)
|| (!empty($childfourgrandsononeFamilyId) == false
&& empty($childthreegrandsononeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

</div>


<!-- 孫２系、上のボックスとつなぐ線 -->
{if empty($childonegrandsontwoFamilyId) == false
|| empty($childtwograndsontwoFamilyId) == false
|| empty($childthreegrandsontwoFamilyId) == false
|| empty($childfourgrandsontwoFamilyId) == false
}
<!-- 子供１孫２と子供１孫２をつなぐ線 -->
    <!-- データがある場合 -->
{if empty($childonegrandsontwoFamilyId) == false}
<div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:70px; border: none;">
{/if}
    <!-- データがない場合で、子供２孫２、子供３孫２、子供４孫２のいずれかのデータがある -->
{if (!empty($childonegrandsontwoFamilyId) == false
&& empty($childtwograndsontwoFamilyId) == false)
|| (!empty($childonegrandsontwoFamilyId) == false
&& empty($childthreegrandsontwoFamilyId) == false)
|| (!empty($childonegrandsontwoFamilyId) == false
&& empty($childfourgrandsontwoFamilyId) == false)
}
<div class="clearLeft" style="background-color:gray; width:0px; height:20px; margin-left:70px; border: none;">
{/if}

        <!-- 子供２孫２と子供２孫２をつなぐ線 -->
            <!-- データがある場合 -->
    {if empty($childtwograndsontwoFamilyId) == false}
    <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- データがない場合で、子供1孫２、子供３孫２、子供４孫２のいずれかのデータがある -->
    {if (!empty($childtwograndsontwoFamilyId) == false
        && empty($childonegrandsontwoFamilyId) == false)
        || (!empty($childtwograndsontwoFamilyId) == false
        && empty($childthreegrandsontwoFamilyId) == false)
        || (!empty($childtwograndsontwoFamilyId) == false
        && empty($childfourgrandsontwoFamilyId) == false)
    }
    <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- 子供３孫２と子供３孫２をつなぐ線 -->
                <!-- データがある場合 -->
            {if empty($childthreegrandsontwoFamilyId) == false}
            <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- データがない場合で、子供1孫２、子供２孫２、子供４孫２のいずれかのデータがある -->
            {if (!empty($childthreegrandsontwoFamilyId) == false
                && empty($childonegrandsontwoFamilyId) == false)
                || (!empty($childthreegrandsontwoFamilyId) == false
                && empty($childtwograndsontwoFamilyId) == false)
                || (!empty($childthreegrandsontwoFamilyId) == false
                && empty($childfourgrandsontwoFamilyId) == false)
            }
            <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- 子供４と子供４孫２をつなぐ線 -->
                    <!-- データがある場合 -->
                {if empty($childfourgrandsontwoFamilyId) == false}
                <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
                {/if}
                    <!-- データがない場合で、子供1孫２、子供２孫２、子供３孫２のいずれかのデータがある -->
                {if (!empty($childfourgrandsontwoFamilyId) == false
                && empty($childonegrandsontwoFamilyId) == false)
                || (!empty($childfourgrandsontwoFamilyId) == false
                && empty($childtwograndsontwoFamilyId) == false)
                || (!empty($childfourgrandsontwoFamilyId) == false
                && empty($childthreegrandsontwoFamilyId) == false)
                }
                <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
                {/if}
                </span>

            </span>
    </span>
</div>
{/if}

<!-- =========子供３とその孫（３人まで）========= -->
<div class="Box" style="margin-left:45px;">

<!-- 子供１孫２ -->
    <!-- データがある場合 -->
{if empty($childonegrandsontwoFamilyId) == false}
{if $childonegrandsontwo_img == 1}
 <div style="background-image: url({$urlocalchildonegrandsontwo}?{$urlquery_img_childonegrandsontwo});">
{/if}
{if $childonegrandsontwo_img == 0}
<div class="childonegrandsontwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childonegrandsontwo_img == 2}
<div>
{/if}
{if $childonegrandsontwo_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childonegrandsontwoFontSize}px;">
{if !empty($childonegrandsontwoFamilyId) == false}
        <a href="#childonegrandsontwo_insert">情報登録</a>
{/if}

{if !empty($childonegrandsontwoFamilyName) == false &&
    empty($childonegrandsontwoFamilyId) == false
}
        <a href="#childonegrandsontwo_change">名前登録</a>
{/if}
{if empty($childonegrandsontwoFamilyId) == false}
        <a href="#childonegrandsontwo_change">{$childonegrandsontwoFamilyName}</a>
{/if}
    </span>

{if $childonegrandsontwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsontwoFamilyId}&deceasedlist_img_name={$childonegrandsontwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childonegrandsontwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsontwoFamilyId}&deceasedlist_img_name={$childonegrandsontwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供２孫３、子供３孫３、子供４孫３のいずれかのデータがある -->
{if (!empty($childonegrandsontwoFamilyId) == false
&& empty($childtwograndsontwoFamilyId) == false)
|| (!empty($childonegrandsontwoFamilyId) == false
&& empty($childthreegrandsontwoFamilyId) == false)
|| (!empty($childonegrandsontwoFamilyId) == false
&& empty($childfourgrandsontwoFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}


<!-- 子供１孫２と子供２孫２をつなぐ線 -->
<div class="childthreegrandsonone"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>

<!-- 子供２孫２ -->
    <!-- データがある場合 -->
{if empty($childtwograndsontwoFamilyId) == false}
{if $childtwograndsontwo_img == 1}
 <div style="background-image: url({$urlocalchildtwograndsontwo}?{$urlquery_img_childtwograndsontwo});">
{/if}
{if $childtwograndsontwo_img == 0}
<div class="childtwograndsontwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childtwograndsontwo_img == 2}
<div>
{/if}
{if $childtwograndsontwo_img == 3}
<div>
{/if}

    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childtwograndsontwoFontSize}px;">
{if !empty($childtwograndsontwoFamilyId) == false}
        <a href="#childtwograndsontwo_insert">情報登録</a>
{/if}

{if !empty($childtwograndsontwoFamilyName) == false &&
    empty($childtwograndsontwoFamilyId) == false
}
        <a href="#childtwograndsontwo_change">名前登録</a>
{/if}
{if empty($childtwograndsontwoFamilyId) == false}
        <a href="#childtwograndsontwo_change">{$childtwograndsontwoFamilyName}</a>
{/if}
    </span>

{if $childtwograndsontwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsontwoFamilyId}&deceasedlist_img_name={$childtwograndsontwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childtwograndsontwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsontwoFamilyId}&deceasedlist_img_name={$childtwograndsontwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供１孫２、子供３孫２、子供４孫２のいずれかのデータがある -->
{if (!empty($childtwograndsontwoFamilyId) == false
&& empty($childonegrandsontwoFamilyId) == false)
|| (!empty($childtwograndsontwoFamilyId) == false
&& empty($childthreegrandsontwoFamilyId) == false)
|| (!empty($childtwograndsontwoFamilyId) == false
&& empty($childfourgrandsontwoFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供２孫２と子供３孫２をつなぐ線 -->
<div class="childthreegrandsontwo"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>


<!-- 子供３孫２ -->
    <!-- データがある場合 -->
{if empty($childthreegrandsontwoFamilyId) == false}
{if $childthreegrandsontwo_img == 1}
 <div style="background-image: url({$urlocalchildthreegrandsontwo}?{$urlquery_img_childthreegrandsontwo});">
{/if}
{if $childthreegrandsontwo_img == 0}
<div class="childthreegrandsontwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childthreegrandsontwo_img == 2}
<div>
{/if}
{if $childthreegrandsontwo_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childthreegrandsontwoFontSize}px;">
{if !empty($childthreegrandsontwoFamilyId) == false}
        <a href="#childthreegrandsontwo_insert">情報登録</a>
{/if}

{if !empty($childthreegrandsontwoFamilyName) == false &&
    empty($childthreegrandsontwoFamilyId) == false
}
        <a href="#childthreegrandsontwo_change">名前登録</a>
{/if}
{if empty($childthreegrandsontwoFamilyId) == false}
        <a href="#childthreegrandsontwo_change">{$childthreegrandsontwoFamilyName}</a>
{/if}
    </span>
{if $childthreegrandsontwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsontwoFamilyId}&deceasedlist_img_name={$childthreegrandsontwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childthreegrandsontwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsontwoFamilyId}&deceasedlist_img_name={$childthreegrandsontwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
{/if}

    <!-- データがない場合で、子供１孫２、子供２孫２、子供４孫２のいずれかのデータがある -->
{if (!empty($childthreegrandsontwoFamilyId) == false
&& empty($childonegrandsontwoFamilyId) == false)
|| (!empty($childthreegrandsontwoFamilyId) == false
&& empty($childtwograndsontwoFamilyId) == false)
|| (!empty($childthreegrandsontwoFamilyId) == false
&& empty($childfourgrandsontwoFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供３孫２と子供４孫２をつなぐ線 -->
<div class="childthreegrandsonthree"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>

<!-- 子供４孫２ -->
    <!-- データがある場合 -->
{if empty($childfourgrandsontwoFamilyId) == false}
{if $childfourgrandsontwo_img == 1}
 <div style="background-image: url({$urlocalchildfourgrandsontwo}?{$urlquery_img_childfourgrandsontwo});">
{/if}
{if $childfourgrandsontwo_img == 0}
<div class="childfourgrandsontwo" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childfourgrandsontwo_img == 2}
<div>
{/if}
{if $childfourgrandsontwo_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childfourgrandsontwoFontSize}px;">
{if !empty($childfourgrandsontwoFamilyId) == false}
        <a href="#childfourgrandsontwo_insert">情報登録</a>
{/if}

{if !empty($childfourgrandsontwoFamilyName) == false &&
    empty($childfourgrandsontwoFamilyId) == false
}
        <a href="#childfourgrandsontwo_change">名前登録</a>
{/if}
{if empty($childfourgrandsontwoFamilyId) == false}
        <a href="#childfourgrandsontwo_change">{$childfourgrandsontwoFamilyName}</a>
{/if}
    </span>
{if $childfourgrandsontwo_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsontwoFamilyId}&deceasedlist_img_name={$childfourgrandsontwoImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childfourgrandsontwo_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsontwoFamilyId}&deceasedlist_img_name={$childfourgrandsontwoImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供１孫２、子供２孫２、子供４孫２のいずれかのデータがある -->
{if (!empty($childfourgrandsontwoFamilyId) == false
&& empty($childonegrandsontwoFamilyId) == false)
|| (!empty($childfourgrandsontwoFamilyId) == false
&& empty($childtwograndsontwoFamilyId) == false)
|| (!empty($childfourgrandsontwoFamilyId) == false
&& empty($childthreegrandsontwoFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

</div>

<!-- 孫３系、上のボックスとつなぐ線 -->
{if empty($childonegrandsonthreeFamilyId) == false
|| empty($childtwograndsonthreeFamilyId) == false
|| empty($childthreegrandsonthreeFamilyId) == false
|| empty($childfourgrandsonthreeFamilyId) == false
}
<!-- 子供１孫２と子供１孫３をつなぐ線 -->
    <!-- データがある場合 -->
{if empty($childonegrandsonthreeFamilyId) == false}
<div class="clearLeft" style="background-color:gray; width:2px; height:20px; margin-left:70px; border: none;">
{/if}
    <!-- データがない場合で、子供２孫３、子供３孫３、子供４孫３のいずれかのデータがある -->
{if (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childtwograndsonthreeFamilyId) == false)
|| (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childthreegrandsonthreeFamilyId) == false)
|| (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childfourgrandsonthreeFamilyId) == false)
}
<div class="clearLeft" style="background-color:gray; width:0px; height:20px; margin-left:70px; border: none;">
{/if}

        <!-- 子供２孫２と子供２孫３をつなぐ線 -->
            <!-- データがある場合 -->
    {if empty($childtwograndsonthreeFamilyId) == false}
    <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- データがない場合で、子供1孫３、子供３孫３、子供４孫３のいずれかのデータがある -->
    {if (!empty($childtwograndsonthreeFamilyId) == false
        && empty($childonegrandsonthreeFamilyId) == false)
        || (!empty($childtwograndsonthreeFamilyId) == false
        && empty($childthreegrandsonthreeFamilyId) == false)
        || (!empty($childtwograndsonthreeFamilyId) == false
        && empty($childfourgrandsonthreeFamilyId) == false)
    }
    <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
    {/if}
            <!-- 子供３孫２と子供３孫３をつなぐ線 -->
                <!-- データがある場合 -->
            {if empty($childthreegrandsonthreeFamilyId) == false}
            <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- データがない場合で、子供1孫３、子供２孫３、子供４孫３のいずれかのデータがある -->
            {if (!empty($childthreegrandsonthreeFamilyId) == false
                && empty($childonegrandsonthreeFamilyId) == false)
                || (!empty($childthreegrandsonthreeFamilyId) == false
                && empty($childtwograndsonthreeFamilyId) == false)
                || (!empty($childthreegrandsonthreeFamilyId) == false
                && empty($childfourgrandsonthreeFamilyId) == false)
            }
            <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
            {/if}
                <!-- 子供４と子供４孫２をつなぐ線 -->
                    <!-- データがある場合 -->
                {if empty($childfourgrandsonthreeFamilyId) == false}
                <span style="background-color:gray; width:2px; height:20px; margin-left:59px; float: left;">
                {/if}
                    <!-- データがない場合で、子供1孫３、子供２孫３、子供３孫３のいずれかのデータがある -->
                {if (!empty($childfourgrandsonthreeFamilyId) == false
                && empty($childonegrandsonthreeFamilyId) == false)
                || (!empty($childfourgrandsonthreeFamilyId) == false
                && empty($childtwograndsonthreeFamilyId) == false)
                || (!empty($childfourgrandsonthreeFamilyId) == false
                && empty($childthreegrandsonthreeFamilyId) == false)
                }
                <span style="background-color:gray; width:0px; height:20px; margin-left:59px; float: left;">
                {/if}
                </span>

            </span>
    </span>
</div>
{/if}

<!-- =========子供４とその孫（３人まで）========= -->
<div class="Box" style="margin-left:45px; margin-bottom:100px;">

<!-- ****** 子供１孫３ ******* -->
    <!-- データがある場合 -->
{if empty($childonegrandsonthreeFamilyId) == false}
{if $childonegrandsonthree_img == 1}
 <div style="background-image: url({$urlocalchildonegrandsonthree}?{$urlquery_img_childonegrandsonthree});">
{/if}
{if $childonegrandsonthree_img == 0}
<div class="childonegrandsonthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childonegrandsonthree_img == 2}
<div>
{/if}
{if $childonegrandsonthree_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childonegrandsonthreeFontSize}px;">
{if !empty($childonegrandsonthreeFamilyId) == false}
        <a href="#childonegrandsonthree_insert">情報登録</a>
{/if}

{if !empty($childonegrandsonthreeFamilyName) == false &&
    empty($childonegrandsonthreeFamilyId) == false
}
        <a href="#childonegrandsonthree_change">名前登録</a>
{/if}
{if empty($childonegrandsonthreeFamilyId) == false}
        <a href="#childonegrandsonthree_change">{$childonegrandsonthreeFamilyName}</a>
{/if}
    </span>

{if $childonegrandsonthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsonthreeFamilyId}&deceasedlist_img_name={$childonegrandsonthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childonegrandsonthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsonthreeFamilyId}&deceasedlist_img_name={$childonegrandsonthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供２孫３、子供３孫３、子供４孫３のいずれかのデータがある -->
{if (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childtwograndsonthreeFamilyId) == false)
|| (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childthreegrandsonthreeFamilyId) == false)
|| (!empty($childonegrandsonthreeFamilyId) == false
&& empty($childfourgrandsonthreeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供１孫３と子供２孫３をつなぐ線 -->
<div class="childfourgrandsonone"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>

<!-- 子供２孫３ -->
    <!-- データがある場合 -->
{if empty($childtwograndsonthreeFamilyId) == false}
{if $childtwograndsonthree_img == 1}
 <div style="background-image: url({$urlocalchildtwograndsonthree}?{$urlquery_img_childtwograndsonthree});">
{/if}
{if $childtwograndsonthree_img == 0}
<div class="childtwograndsonthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childtwograndsonthree_img == 2}
<div>
{/if}
{if $childtwograndsonthree_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childtwograndsonthreeFontSize}px;">
{if !empty($childtwograndsonthreeFamilyId) == false}
        <a href="#childtwograndsonthree_insert">情報登録</a>
{/if}

{if !empty($childtwograndsonthreeFamilyName) == false &&
    empty($childtwograndsonthreeFamilyId) == false
}
        <a href="#childtwograndsonthree_change">名前登録</a>
{/if}
{if empty($childtwograndsonthreeFamilyId) == false}
        <a href="#childtwograndsonthree_change">{$childtwograndsonthreeFamilyName}</a>
{/if}
    </span>

{if $childtwograndsonthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsonthreeFamilyId}&deceasedlist_img_name={$childtwograndsonthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childtwograndsonthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsonthreeFamilyId}&deceasedlist_img_name={$childtwograndsonthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供1孫３、子供３孫３、子供４孫３のいずれかのデータがある -->
{if (!empty($childtwograndsonthreeFamilyId) == false
&& empty($childonegrandsonthreeFamilyId) == false)
|| (!empty($childtwograndsonthreeFamilyId) == false
&& empty($childthreegrandsonthreeFamilyId) == false)
|| (!empty($childtwograndsonthreeFamilyId) == false
&& empty($childfourgrandsonthreeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供２孫３と子供３孫３をつなぐ線 -->
<div class="childfourgrandsontwo"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>

<!-- 子供３孫３ -->
    <!-- データがある場合 -->
{if empty($childthreegrandsonthreeFamilyId) == false}
{if $childthreegrandsonthree_img == 1}
 <div style="background-image: url({$urlocalchildthreegrandsonthree}?{$urlquery_img_childthreegrandsonthree});">
{/if}
{if $childthreegrandsonthree_img == 0}
<div class="childthreegrandsonthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childthreegrandsonthree_img == 2}
<div>
{/if}
{if $childthreegrandsonthree_img == 3}
<div>
{/if}

    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childthreegrandsonthreeFontSize}px;">
{if !empty($childthreegrandsonthreeFamilyId) == false}
        <a href="#childthreegrandsonthree_insert">情報登録</a>
{/if}

{if !empty($childthreegrandsonthreeFamilyName) == false &&
    empty($childthreegrandsonthreeFamilyId) == false
}
        <a href="#childthreegrandsonthree_change">名前登録</a>
{/if}
{if empty($childthreegrandsonthreeFamilyId) == false}
        <a href="#childthreegrandsonthree_change">{$childthreegrandsonthreeFamilyName}</a>
{/if}
    </span>

{if $childthreegrandsonthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsonthreeFamilyId}&deceasedlist_img_name={$childthreegrandsonthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childthreegrandsonthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsonthreeFamilyId}&deceasedlist_img_name={$childthreegrandsonthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}

</div>
{/if}

    <!-- データがない場合で、子供1孫３、子供２孫３、子供４孫３のいずれかのデータがある -->
{if (!empty($childthreegrandsonthreeFamilyId) == false
&& empty($childonegrandsonthreeFamilyId) == false)
|| (!empty($childthreegrandsonthreeFamilyId) == false
&& empty($childtwograndsonthreeFamilyId) == false)
|| (!empty($childthreegrandsonthreeFamilyId) == false
&& empty($childfourgrandsonthreeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

<!-- 子供３孫３と子供４孫３をつなぐ線 -->
<div class="childfourgrandsonthree"style="background-color:gray; width:10px; height:0px; margin-top:35px; border: none;"></div>

<!-- 子供４孫３ -->
    <!-- データがある場合 -->
{if empty($childfourgrandsonthreeFamilyId) == false}
{if $childfourgrandsonthree_img == 1}
 <div style="background-image: url({$urlocalchildfourgrandsonthree}?{$urlquery_img_childfourgrandsonthree});">
{/if}
{if $childfourgrandsonthree_img == 0}
<div class="childfourgrandsonthree" style="background-image: url(../imges/Entypo.png);">
{/if}
{if $childfourgrandsonthree_img == 2}
<div>
{/if}
{if $childfourgrandsonthree_img == 3}
<div>
{/if}
    <span style="font-size:10px;">
        孫<br>
    </span>
    <span style="font-size:{$childfourgrandsonthreeFontSize}px;">
{if !empty($childfourgrandsonthreeFamilyId) == false}
        <a href="#childfourgrandsonthree_insert">情報登録</a>
{/if}

{if !empty($childfourgrandsonthreeFamilyName) == false &&
    empty($childfourgrandsonthreeFamilyId) == false
}
        <a href="#childfourgrandsonthree_change">名前登録</a>
{/if}
{if empty($childfourgrandsonthreeFamilyId) == false}
        <a href="#childfourgrandsonthree_change">{$childfourgrandsonthreeFamilyName}</a>
{/if}
    </span>
{if $childfourgrandsonthree_img == 2}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsonthreeFamilyId}&deceasedlist_img_name={$childfourgrandsonthreeImgName}" style="width: auto; height: 40px;">
    </div>
{/if}

{if $childfourgrandsonthree_img == 3}
    <div class="ios">
        <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsonthreeFamilyId}&deceasedlist_img_name={$childfourgrandsonthreeImgName}" style="width: 40px; height: auto;">
    </div>
{/if}
</div>
{/if}

    <!-- データがない場合で、子供1孫３、子供２孫３、子供３孫３のいずれかのデータがある -->
{if (!empty($childfourgrandsonthreeFamilyId) == false
&& empty($childonegrandsonthreeFamilyId) == false)
|| (!empty($childfourgrandsonthreeFamilyId) == false
&& empty($childtwograndsonthreeFamilyId) == false)
|| (!empty($childfourgrandsonthreeFamilyId) == false
&& empty($childthreegrandsonthreeFamilyId) == false)
}
<div style="filter:alpha(opacity=0);
    -moz-opacity: 0;
    opacity: 0;">

</div>
{/if}

</div>

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

        <!-- 配偶者 -->
        {if !empty($spouseFamilyId) == false}
        <a href="#deceased_spouse_insert" data-role="button" data-icon="gear">配偶者</a>
        {/if}

        <!-- 兄弟姉妹 -->
        {if !empty($brotheroneFamilyId) == false
        }
        <a href="#deceased_brotherone_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}
        {if !empty($brothertwoFamilyId) == false
        && empty($brotheroneFamilyId) == false
        }
        <a href="#deceased_brothertwo_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}
        {if !empty($brotherthreeFamilyId) == false
        && empty($brotheroneFamilyId) == false
        && empty($brothertwoFamilyId) == false
        }
        <a href="#deceased_brotherthree_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}

        <!-- 子供(配偶者が未入力の際は表示しない) -->
        {if !empty($childoneFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#deceased_childone_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childtwoFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#deceased_childtwo_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childthreeFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#deceased_childthree_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childfourFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($childthreeFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#deceased_childfour_insert" data-role="button" data-icon="gear">子供</a>
        {/if}

        {if empty($childfourFamilyId) == false
        || empty($childoneFamilyId) == false
        || empty($childtwoFamilyId) == false
        || empty($childthreeFamilyId) == false
        }

        {if !empty($childonegrandsonthreeFamilyId) == false
        || !empty($childonegrandsononeFamilyId) == false
        || !empty($childonegrandsontwoFamilyId) == false
        || !empty($childtwograndsononeFamilyId) == false
        || !empty($childtwograndsontwoFamilyId) == false
        || !empty($childtwograndsonthreeFamilyId) == false
        || !empty($childthreegrandsononeFamilyId) == false
        || !empty($childthreegrandsontwoFamilyId) == false
        || !empty($childthreegrandsonthreeFamilyId) == false
        || !empty($childfourgrandsononeFamilyId) == false
        || !empty($childfourgrandsontwoFamilyId) == false
        || !empty($childfourgrandsonthreeFamilyId) == false
        }
        <a href="#deceased_grandsonadd" data-role="button" data-icon="gear">孫</a>
        {/if}
        {/if}

        {if empty($spouseFamilyId) == false
        && empty($brotheroneFamilyId) == false
        && empty($brothertwoFamilyId) == false
        && empty($brotherthreeFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($childthreeFamilyId) == false
        && empty($childfourFamilyId) == false
        && empty($childonegrandsonthreeFamilyId) == false
        && empty($childonegrandsononeFamilyId) == false
        && empty($childonegrandsontwoFamilyId) == false
        && empty($childtwograndsononeFamilyId) == false
        && empty($childtwograndsontwoFamilyId) == false
        && empty($childtwograndsonthreeFamilyId) == false
        && empty($childthreegrandsononeFamilyId) == false
        && empty($childthreegrandsontwoFamilyId) == false
        && empty($childthreegrandsonthreeFamilyId) == false
        && empty($childfourgrandsononeFamilyId) == false
        && empty($childfourgrandsontwoFamilyId) == false
        && empty($childfourgrandsonthreeFamilyId) == false
        && empty($grandfatherfatherFamilyId) == false
        && empty($grandfathermatherFamilyId) == false
        && empty($grandmatherfatherFamilyId) == false
        && empty($grandmathermatherFamilyId) == false
        && empty($fatherFamilyId) == false
        && empty($matherFamilyId) == false
        }
        <p style="margin-left:20px;">登録できるデータがありません</p>
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

        <!-- 配偶者 -->
        {if !empty($spouseFamilyId) == false}
        <a href="#spouse_insert" data-role="button" data-icon="gear">配偶者</a>
        {/if}

        <!-- 兄弟姉妹 -->
        {if !empty($brotheroneFamilyId) == false
        }
        <a href="#brotherone_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}
        {if !empty($brothertwoFamilyId) == false
        && empty($brotheroneFamilyId) == false
        }
        <a href="#brothertwo_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}
        {if !empty($brotherthreeFamilyId) == false
        && empty($brotheroneFamilyId) == false
        && empty($brothertwoFamilyId) == false
        }
        <a href="#brotherthree_insert" data-role="button" data-icon="gear">兄弟姉妹</a>
        {/if}

        <!-- 子供(配偶者が未入力の際は表示しない) -->
        {if !empty($childoneFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#childone_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childtwoFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#childtwo_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childthreeFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#childthree_insert" data-role="button" data-icon="gear">子供</a>
        {/if}
        {if !empty($childfourFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($childthreeFamilyId) == false
        && empty($spouseFamilyId) == false
        }
        <a href="#childfour_insert" data-role="button" data-icon="gear">子供</a>
        {/if}

        {if empty($childfourFamilyId) == false
        || empty($childoneFamilyId) == false
        || empty($childtwoFamilyId) == false
        || empty($childthreeFamilyId) == false
        }

        {if !empty($childonegrandsonthreeFamilyId) == false
        || !empty($childonegrandsononeFamilyId) == false
        || !empty($childonegrandsontwoFamilyId) == false
        || !empty($childtwograndsononeFamilyId) == false
        || !empty($childtwograndsontwoFamilyId) == false
        || !empty($childtwograndsonthreeFamilyId) == false
        || !empty($childthreegrandsononeFamilyId) == false
        || !empty($childthreegrandsontwoFamilyId) == false
        || !empty($childthreegrandsonthreeFamilyId) == false
        || !empty($childfourgrandsononeFamilyId) == false
        || !empty($childfourgrandsontwoFamilyId) == false
        || !empty($childfourgrandsonthreeFamilyId) == false
        }
        <a href="#personal_grandsonadd" data-role="button" data-icon="gear">孫</a>
        {/if}
        {/if}

        {if empty($spouseFamilyId) == false
        && empty($brotheroneFamilyId) == false
        && empty($brothertwoFamilyId) == false
        && empty($brotherthreeFamilyId) == false
        && empty($childoneFamilyId) == false
        && empty($childtwoFamilyId) == false
        && empty($childthreeFamilyId) == false
        && empty($childfourFamilyId) == false
        && empty($childonegrandsonthreeFamilyId) == false
        && empty($childonegrandsononeFamilyId) == false
        && empty($childonegrandsontwoFamilyId) == false
        && empty($childtwograndsononeFamilyId) == false
        && empty($childtwograndsontwoFamilyId) == false
        && empty($childtwograndsonthreeFamilyId) == false
        && empty($childthreegrandsononeFamilyId) == false
        && empty($childthreegrandsontwoFamilyId) == false
        && empty($childthreegrandsonthreeFamilyId) == false
        && empty($childfourgrandsononeFamilyId) == false
        && empty($childfourgrandsontwoFamilyId) == false
        && empty($childfourgrandsonthreeFamilyId) == false
        }
        <p style="margin-left:20px;">登録できるデータがありません</p>
        {/if}

        </div>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 登録（孫（故人一覧より）） -->
<div data-role="page" id="deceased_grandsonadd">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight:bold;" href="#add" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
        <div data-role="controlgroup">
                {if empty($childoneFamilyId) == false
                && !empty($childonegrandsononeFamilyId) == false
                }
                <a href="#deceased_childonegrandsonone_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供）</a>
                {/if}

                {if !empty($childonegrandsontwoFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false}
                <a href="#deceased_childonegrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供）</a>
                {/if}

                {if !empty($childonegrandsonthreeFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false
                && empty($childonegrandsontwoFamilyId) == false
                }
                <a href="#deceased_childonegrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供）</a>
                {/if}
                {if empty($childtwoFamilyName) == false
                && !empty($childtwograndsononeFamilyId) == false
                }
                <a href="#deceased_childtwograndsonone_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if !empty($childtwograndsontwoFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false}
                <a href="#deceased_childtwograndsontwo_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if !empty($childtwograndsonthreeFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false
                && empty($childtwograndsontwoFamilyId) == false
                }
                <a href="#deceased_childtwograndsonthree_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if empty($childthreeFamilyName) == false
                && !empty($childthreegrandsononeFamilyId) == false
                }
                <a href="#deceased_childthreegrandsonone_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
                {/if}

				{if !empty($childthreegrandsontwoFamilyId) == false
                && empty($childthreegrandsononeFamilyId) == false}
                <a href="#deceased_childthreegrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
                {/if}

                {if !empty($childthreegrandsonthreeFamilyId) == false
                && empty($childthreegrandsononeFamilyId) == false
                && empty($childthreegrandsontwoFamilyId) == false
                }
                <a href="#deceased_childthreegrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
                {/if}
                {if empty($childfourFamilyName) == false
                && !empty($childfourgrandsononeFamilyId) == false
                }
                <a href="#deceased_childfourgrandsonone_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
                {/if}

        		{if !empty($childfourgrandsontwoFamilyId) == false
                && empty($childfourgrandsononeFamilyId) == false}
                <a href="#deceased_childfourgrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
                {/if}

                {if !empty($childfourgrandsonthreeFamilyId) == false
                && empty($childfourgrandsononeFamilyId) == false
                && empty($childfourgrandsontwoFamilyId) == false
                }
                <a href="#deceased_childfourgrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
                {/if}

        </div>
    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 登録（孫（個人登録より）） -->
<div data-role="page" id="personal_grandsonadd">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight:bold;" href="#add" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
        <div data-role="controlgroup">
                {if empty($childoneFamilyId) == false
                && !empty($childonegrandsononeFamilyId) == false
                }
                <a href="#childonegrandsonone_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供)</a>
                {/if}

                {if !empty($childonegrandsontwoFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false
                }
                <a href="#childonegrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供)</a>
                {/if}

                {if !empty($childonegrandsonthreeFamilyId) == false
                && empty($childonegrandsononeFamilyId) == false
                && empty($childonegrandsontwoFamilyId) == false
                }
                <a href="#childonegrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childoneFamilyName}の子供)</a>
                {/if}

                {if empty($childtwoFamilyName) == false
                && !empty($childtwograndsononeFamilyId) == false
                }
                <a href="#childtwograndsonone_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if !empty($childtwograndsontwoFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false}
                <a href="#childtwograndsontwo_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if !empty($childtwograndsonthreeFamilyId) == false
                && empty($childtwograndsononeFamilyId) == false
                && empty($childtwograndsontwoFamilyId) == false
                }
                <a href="#childtwograndsonthree_insert" data-role="button" data-icon="gear">孫（{$childtwoFamilyName}の子供）</a>
                {/if}

                {if empty($childthreeFamilyName) == false
                && !empty($childthreegrandsononeFamilyId) == false
                }
                <a href="#childthreegrandsonone_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
                {/if}

                {if !empty($childthreegrandsontwoFamilyId) == false
                && empty($childthreegrandsononeFamilyId) == false
                }
                <a href="#childthreegrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
                {/if}

                {if !empty($childthreegrandsonthreeFamilyId) == false
                && empty($childthreegrandsononeFamilyId) == false
                && empty($childthreegrandsontwoFamilyId) == false
                }
                <a href="#childthreegrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childthreeFamilyName}の子供）</a>
            	{/if}
                {if empty($childfourFamilyName) == false
                && !empty($childfourgrandsononeFamilyId) == false
                }
                <a href="#childfourgrandsonone_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
                {/if}

                {if !empty($childfourgrandsontwoFamilyId) == false
                && empty($childfourgrandsononeFamilyId) == false
                }
                <a href="#childfourgrandsontwo_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
                {/if}

                {if !empty($childfourgrandsonthreeFamilyId) == false
                && empty($childfourgrandsononeFamilyId) == false
                && empty($childfourgrandsontwoFamilyId) == false
                }
                <a href="#childfourgrandsonthree_insert" data-role="button" data-icon="gear">孫（{$childfourFamilyName}の子供）</a>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                             <!-- <button type="button" class="self_insert_btn_id">登　録</button> -->
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
<!-- 	                          <input type="textarea" name="father_memo" value="">
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
<!--                               <button type="button" class="father_insert_btn_id">登録</button>
 -->                           <input type="submit" class="father_insert_btn_id" value="登録">
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

<!-- 父親ぺージ 修正-->
<div data-role="page" id="father_change">
    <div data-role="header" data-theme="f">
        <h1>父親情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/fatherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                            名前
                         </th>
                        <td>
                          <input type="text" name="father_family_name" value="{$fatherFamilyName}" size="24"　placeholder="名前を入力">
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
                          <!-- <input type="date" name="father_birthday" value="{$fatherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $fatherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $fatherBirthday !== "0000-00-00"}
                            <input type="date" name="father_birthday" value="{$fatherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="father_deathday" value="{$fatherDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $fatherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="father_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $fatherDeathday !== "0000-00-00"}
                            <input type="date" name="father_deathday" value="{$fatherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $father_img == 1}
                            <img src="{$urlocalfather}?{$urlquery_img_thumb_father}" style="width: 100%; position:relative;">
                        {/if}
                        {if $father_img == 0}
                        <div id="father_deceasedlist_change_img">
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        </div>
                        {/if}
                        {if $father_img == 2}
                        <div id="father_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$fatherFamilyId}&deceasedlist_img_name={$fatherImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $father_img == 3}
                        <div id="father_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$fatherFamilyId}&deceasedlist_img_name={$fatherImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="father_profession" value="{$fatherProfession}" size="24" placeholder="職業を入力">
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
<!--                           <input type="textarea" name="father_memo" value="{$fatherMemo}">
 -->
        					<textarea id="father_memo" name="father_memo" placeholder="メモを入力">{$fatherMemo}</textarea>
                        </td>
                    </tr>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <div data-role="ui-field-contain">
                    <tr>
                         <td colspan="2">
<!--                             <button type="submit">保存</button>
 -->                            <input type="submit" value="保存">
                         </td>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <td>
                            <input type="button" onclick="location.href='#father_delete'"value="削除">
<!--                             <a href="#father_delete" data-role="button">削除</a>
 -->                        </td>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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

<!-- 母親ぺージ 修正-->
<div data-role="page" id="mather_change">
    <div data-role="header" data-theme="f">
        <h1>母親情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/matherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                            名前
                         </th>
                        <td>
                          <input type="text" name="mather_family_name" value="{$matherFamilyName}" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="mather_birthday" value="{$matherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $matherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $matherBirthday !== "0000-00-00"}
                            <input type="date" name="mather_birthday" value="{$matherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $matherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="mather_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $matherDeathday !== "0000-00-00"}
                            <input type="date" name="mather_deathday" value="{$matherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $mather_img == 1}
                            <img src="{$urlocalmather}?{$urlquery_img_thumb_mather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $mather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $mather_img == 2}
                            <div id="mather_deceasedlist_change_img">
                                <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$matherFamilyId}&deceasedlist_img_name={$matherImgName}" style="width: 100%; position:relative;">
                            </div>
                        {/if}
                        {if $mather_img == 3}
                        <div id="mather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$matherFamilyId}&deceasedlist_img_name={$matherImgName}" style="width: 100%; position:relative;">
                        </div>
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

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                    <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                    </div>
            </div>

            <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                         <td>
                         <input type="button" onclick="location.href='#mather_delete'"value="削除">
                            <!-- <a href="#mather_delete" data-role="button">削除</a> -->
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

<!-- 配偶者ぺージ 新規個人登録-->
<div data-role="page" id="spouse_insert">
    <div data-role="header" data-theme="f">
        <h1>配偶者情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/spousedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="spouse_insert_form_id">
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
                          <input type="text" name="spouse_family_name" value="" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="spouse_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_birthday" value="" size="24" data-role="date" data-inline="false">

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
                          <!-- <input type="date" name="spouse_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $spouse_img == 1}
                            <img src="{$urlocalspouse}?{$urlquery_img_thumb_spouse}" style="width: 100%; position:relative;">
                        {/if}
                        {if $spouse_img == 0}
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
                            <input type="text" name="spouse_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="spouse_memo" name="spouse_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="button" class="spouse_insert_btn_id">登録</button> -->
                            <input type="submit" class="spouse_insert_btn_id" value="登録">
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

<!-- 配偶者ぺージ 修正-->
<div data-role="page" id="spouse_change">
    <div data-role="header" data-theme="f">
        <h1>配偶者情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/spousedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="spouse_family_name" value="{$spouseFamilyName}" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="spouse_birthday" value="{$spouseBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $spouseBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $spouseBirthday !== "0000-00-00"}
                            <input type="date" name="spouse_birthday" value="{$spouseBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $spouseDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $spouseDeathday !== "0000-00-00"}
                            <input type="date" name="spouse_deathday" value="{$spouseDeathday}" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $spouse_img == 2}
                        <div id="spouse_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$spouseFamilyId}&deceasedlist_img_name={$spouseImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $spouse_img == 3}
                        <div id="spouse_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$spouseFamilyId}&deceasedlist_img_name={$spouseImgName}" style="width: 100%; position:relative;">
                        </div>
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
                        {if $spouse_img == 1}
                            <img src="{$urlocalspouse}?{$urlquery_img_thumb_spouse}" style="width: 100%; position:relative;">
                        {/if}
                        {if $spouse_img == 0}
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
                          <input type="text" name="spouse_profession" value="{$spouseProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="spouse_memo" name="spouse_memo" placeholder="メモを入力">{$spouseMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>


                <!-- 子供登録時、削除不可 -->
                {if !empty($childfourFamilyId) == false
                && !empty($childoneFamilyId) == false
                && !empty($childtwoFamilyId) == false
                && !empty($childthreeFamilyId) == false
                }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#spouse_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#spouse_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>

        </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 兄弟姉妹１ 新規（個人登録より）-->
<div data-role="page" id="brotherone_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotheronedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="brotherone_insert_form_id">
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
                          <input type="text" name="brotherone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="brotherone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="brotherone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="brotherone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_deathday" value="" size="24" data-role="date" data-inline="false">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $brotherone_img == 1}
                            <img src="{$urlocalbrotherone}?{$urlquery_img_thumb_brotherone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherone_img == 0}
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
                            <input type="text" name="brotherone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherone_memo" name="brotherone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="button" class="brotherone_insert_btn_id">登録</button> -->
                            <input type="submit" class="brotherone_insert_btn_id" value="登録">
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

<!--　兄弟姉妹１ 修正-->
<div data-role="page" id="brotherone_change">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotheronedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="brotherone_family_name" value="{$brotheroneFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="brotherone_sex">
                                <option value="男性" {$brotheroneMan}>男性</option>
                                <option value="女性" {$brotheroneWoman}>女性</option>
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
                          <!-- <input type="date" name="brotherone_birthday" value="{$brotheroneBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $brotheroneBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brotheroneBirthday !== "0000-00-00"}
                            <input type="date" name="brotherone_birthday" value="{$brotheroneBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="brotherone_deathday" value="{$brotheroneDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $brotheroneDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brotheroneDeathday !== "0000-00-00"}
                            <input type="date" name="brotherone_deathday" value="{$brotheroneDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $brotherone_img == 1}
                            <img src="{$urlocalbrotherone}?{$urlquery_img_thumb_brotherone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $brotherone_img == 2}
                        <div id="brotherone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotheroneFamilyId}&deceasedlist_img_name={$brotheroneImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $brotherone_img == 3}
                        <div id="brotherone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotheroneFamilyId}&deceasedlist_img_name={$brotheroneImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="brotherone_profession" value="{$brotheroneProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherone_memo" name="brotherone_memo" placeholder="メモを入力">{$brotheroneMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#brotherone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#brotherone_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 兄弟姉妹２ 新規（個人登録より）-->
<div data-role="page" id="brothertwo_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brothertwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="brothertwo_insert_form_id">
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
                          <input type="text" name="brothertwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="brothertwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="brothertwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="brothertwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $brothertwo_img == 1}
                            <img src="{$urlocalbrothertwo}?{$urlquery_img_thumb_brothertwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brothertwo_img == 0}
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
                            <input type="text" name="brothertwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="brothertwo_memo" name="brothertwo_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="button" class="brothertwo_insert_btn_id">登録</button> -->
                            <input type="submit" class="brothertwo_insert_btn_id" value="登録">
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

<!--　兄弟姉妹２ 修正-->
<div data-role="page" id="brothertwo_change">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brothertwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
                     <tr>
                        <th>
                             <!-- ユーザーID -->
                         </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                             名前
                         </th>
                        <td>
                          <input type="text" name="brothertwo_family_name" value="{$brothertwoFamilyName}" size="24">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="brothertwo_sex">
                                <option value="男性" {$brothertwoMan}>男性</option>
                                <option value="女性" {$brothertwoWoman}>女性</option>
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
                          <!-- <input type="date" name="brothertwo_birthday" value="{$brothertwoBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $brothertwoBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brothertwoBirthday !== "0000-00-00"}
                            <input type="date" name="brothertwo_birthday" value="{$brothertwoBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="brothertwo_deathday" value="{$brothertwoDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $brothertwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brothertwoDeathday !== "0000-00-00"}
                            <input type="date" name="brothertwo_deathday" value="{$brothertwoDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $brothertwo_img == 1}
                            <img src="{$urlocalbrothertwo}?{$urlquery_img_thumb_brothertwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brothertwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $brothertwo_img == 2}
                        <div id="brothertwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brothertwoFamilyId}&deceasedlist_img_name={$brothertwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $brothertwo_img == 3}
                        <div id="brothertwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brothertwoFamilyId}&deceasedlist_img_name={$brothertwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="brothertwo_profession" value="{$brothertwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brothertwo_memo" name="brothertwo_memo" placeholder="メモを入力">{$brothertwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#brothertwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#brothertwo_delete'"value="削除">
                         </td>
                </div>
             </div>
                </tr>
                 </form>


    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 兄弟姉妹３ 新規（個人登録より）-->
<div data-role="page" id="brotherthree_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotherthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="brotherthree_insert_form_id">
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
                          <input type="text" name="brotherthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="brotherthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="brotherthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="brotherthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $brotherthree_img == 1}
                            <img src="{$urlocalbrotherthree}?{$urlquery_img_thumb_brotherthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherthree_img == 0}
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
                            <input type="text" name="brotherthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherthree_memo" name="brotherthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="button" class="brotherthree_insert_btn_id">登録</button> -->
                            <input type="submit" class="brotherthree_insert_btn_id" value="登録">
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

<!--　兄弟姉妹３ 修正-->
<div data-role="page" id="brotherthree_change">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotherthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="brotherthree_family_name" value="{$brotherthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="brotherthree_sex">
                                <option value="男性" {$brotherthreeMan}>男性</option>
                                <option value="女性" {$brotherthreeWoman}>女性</option>
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
                          <!-- <input type="date" name="brotherthree_birthday" value="{$brotherthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $brotherthreeBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brotherthreeBirthday !== "0000-00-00"}
                            <input type="date" name="brotherthree_birthday" value="{$brotherthreeBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $brotherthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $brotherthreeDeathday !== "0000-00-00"}
                            <input type="date" name="brotherthree_deathday" value="{$brotherthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $brotherthree_img == 1}
                            <img src="{$urlocalbrotherthree}?{$urlquery_img_thumb_brotherthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $brotherthree_img == 2}
                        <div id="brotherthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotherthreeFamilyId}&deceasedlist_img_name={$brotherthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $brotherthree_img == 3}
                        <div id="brotherthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$brotherthreeFamilyId}&deceasedlist_img_name={$brotherthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="brotherthree_profession" value="{$brotherthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherthree_memo" name="brotherthree_memo" placeholder="メモを入力">{$brotherthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#brotherthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#brotherthree_delete'"value="削除">
                         </td>
                </div>
            </div>
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 子供１ぺージ 新規（個人登録より）-->
<div data-role="page" id="childone_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childone_insert_form_id">
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
                          <input type="text" name="childone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childone_spouse_name" value="" size="24" placeholder="配偶者名を入力">
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
                          <!-- <input type="date" name="childone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childone_img == 1}
                            <img src="{$urlocalchildone}?{$urlquery_img_thumb_childone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childone_img == 0}
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
                            <input type="text" name="childone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childone_memo" name="childone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childone_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childone_insert_btn_id" value="登録">
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



<!--　子供１ぺージ 修正-->
<div data-role="page" id="childone_change">
    <div data-role="header" data-theme="f">
        <h1>子供情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childone_family_name" value="{$childoneFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childone_sex">
                                <option value="男性" {$childoneMan}>男性</option>
                                <option value="女性" {$childoneWoman}>女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childone_spouse_name" value="{$childoneSpouseName}" size="24" placeholder="配偶者名を入力">
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
                          <!-- <input type="date" name="childone_birthday" value="{$childoneBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childoneBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childoneBirthday !== "0000-00-00"}
                            <input type="date" name="childone_birthday" value="{$childoneBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $childoneDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childoneDeathday !== "0000-00-00"}
                            <input type="date" name="childone_deathday" value="{$childoneDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childone_img == 1}
                            <img src="{$urlocalchildone}?{$urlquery_img_thumb_childone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childone_img == 2}
                        <div id="childone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childoneFamilyId}&deceasedlist_img_name={$childoneImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childone_img == 3}
                        <div id="childone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childoneFamilyId}&deceasedlist_img_name={$childoneImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childone_profession" value="{$childoneProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childone_memo" name="childone_memo" placeholder="メモを入力">{$childoneMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>


                <!-- 孫・子供２登録時、削除不可 -->
                {if !empty($childonegrandsononeFamilyId) == false
                && !empty($childonegrandsontwoFamilyId) == false
                && !empty($childonegrandsonthreeFamilyId) == false
                && !empty($childtwoFamilyId) == false
                }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childone_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供２ぺージ 新規（個人登録より）-->
<div data-role="page" id="childtwo_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childtwo_insert_form_id">
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
                          <input type="text" name="childtwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childtwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childtwo_spouse_name" value="" size="24"  placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childtwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childtwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childtwo_img == 1}
                            <img src="{$urlocalchildtwo}?{$urlquery_img_thumb_childtwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwo_img == 0}
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
                            <input type="text" name="childtwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwo_memo" name="childtwo_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childtwo_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childtwo_insert_btn_id" value="登録">
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

<!--　子供２ぺージ 修正-->
<div data-role="page" id="childtwo_change">
    <div data-role="header" data-theme="f">
        <h1>子供情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childtwo_family_name" value="{$childtwoFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childtwo_sex">
                                <option value="男性" {$childtwoMan}>男性</option>
                                <option value="女性" {$childtwoWoman}>女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childtwo_spouse_name" value="{$childtwoSpouseName}" size="24" placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childtwo_birthday" value="{$childtwoBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childtwoBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childtwoBirthday !== "0000-00-00"}
                            <input type="date" name="childtwo_birthday" value="{$childtwoBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $childtwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childtwoDeathday !== "0000-00-00"}
                            <input type="date" name="childtwo_deathday" value="{$childtwoDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childtwo_img == 1}
                            <img src="{$urlocalchildtwo}?{$urlquery_img_thumb_childtwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childtwo_img == 2}
                        <div id="childtwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwoFamilyId}&deceasedlist_img_name={$childtwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childtwo_img == 3}
                        <div id="childtwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwoFamilyId}&deceasedlist_img_name={$childtwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childtwo_profession" value="{$childtwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwo_memo" name="childtwo_memo" placeholder="メモを入力">{$childtwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>


                <!-- 孫・子供３登録時、削除不可 -->
                {if !empty($childtwograndsononeFamilyId) == false
                && !empty($childtwograndsontwoFamilyId) == false
                && !empty($childtwograndsonthreeFamilyId) == false
                && !empty($childthreeFamilyId) == false
                }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childtwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childtwo_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 子供３ぺージ 新規（個人登録より）-->
<div data-role="page" id="childthree_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childthree_insert_form_id">
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
                          <input type="text" name="childthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childthree_spouse_name" value="" size="24" placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childthree_img == 1}
                            <img src="{$urlocalchildthree}?{$urlquery_img_thumb_childthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthree_img == 0}
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
                            <input type="text" name="childthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childthree_memo" name="childthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childthree_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childthree_insert_btn_id" value="登録">
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

<!--　子供３ぺージ 修正-->
<div data-role="page" id="childthree_change">
    <div data-role="header" data-theme="f">
        <h1>子供情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childthree_family_name" value="{$childthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childthree_sex">
                                <option value="男性" {$childthreeMan}>男性</option>
                                <option value="女性" {$childthreeWoman}>女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childthree_spouse_name" value="{$childthreeSpouseName}" size="24" placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childthree_birthday" value="{$childthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childthreeBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childthreeBirthday !== "0000-00-00"}
                            <input type="date" name="childthree_birthday" value="{$childthreeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childthreeDeathday !== "0000-00-00"}
                            <input type="date" name="childthree_deathday" value="{$childthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childthree_img == 1}
                            <img src="{$urlocalchildthree}?{$urlquery_img_thumb_childthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childthree_img == 2}
                        <div id="childthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreeFamilyId}&deceasedlist_img_name={$childthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childthree_img == 3}
                        <div id="childthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreeFamilyId}&deceasedlist_img_name={$childthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childthree_profession" value="{$childthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthree_memo" name="childthree_memo" placeholder="を入力">{$childthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

                                 <!-- 孫・子供４登録時、削除不可 -->
                {if !empty($childthreegrandsononeFamilyId) == false
                && !empty($childthreegrandsontwoFamilyId) == false
                && !empty($childthreegrandsonthreeFamilyId) == false
                & !empty($childfourFamilyId) == false
                }
            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childthree_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供４ぺージ 新規（個人登録より）-->
<div data-role="page" id="childfour_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourdatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childfour_insert_form_id">
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
                          <input type="text" name="childfour_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childfour_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childfour_spouse_name" value="" size="24" placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childfour_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childfour_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childfour_img == 1}
                            <img src="{$urlocalchildfour}?{$urlquery_img_thumb_childfour}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfour_img == 0}
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
                            <input type="text" name="childfour_profession" value="" size="24" placeholder="職業を入力"
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
                            <textarea id="childfour_memo" name="childfour_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childfour_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childfour_insert_btn_id" value="登録">
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

<!--　子供４ぺージ 修正-->
<div data-role="page" id="childfour_change">
    <div data-role="header" data-theme="f">
        <h1>子供情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childfour_family_name" value="{$childfourFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childfour_sex">
                                <option value="男性" {$childfourMan}>男性</option>
                                <option value="女性" {$childfourWoman}>女性</option>
                            </select>
                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                     <tr>
                        <th>
                            配偶者名
                         </th>
                        <td>
                          <input type="text" name="childfour_spouse_name" value="{$childfourSpouseName}" size="24" placeholder="配偶者を入力">
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
                          <!-- <input type="date" name="childfour_birthday" value="{$childfourBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childfourBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childfourBirthday !== "0000-00-00"}
                            <input type="date" name="childfour_birthday" value="{$childfourBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childfourDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childfourDeathday !== "0000-00-00"}
                            <input type="date" name="childfour_deathday" value="{$childfourDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childfour_img == 1}
                            <img src="{$urlocalchildfour}?{$urlquery_img_thumb_childfour}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfour_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childfour_img == 2}
                        <div id="childfour_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourFamilyId}&deceasedlist_img_name={$childfourImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childfour_img == 3}
                        <div id="childfour_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourFamilyId}&deceasedlist_img_name={$childfourImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childfour_profession" value="{$childfourProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfour_memo" name="childfour_memo" placeholder="メモを入力">{$childfourMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

                                 <!-- 孫登録時、削除不可 -->
                {if !empty($childfourgrandsononeFamilyId) == false
                && !empty($childfourgrandsontwoFamilyId) == false
                && !empty($childfourgrandsonthreeFamilyId) == false
                }
            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childfour_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childfour_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供１孫１ぺージ 新規（個人登録より）-->
<div data-role="page" id="childonegrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsononedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childonegrandsonone_insert_form_id">
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
                          <input type="text" name="childonegrandsonone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childonegrandsonone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childonegrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_birthday" value=""   size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childonegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childonegrandsonone_img == 1}
                            <img src="{$urlocalchildonegrandsonone}?{$urlquery_img_thumb_childonegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonone_img == 0}
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
                            <input type="text" name="childonegrandsonone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonone_memo" name="childonegrandsonone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childonegrandsonone_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childonegrandsonone_insert_btn_id" value="登録">
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

<!--　子供１孫１ぺージ 修正-->
<div data-role="page" id="childonegrandsonone_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsononedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childonegrandsonone_family_name" value="{$childonegrandsononeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childonegrandsonone_sex">
                                <option value="男性" {$childonegrandsononeMan}>男性</option>
                                <option value="女性" {$childonegrandsononeWoman}>女性</option>
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
                          <!-- <input type="date" name="childonegrandsonone_birthday" value="{$childonegrandsononeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childonegrandsononeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childonegrandsononeBirthday !== "0000-00-00"}
                              <input type="date" name="childonegrandsonone_birthday" value="{$childonegrandsononeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childonegrandsononeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childonegrandsononeDeathday !== "0000-00-00"}
                            <input type="date" name="childonegrandsonone_deathday" value="{$childonegrandsononeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childonegrandsonone_img == 1}
                            <img src="{$urlocalchildonegrandsonone}?{$urlquery_img_thumb_childonegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childonegrandsonone_img == 2}
                        <div id="childonegrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsononeFamilyId}&deceasedlist_img_name={$childonegrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childonegrandsonone_img == 3}
                        <div id="childonegrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsononeFamilyId}&deceasedlist_img_name={$childonegrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childonegrandsonone_profession" value="{$childonegrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonone_memo" name="childonegrandsonone_memo" placeholder="メモを入力">{$childonegrandsononeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

                <!-- 子供登録時、削除不可 -->
                {if !empty($childonegrandsontwoFamilyId) == false
                && !empty($childonegrandsonthreeFamilyId) == false
                }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childonegrandsonone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childonegrandsonone_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!-- 子供１孫２ぺージ 新規（個人登録より）-->
<div data-role="page" id="childonegrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsontwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childonegrandsontwo_insert_form_id">
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
                          <input type="text" name="childonegrandsontwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childonegrandsontwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childonegrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childonegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childonegrandsontwo_img == 1}
                            <img src="{$urlocalchildonegrandsontwo}?{$urlquery_img_thumb_childonegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsontwo_img == 0}
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
                            <input type="text" name="childonegrandsontwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsontwo_memo" name="childonegrandsontwo_memo"　placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childonegrandsontwo_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childonegrandsontwo_insert_btn_id" value="登録">
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

<!--　子供１孫２ぺージ 修正-->
<div data-role="page" id="childonegrandsontwo_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsontwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childonegrandsontwo_family_name" value="{$childonegrandsontwoFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childonegrandsontwo_sex">
                                <option value="男性" {$childonegrandsontwoMan}>男性</option>
                                <option value="女性" {$childonegrandsontwoWoman}>女性</option>
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
                          <!-- <input type="date" name="childonegrandsontwo_birthday" value="{$childonegrandsontwoBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childonegrandsontwoBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childonegrandsontwoBirthday !== "0000-00-00"}
                              <input type="date" name="childonegrandsontwo_birthday" value="{$childonegrandsontwoBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childonegrandsontwo_deathday" value="{$childonegrandsontwoDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childonegrandsontwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childonegrandsontwoDeathday !== "0000-00-00"}
                            <input type="date" name="childonegrandsontwo_deathday" value="{$childonegrandsontwoDeathday}" size="24" data-role="date" data-inline="false">
                        {/if}
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>
                             <br>
                         </th>
                        <td>
                        {if $childonegrandsontwo_img == 1}
                            <img src="{$urlocalchildonegrandsontwo}?{$urlquery_img_thumb_childonegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childonegrandsontwo_img == 2}
                        <div id="childonegrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsontwoFamilyId}&deceasedlist_img_name={$childonegrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childonegrandsontwo_img == 3}
                        <div id="childonegrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsontwoFamilyId}&deceasedlist_img_name={$childonegrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childonegrandsontwo_profession" value="{$childonegrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsontwo_memo" name="childonegrandsontwo_memo" placeholder="メモを入力">{$childonegrandsontwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

                {if !empty($childonegrandsonthreeFamilyId) == false}
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childonegrandsontwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childonegrandsontwo_delete'"value="削除">
                         </td>
                </div>
            </div>
                {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供１孫３ぺージ 新規（個人登録より）-->
<div data-role="page" id="childonegrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsonthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childonegrandsonthree_insert_form_id">
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
                          <input type="text" name="childonegrandsonthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childonegrandsonthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childonegrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childonegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childonegrandsonthree_img == 1}
                            <img src="{$urlocalchildonegrandsonthree}?{$urlquery_img_thumb_childonegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonthree_img == 0}
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
                            <input type="text" name="childonegrandsonthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonthree_memo" name="childonegrandsonthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childonegrandsonthree_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childonegrandsonthree_insert_btn_id" value="登録">
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

<!--　子供１孫３ぺージ 修正-->
<div data-role="page" id="childonegrandsonthree_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsonthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childonegrandsonthree_family_name" value="{$childonegrandsonthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childonegrandsonthree_sex">
                                <option value="男性" {$childonegrandsonthreeMan}>男性</option>
                                <option value="女性" {$childonegrandsonthreeWoman}>女性</option>
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
                          <!-- <input type="date" name="childonegrandsonthree_birthday" value="{$childonegrandsonthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childonegrandsonthreeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childonegrandsonthreeBirthday !== "0000-00-00"}
                              <input type="date" name="childonegrandsonthree_birthday" value="{$childonegrandsonthreeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childonegrandsonthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childonegrandsonthreeDeathday !== "0000-00-00"}
                            <input type="date" name="childonegrandsonthree_deathday" value="{$childonegrandsonthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childonegrandsonthree_img == 1}
                            <img src="{$urlocalchildonegrandsonthree}?{$urlquery_img_thumb_childonegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childonegrandsonthree_img == 2}
                        <div id="childonegrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsonthreeFamilyId}&deceasedlist_img_name={$childonegrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childonegrandsonthree_img == 3}
                        <div id="childonegrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childonegrandsonthreeFamilyId}&deceasedlist_img_name={$childonegrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childonegrandsonthree_profession" value="{$childonegrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonthree_memo" name="childonegrandsonthree_memo" placeholder="メモを入力">{$childonegrandsonthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childonegrandsonthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childonegrandsonthree_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供２孫１ぺージ 新規（個人登録より）-->
<div data-role="page" id="childtwograndsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsononedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childtwograndsonone_insert_form_id">
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
                          <input type="text" name="childtwograndsonone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childtwograndsonone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childtwograndsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childtwograndsonone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childtwograndsonone_img == 1}
                            <img src="{$urlocalchildtwograndsonone}?{$urlquery_img_thumb_childtwograndsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonone_img == 0}
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
                            <input type="text" name="childtwograndsonone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonone_memo" name="childtwograndsonone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childtwograndsonone_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childtwograndsonone_insert_btn_id" value="登録">
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

<!--　子供２孫１ぺージ 修正-->
<div data-role="page" id="childtwograndsonone_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsononedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childtwograndsonone_family_name" value="{$childtwograndsononeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childtwograndsonone_sex">
                                <option value="男性" {$childtwograndsononeMan}>男性</option>
                                <option value="女性" {$childtwograndsononeWoman}>女性</option>
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
                          <!-- <input type="date" name="childtwograndsonone_birthday" value="{$childtwograndsononeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childtwograndsononeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childtwograndsononeBirthday !== "0000-00-00"}
                              <input type="date" name="childtwograndsonone_birthday" value="{$childtwograndsononeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childtwograndsononeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childtwograndsononeDeathday !== "0000-00-00"}
                            <input type="date" name="childtwograndsonone_deathday" value="{$childtwograndsononeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childtwograndsonone_img == 1}
                            <img src="{$urlocalchildtwograndsonone}?{$urlquery_img_thumb_childtwograndsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childtwograndsonone_img == 2}
                        <div id="childtwograndsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsononeFamilyId}&deceasedlist_img_name={$childtwograndsononeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childtwograndsonone_img == 3}
                        <div id="childtwograndsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsononeFamilyId}&deceasedlist_img_name={$childtwograndsononeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childtwograndsonone_profession" value="{$childtwograndsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonone_memo" name="childtwograndsonone_memo" placeholder="メモを入力">{$childtwograndsononeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <!-- 子供登録時、削除不可 -->
            {if !empty($childtwograndsontwoFamilyId) == false
            && !empty($childtwograndsonthreeFamilyId) == false
            }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childtwograndsonone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childtwograndsonone_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供２孫２ぺージ 新規（個人登録より）-->
<div data-role="page" id="childtwograndsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsontwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childtwograndsontwo_insert_form_id">
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
                          <input type="text" name="childtwograndsontwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childtwograndsontwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childtwograndsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childtwograndsontwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childtwograndsontwo_img == 1}
                            <img src="{$urlocalchildtwograndsontwo}?{$urlquery_img_thumb_childtwograndsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsontwo_img == 0}
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
                            <input type="text" name="childtwograndsontwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsontwo_memo" name="childtwograndsontwo_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childtwograndsontwo_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childtwograndsontwo_insert_btn_id" value="登録">
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

<!--　子供２孫２ぺージ 修正-->
<div data-role="page" id="childtwograndsontwo_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsontwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childtwograndsontwo_family_name" value="{$childtwograndsontwoFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childtwograndsontwo_sex">
                                <option value="男性" {$childtwograndsontwoMan}>男性</option>
                                <option value="女性" {$childtwograndsontwoWoman}>女性</option>
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
                          {if $childtwograndsontwoBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childtwograndsontwoBirthday !== "0000-00-00"}
                              <input type="date" name="childtwograndsontwo_birthday" value="{$childtwograndsontwoBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
                          <!-- <input type="date" name="childtwograndsontwo_birthday" value="{$childtwograndsontwoBirthday}" size="24" data-role="date" data-inline="false"> -->
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
                        {if $childtwograndsontwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childtwograndsontwoDeathday !== "0000-00-00"}
                            <input type="date" name="childtwograndsontwo_deathday" value="{$childtwograndsontwoDeathday}" size="24" data-role="date" data-inline="false">
                        {/if}
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>
                             <br>
                         </th>
                        <td>
                        {if $childtwograndsontwo_img == 1}
                            <img src="{$urlocalchildtwograndsontwo}?{$urlquery_img_thumb_childtwograndsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childtwograndsontwo_img == 2}
                        <div id="childtwograndsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsontwoFamilyId}&deceasedlist_img_name={$childtwograndsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childtwograndsontwo_img == 3}
                        <div id="childtwograndsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsontwoFamilyId}&deceasedlist_img_name={$childtwograndsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childtwograndsontwo_profession" value="{$childtwograndsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsontwo_memo" name="childtwograndsontwo_memo" placeholder="メモを入力">{$childtwograndsontwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <!-- 子供登録時、削除不可 -->
            {if !empty($childtwograndsonthreeFamilyId) == false}
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childtwograndsontwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childtwograndsontwo_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供２孫３ぺージ 新規（個人登録より）-->
<div data-role="page" id="childtwograndsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsonthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childtwograndsonthree_insert_form_id">
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
                          <input type="text" name="childtwograndsonthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childtwograndsonthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childtwograndsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childtwograndsonthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childtwograndsonthree_img == 1}
                            <img src="{$urlocalchildtwograndsonthree}?{$urlquery_img_thumb_childtwograndsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonthree_img == 0}
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
                            <input type="text" name="childtwograndsonthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonthree_memo" name="childtwograndsonthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childtwograndsonthree_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childtwograndsonthree_insert_btn_id" value="登録">
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

<!--　子供２孫３ぺージ 修正-->
<div data-role="page" id="childtwograndsonthree_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsonthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childtwograndsonthree_family_name" value="{$childtwograndsonthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childtwograndsonthree_sex">
                                <option value="男性" {$childtwograndsonthreeMan}>男性</option>
                                <option value="女性" {$childtwograndsonthreeWoman}>女性</option>
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
                          <!-- <input type="date" name="childtwograndsonthree_birthday" value="{$childtwograndsonthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childtwograndsonthreeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childtwograndsonthreeBirthday !== "0000-00-00"}
                              <input type="date" name="childtwograndsonthree_birthday" value="{$childtwograndsonthreeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          {if $childtwograndsonthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childtwograndsonthreeDeathday !== "0000-00-00"}
                            <input type="date" name="childtwograndsonthree_deathday" value="{$childtwograndsonthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childtwograndsonthree_img == 1}
                            <img src="{$urlocalchildtwograndsonthree}?{$urlquery_img_thumb_childtwograndsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childtwograndsonthree_img == 2}
                        <div id="childtwograndsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsonthreeFamilyId}&deceasedlist_img_name={$childtwograndsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childtwograndsonthree_img == 3}
                        <div id="childtwograndsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childtwograndsonthreeFamilyId}&deceasedlist_img_name={$childtwograndsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childtwograndsonthree_profession" value="{$childtwograndsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonthree_memo" name="childtwograndsonthree_memo" placeholder="メモを入力">{$childtwograndsonthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childtwograndsonthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childtwograndsonthree_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供３孫１ぺージ 新規（個人登録より）-->
<div data-role="page" id="childthreegrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsononedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childthreegrandsonone_insert_form_id">
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
                          <input type="text" name="childthreegrandsonone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childthreegrandsonone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childthreegrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childthreegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childthreegrandsonone_img == 1}
                            <img src="{$urlocalchildthreegrandsonone}?{$urlquery_img_thumb_childthreegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonone_img == 0}
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
                            <input type="text" name="childthreegrandsonone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonone_memo" name="childthreegrandsonone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childthreegrandsonone_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childthreegrandsonone_insert_btn_id" value="登録">
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

<!--　子供３孫１ぺージ 修正-->
<div data-role="page" id="childthreegrandsonone_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsononedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childthreegrandsonone_family_name" value="{$childthreegrandsononeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childthreegrandsonone_sex">
                                <option value="男性" {$childthreegrandsononeMan}>男性</option>
                                <option value="女性" {$childthreegrandsononeWoman}>女性</option>
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
                          <!-- <input type="date" name="childthreegrandsonone_birthday" value="{$childthreegrandsononeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childthreegrandsononeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childthreegrandsononeBirthday !== "0000-00-00"}
                              <input type="date" name="childthreegrandsonone_birthday" value="{$childthreegrandsononeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childthreegrandsonone_deathday" value="{$childthreegrandsononeDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childthreegrandsononeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childthreegrandsononeDeathday !== "0000-00-00"}
                            <input type="date" name="childthreegrandsonone_deathday" value="{$childthreegrandsononeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childthreegrandsonone_img == 1}
                            <img src="{$urlocalchildthreegrandsonone}?{$urlquery_img_thumb_childthreegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childthreegrandsonone_img == 2}
                        <div id="childthreegrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsononeFamilyId}&deceasedlist_img_name={$childthreegrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childthreegrandsonone_img == 3}
                        <div id="childthreegrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsononeFamilyId}&deceasedlist_img_name={$childthreegrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childthreegrandsonone_profession" value="{$childthreegrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonone_memo" name="childthreegrandsonone_memo" placeholder="メモを入力">{$childthreegrandsononeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            {if !empty($childthreegrandsontwoFamilyId) == false
            && !empty($childthreegrandsonthreeFamilyId) == false
            }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childthreegrandsonone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsonone_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供３孫２ぺージ 新規（個人登録より）-->
<div data-role="page" id="childthreegrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsontwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childthreegrandsontwo_insert_form_id">
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
                          <input type="text" name="childthreegrandsontwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childthreegrandsontwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childthreegrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childthreegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childthreegrandsontwo_img == 1}
                            <img src="{$urlocalchildthreegrandsontwo}?{$urlquery_img_thumb_childthreegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsontwo_img == 0}
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
                            <input type="text" name="childthreegrandsontwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsontwo_memo" name="childthreegrandsontwo_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childthreegrandsontwo_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childthreegrandsontwo_insert_btn_id" value="登録">
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

<!--　子供３孫２ぺージ 修正-->
<div data-role="page" id="childthreegrandsontwo_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsontwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childthreegrandsontwo_family_name" value="{$childthreegrandsontwoFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childthreegrandsontwo_sex">
                                <option value="男性" {$childthreegrandsontwoMan}>男性</option>
                                <option value="女性" {$childthreegrandsontwoWoman}>女性</option>
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
                          <!-- <input type="date" name="childthreegrandsontwo_birthday" value="{$childthreegrandsontwoBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childthreegrandsontwoBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childthreegrandsontwoBirthday !== "0000-00-00"}
                              <input type="date" name="childthreegrandsontwo_birthday" value="{$childthreegrandsontwoBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childthreegrandsontwo_deathday" value="{$childthreegrandsontwoDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childthreegrandsontwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childthreegrandsontwoDeathday !== "0000-00-00"}
                            <input type="date" name="childthreegrandsontwo_deathday" value="{$childthreegrandsontwoDeathday}" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childthreegrandsontwo_img == 2}
                        <div id="childthreegrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsontwoFamilyId}&deceasedlist_img_name={$childthreegrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childthreegrandsontwo_img == 3}
                        <div id="childthreegrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsontwoFamilyId}&deceasedlist_img_name={$childthreegrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                        {if $childthreegrandsontwo_img == 1}
                            <img src="{$urlocalchildthreegrandsontwo}?{$urlquery_img_thumb_childthreegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsontwo_img == 0}
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
                          <input type="text" name="childthreegrandsontwo_profession" value="{$childthreegrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsontwo_memo" name="childthreegrandsontwo_memo" placeholder="メモを入力">{$childthreegrandsontwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            {if !empty($childthreegrandsonthreeFamilyId) == false}
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childthreegrandsontwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsontwo_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供３孫３ぺージ 新規（個人登録より）-->
<div data-role="page" id="childthreegrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsonthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childthreegrandsonthree_insert_form_id">
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
                          <input type="text" name="childthreegrandsonthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childthreegrandsonthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childthreegrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childthreegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childthreegrandsonthree_img == 1}
                            <img src="{$urlocalchildthreegrandsonthree}?{$urlquery_img_thumb_childthreegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonthree_img == 0}
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
                            <input type="text" name="childthreegrandsonthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonthree_memo" name="childthreegrandsonthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childthreegrandsonthree_insert_btn_id">登　録</button> --><input type="submit" class="childthreegrandsonthree_insert_btn_id" value="登録">
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

<!--　子供３孫３ぺージ 修正-->
<div data-role="page" id="childthreegrandsonthree_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsonthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childthreegrandsonthree_family_name" value="{$childthreegrandsonthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childthreegrandsonthree_sex">
                                <option value="男性" {$childthreegrandsonthreeMan}>男性</option>
                                <option value="女性" {$childthreegrandsonthreeWoman}>女性</option>
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
                          <!-- <input type="date" name="childthreegrandsonthree_birthday" value="{$childthreegrandsonthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childthreegrandsonthreeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childthreegrandsonthreeBirthday !== "0000-00-00"}
                              <input type="date" name="childthreegrandsonthree_birthday" value="{$childthreegrandsonthreeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childthreegrandsonthree_deathday" value="{$childthreegrandsonthreeDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childthreegrandsonthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childthreegrandsonthreeDeathday !== "0000-00-00"}
                            <input type="date" name="childthreegrandsonthree_deathday" value="{$childthreegrandsonthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childthreegrandsonthree_img == 1}
                            <img src="{$urlocalchildthreegrandsonthree}?{$urlquery_img_thumb_childthreegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childthreegrandsonthree_img == 2}
                        <div id="childthreegrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsonthreeFamilyId}&deceasedlist_img_name={$childthreegrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childthreegrandsonthree_img == 3}
                        <div id="childthreegrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childthreegrandsonthreeFamilyId}&deceasedlist_img_name={$childthreegrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childthreegrandsonthree_profession" value="{$childthreegrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonthree_memo" name="childthreegrandsonthree_memo" placeholder="メモを入力">{$childthreegrandsonthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childthreegrandsonthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsonthree_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供４孫１ぺージ 新規（個人登録より）-->
<div data-role="page" id="childfourgrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsononedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childfourgrandsonone_insert_form_id">
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
                          <input type="text" name="childfourgrandsonone_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childfourgrandsonone_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childfourgrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childfourgrandsonone_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsonone_img == 1}
                            <img src="{$urlocalchildfourgrandsonone}?{$urlquery_img_thumb_childfourgrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonone_img == 0}
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
                            <input type="text" name="childfourgrandsonone_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonone_memo" name="childfourgrandsonone_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childfourgrandsonone_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childfourgrandsonone_insert_btn_id" value="登録">
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

<!--　子供４孫１ぺージ 修正-->
<div data-role="page" id="childfourgrandsonone_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsononedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childfourgrandsonone_family_name" value="{$childfourgrandsononeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childfourgrandsonone_sex">
                                <option value="男性" {$childfourgrandsononeMan}>男性</option>
                                <option value="女性" {$childfourgrandsononeWoman}>女性</option>
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
                          <!-- <input type="date" name="childfourgrandsonone_birthday" value="{$childfourgrandsononeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childfourgrandsononeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childfourgrandsononeBirthday !== "0000-00-00"}
                              <input type="date" name="childfourgrandsonone_birthday" value="{$childfourgrandsononeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                        {if $childfourgrandsononeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childfourgrandsononeDeathday !== "0000-00-00"}
                            <input type="date" name="childfourgrandsonone_deathday" value="{$childfourgrandsononeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsonone_img == 1}
                            <img src="{$urlocalchildfourgrandsonone}?{$urlquery_img_thumb_childfourgrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childfourgrandsonone_img == 2}
                        <div id="childfourgrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsononeFamilyId}&deceasedlist_img_name={$childfourgrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childfourgrandsonone_img == 3}
                        <div id="childfourgrandsonone_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsononeFamilyId}&deceasedlist_img_name={$childfourgrandsononeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childfourgrandsonone_profession" value="{$childfourgrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonone_memo" name="childfourgrandsonone_memo" placeholder="メモを入力">{$childfourgrandsononeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            {if !empty($childfourgrandsontwoFamilyId) == false
            && !empty($childfouregrandsonthreeFamilyId) == false
            }
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childfourgrandsonone_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsonone_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供４孫２ぺージ 新規（個人登録より）-->
<div data-role="page" id="childfourgrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsontwodatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childfourgrandsontwo_insert_form_id">
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
                          <input type="text" name="childfourgrandsontwo_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childfourgrandsontwo_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childfourgrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childfourgrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsontwo_img == 1}
                            <img src="{$urlocalchildfourgrandsontwo}?{$urlquery_img_thumb_childfourgrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsontwo_img == 0}
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
                            <input type="text" name="childfourgrandsontwo_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsontwo_memo" name="childfourgrandsontwo_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childfourgrandsontwo_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childfourgrandsontwo_insert_btn_id" value="登録">
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

<!--　子供４孫２ぺージ 修正-->
<div data-role="page" id="childfourgrandsontwo_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsontwodatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childfourgrandsontwo_family_name" value="{$childfourgrandsontwoFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childfourgrandsontwo_sex">
                                <option value="男性" {$childfourgrandsontwoMan}>男性</option>
                                <option value="女性" {$childfourgrandsontwoWoman}>女性</option>
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
                          <!-- <input type="date" name="childfourgrandsontwo_birthday" value="{$childfourgrandsontwoBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childfourgrandsontwoBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childfourgrandsontwoBirthday !== "0000-00-00"}
                              <input type="date" name="childfourgrandsontwo_birthday" value="{$childfourgrandsontwoBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childfourgrandsontwo_deathday" value="{$childfourgrandsontwoDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childfourgrandsontwoDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childfourgrandsontwoDeathday !== "0000-00-00"}
                            <input type="date" name="childfourgrandsontwo_deathday" value="{$childfourgrandsontwoDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsontwo_img == 1}
                            <img src="{$urlocalchildfourgrandsontwo}?{$urlquery_img_thumb_childfourgrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childfourgrandsontwo_img == 2}
                        <div id="childfourgrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsontwoFamilyId}&deceasedlist_img_name={$childfourgrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childfourgrandsontwo_img == 3}
                        <div id="childfourgrandsontwo_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsontwoFamilyId}&deceasedlist_img_name={$childfourgrandsontwoImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childfourgrandsontwo_profession" value="{$childfourgrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsontwo_memo" name="childfourgrandsontwo_memo" placeholder="メモを入力">{$childfourgrandsontwoMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            {if !empty($childfourgrandsonthreeFamilyId) == false}
            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childfourgrandsontwo_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsontwo_delete'"value="削除">
                         </td>
                </div>
            </div>
            {/if}
                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 子供４孫３ぺージ 新規（個人登録より）-->
<div data-role="page" id="childfourgrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsonthreedatainsert" method="post" data-ajax="false" enctype="multipart/form-data" id="childfourgrandsonthree_insert_form_id">
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
                          <input type="text" name="childfourgrandsonthree_family_name" value="" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                   <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <select name="childfourgrandsonthree_sex">
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
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
                          <!-- <input type="date" name="childfourgrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
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
                          <!-- <input type="date" name="childfourgrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false"> -->
                          <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsonthree_img == 1}
                            <img src="{$urlocalchildfourgrandsonthree}?{$urlquery_img_thumb_childfourgrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonthree_img == 0}
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
                            <input type="text" name="childfourgrandsonthree_profession" value="" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonthree_memo" name="childfourgrandsonthree_memo" placeholder="メモを入力"></textarea>
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
                            <!-- <button type="submit" class="childfourgrandsonthree_insert_btn_id">登　録</button> -->
                            <input type="submit" class="childfourgrandsonthree_insert_btn_id" value="登録">
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

<!--　子供４孫３ぺージ 修正-->
<div data-role="page" id="childfourgrandsonthree_change">
    <div data-role="header" data-theme="f">
        <h1>孫情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsonthreedatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="childfourgrandsonthree_family_name" value="{$childfourgrandsonthreeFamilyName}" size="24" placeholder="名前を入力">
                      </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                             性別
                        </th>
                        <td>
                            <select name="childfourgrandsonthree_sex">
                                <option value="男性" {$childfourgrandsonthreeMan}>男性</option>
                                <option value="女性" {$childfourgrandsonthreeWoman}>女性</option>
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
                          <!-- <input type="date" name="childfourgrandsonthree_birthday" value="{$childfourgrandsonthreeBirthday}" size="24" data-role="date" data-inline="false"> -->
                          {if $childfourgrandsonthreeBirthday == "0000-00-00"}
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false">
                          {/if}
                          {if $childfourgrandsonthreeBirthday !== "0000-00-00"}
                              <input type="date" name="childfourgrandsonthree_birthday" value="{$childfourgrandsonthreeBirthday}" size="24" data-role="date" data-inline="false">
                          {/if}
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
                          <!-- <input type="date" name="childfourgrandsonthree_deathday" value="{$childfourgrandsonthreeDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $childfourgrandsonthreeDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $childfourgrandsonthreeDeathday !== "0000-00-00"}
                            <input type="date" name="childfourgrandsonthree_deathday" value="{$childfourgrandsonthreeDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $childfourgrandsonthree_img == 1}
                            <img src="{$urlocalchildfourgrandsonthree}?{$urlquery_img_thumb_childfourgrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $childfourgrandsonthree_img == 2}
                        <div id="childfourgrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsonthreeFamilyId}&deceasedlist_img_name={$childfourgrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $childfourgrandsonthree_img == 3}
                        <div id="childfourgrandsonthree_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$childfourgrandsonthreeFamilyId}&deceasedlist_img_name={$childfourgrandsonthreeImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="childfourgrandsonthree_profession" value="{$childfourgrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonthree_memo" name="childfourgrandsonthree_memo" placeholder="メモを入力">{$childfourgrandsonthreeMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#childfourgrandsonthree_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsonthree_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!-- 祖父父方ぺージ 新規個人情報-->
<div data-role="page" id="grandfatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父父方情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                          <input type="text" name="grandfatherfather_family_name" value="" size="24">
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

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th>
                            職業
                        </th>
                        <td>
                            <input type="text" name="grandfatherfather_profession" value="" size="24">
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
                                <textarea id="grandfatherfather_memo" name="grandfatherfather_memo">{$grandfatherfatherMemo}</textarea>
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
                            <!-- <button type="submit" class="grandfatherfather_insert_btn_id">登　録</button> -->
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

<!--　祖父父方ぺージ 修正-->
<div data-role="page" id="grandfatherfather_change">
    <div data-role="header" data-theme="f">
        <h1>祖父父方情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfatherfatherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="grandfatherfather_family_name" value="{$grandfatherfatherFamilyName}" size="24">
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
                          <!-- <input type="date" name="grandfatherfather_birthday" value="{$grandfatherfatherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandfatherfatherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandfatherfatherBirthday !== "0000-00-00"}
                            <input type="date" name="grandfatherfather_birthday" value="{$grandfatherfatherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                        {if $grandfatherfatherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfatherfather_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandfatherfatherDeathday !== "0000-00-00"}
                            <input type="date" name="grandfatherfather_deathday" value="{$grandfatherfatherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $grandfatherfather_img == 1}
                            <img src="{$urlocalgrandfatherfather}?{$urlquery_img_thumb_grandfatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $grandfatherfather_img == 2}
                        <div id="grandfatherfather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfatherfatherFamilyId}&deceasedlist_img_name={$grandfatherfatherImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $grandfatherfather_img == 3}
                        <div id="grandfatherfather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfatherfatherFamilyId}&deceasedlist_img_name={$grandfatherfatherImgName}" style="width: 100%; position:relative;">
                        </div>
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
                          <input type="text" name="grandfatherfather_profession" value="{$grandfatherfatherProfession}" size="24">
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
                            <textarea id="grandfatherfather_memo" name="grandfatherfather_memo">{$grandfatherfatherMemo}</textarea>

                        </td>
                    </tr>
                </div>
            </div>

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#grandfatherfather_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#grandfatherfather_delete'"value="削除">
                         </td>
                </div>
            </div>

                </tr>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <!-- <input type="submit" value="登録"> -->
                            <!-- <button type="submit" class="grandfathermather_insert_btn_id">登　録</button> -->
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

<!--　祖母父方ぺージ 修正-->
<div data-role="page" id="grandfathermather_change">
    <div data-role="header" data-theme="f">
        <h1>祖母父方情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfathermatherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="grandfathermather_family_name" value="{$grandfathermatherFamilyName}" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="grandfathermather_birthday" value="{$grandfathermatherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandfathermatherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandfathermatherBirthday !== "0000-00-00"}
                            <input type="date" name="grandfathermather_birthday" value="{$grandfathermatherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="grandfathermather_deathday" value="{$grandfathermatherDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandfathermatherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandfathermather_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandfathermatherDeathday !== "0000-00-00"}
                            <input type="date" name="grandfathermather_deathday" value="{$grandfathermatherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $grandfathermather_img == 1}
                            <img src="{$urlocalgrandfathermather}?{$urlquery_img_thumb_grandfathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandfathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $grandfathermather_img == 2}
                        <div id="grandfathermather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfathermatherFamilyId}&deceasedlist_img_name={$grandfathermatherImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $grandfathermather_img == 3}
                        <div id="grandfathermather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandfathermatherFamilyId}&deceasedlist_img_name={$grandfathermatherImgName}" style="width: 100%; position:relative;">
                        </div>
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

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#grandfathermather_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#grandfathermather_delete'"value="削除">
                         </td>
                </div>
            </div>
                </tr>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <!-- <button type="submit" class="grandmatherfather_insert_btn_id">登　録</button> -->
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

<!--　祖父母方ぺージ 修正-->
<div data-role="page" id="grandmatherfather_change">
    <div data-role="header" data-theme="f">
        <h1>祖父母方情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmatherfatherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="grandmatherfather_family_name" value="{$grandmatherfatherFamilyName}" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="grandmatherfather_birthday" value="{$grandmatherfatherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandmatherfatherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandmatherfatherBirthday !== "0000-00-00"}
                            <input type="date" name="grandmatherfather_birthday" value="{$grandmatherfatherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="grandmatherfather_deathday" value="{$grandmatherfatherDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandmatherfatherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmatherfather_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandmatherfatherDeathday !== "0000-00-00"}
                            <input type="date" name="grandmatherfather_deathday" value="{$grandmatherfatherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $grandmatherfather_img == 1}
                            <img src="{$urlocalgrandmatherfather}?{$urlquery_img_thumb_grandmatherfather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmatherfather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $grandmatherfather_img == 2}
                        <div id="grandmatherfather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmatherfatherFamilyId}&deceasedlist_img_name={$grandmatherfatherImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $grandmatherfather_img == 3}
                        <div id="grandmatherfather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmatherfatherFamilyId}&deceasedlist_img_name={$grandmatherfatherImgName}" style="width: 100%; position:relative;">
                        </div>
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

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                     <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                         <td>
                            <!-- <a href="#grandmatherfather_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#grandmatherfather_delete'"value="削除">
                         </td>
                </div>
            </div>
                </tr>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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

<!--　祖母母方ぺージ 修正-->
<div data-role="page" id="grandmathermather_change">
    <div data-role="header" data-theme="f">
        <h1>祖母母方情報</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmathermatherdatachange" method="post" data-ajax="false" enctype="multipart/form-data">
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
                             名前
                         </th>
                        <td>
                          <input type="text" name="grandmathermather_family_name" value="{$grandmathermatherFamilyName}" size="24" placeholder="名前を入力">
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
                          <!-- <input type="date" name="grandmathermather_birthday" value="{$grandmathermatherBirthday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandmathermatherBirthday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_birthday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandmathermatherBirthday !== "0000-00-00"}
                            <input type="date" name="grandmathermather_birthday" value="{$grandmathermatherBirthday}" size="24" data-role="date" data-inline="false">
                        {/if}
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
                          <!-- <input type="date" name="grandmathermather_deathday" value="{$grandmathermatherDeathday}" size="24" data-role="date" data-inline="false"> -->
                        {if $grandmathermatherDeathday == "0000-00-00"}
                            <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="grandmathermather_deathday" value="" size="24" data-role="date" data-inline="false">
                        {/if}
                        {if $grandmathermatherDeathday !== "0000-00-00"}
                            <input type="date" name="grandmathermather_deathday" value="{$grandmathermatherDeathday}" size="24" data-role="date" data-inline="false">
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
                        {if $grandmathermather_img == 1}
                            <img src="{$urlocalgrandmathermather}?{$urlquery_img_thumb_grandmathermather}" style="width: 100%; position:relative;">
                        {/if}
                        {if $grandmathermather_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;">
                        {/if}
                        {if $grandmathermather_img == 2}
                        <div id="grandmathermather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmathermatherFamilyId}&deceasedlist_img_name={$grandmathermatherImgName}" style="width: 100%; position:relative;">
                        </div>
                        {/if}
                        {if $grandmathermather_img == 3}
                        <div id="grandmathermather_deceasedlist_change_img">
                            <img src="http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id={$grandmathermatherFamilyId}&deceasedlist_img_name={$grandmathermatherImgName}" style="width: 100%; position:relative;">
                        </div>
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

            <div style="margin-top:30px;">
                <div data-role="ui-field-contain">
                    <tr>
                         <td colspan="2">
                            <!-- <button type="submit">保存</button> -->
                            <input type="submit" value="保存">
                         </td>
                    </tr>
                 </div>
            </div>

            <div style="margin-top:10px;">
                 <div data-role="ui-field-contain">
                    <tr>
                         <td>
                            <!-- <a href="#grandmathermather_delete" data-role="button">削除</a> -->
                            <input type="button" onclick="location.href='#grandmathermather_delete'"value="削除">
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




<!-- 　　　　　　　　　　削　除　処　理　　　　　　　　　　　　　　　　　 -->

<!--　配 偶 者 削 除 -->
<div data-role="page" id="spouse_delete">
    <div data-role="header" data-theme="f">
        <h1>配偶者</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/spousedatadelete" method="post" data-ajax="false" >
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="spouse_family_name" value="{$spouseFamilyName}" size="24">
                      </td>
                    </tr>

                    <div data-role="ui-field-contain">
                    <tr>
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#spouse_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#spouse_change'"value="キャンセル">
                         </td>
                     </tr>
                     </div>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

</div>

<!--　父　親 削 除 -->
<div data-role="page" id="father_delete">
    <div data-role="header" data-theme="f">
        <h1>父親</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/fatherdatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="father_family_name" value="{$fatherFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <input type="button" onclick="location.href='#father_change'"value="キャンセル">
                            <!-- <a href="#father_change" data-role="button">キャンセル</a>  -->
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　母　親 削 除 -->
<div data-role="page" id="mather_delete">
    <div data-role="header" data-theme="f">
        <h1>母親</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/matherdatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="mather_family_name" value="{$matherFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <input type="button" onclick="location.href='#mather_change'"value="キャンセル">

                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　兄弟姉妹１　削 除 -->
<div data-role="page" id="brotherone_delete">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotheronedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="brotherone_family_name" value="{$brotheroneFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#brotherone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#brotherone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　兄弟姉妹２　削 除 -->
<div data-role="page" id="brothertwo_delete">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brothertwodatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="brothertwo_family_name" value="{$brothertwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#brothertwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#brothertwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　兄弟姉妹３　削 除 -->
<div data-role="page" id="brotherthree_delete">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotherthreedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="brotherthree_family_name" value="{$brotherthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#brotherthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#brotherthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供１ 削 除 -->
<div data-role="page" id="childone_delete">
    <div data-role="header" data-theme="f">
        <h1>子供</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childone_family_name" value="{$childoneFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供２　削 除 -->
<div data-role="page" id="childtwo_delete">
    <div data-role="header" data-theme="f">
        <h1>子供</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwodatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childtwo_family_name" value="{$childtwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childtwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childtwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供３　削 除 -->
<div data-role="page" id="childthree_delete">
    <div data-role="header" data-theme="f">
        <h1>子供</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childthree_family_name" value="{$childthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供４　削 除 -->
<div data-role="page" id="childfour_delete">
    <div data-role="header" data-theme="f">
        <h1>子供</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourdatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childfour_family_name" value="{$childfourFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childfour_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childfour_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供１孫１　削 除 -->
<div data-role="page" id="childonegrandsonone_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsononedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childonegrandsonone_family_name" value="{$childonegrandsononeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childonegrandsonone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childonegrandsonone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供１孫２　削 除 -->
<div data-role="page" id="childonegrandsontwo_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsontwodatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childonegrandsontwo_family_name" value="{$childonegrandsontwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childonegrandsontwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childonegrandsontwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供１孫３　削 除 -->
<div data-role="page" id="childonegrandsonthree_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsonthreedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childonegrandsonthree_family_name" value="{$childonegrandsonthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childonegrandsonthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childonegrandsonthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供２孫１　削 除 -->
<div data-role="page" id="childtwograndsonone_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsononedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childtwograndsonone_family_name" value="{$childtwograndsononeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childtwograndsonone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childtwograndsonone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供２孫２　削 除 -->
<div data-role="page" id="childtwograndsontwo_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsontwodatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childtwograndsontwo_family_name" value="{$childtwograndsontwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childtwograndsontwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childtwograndsontwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供２孫３　削 除 -->
<div data-role="page" id="childtwograndsonthree_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsonthreedatadelete" method="post" data-ajax="false" >
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childtwograndsonthree_family_name" value="{$childtwograndsonthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childtwograndsonthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childtwograndsonthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供３孫１　削 除 -->
<div data-role="page" id="childthreegrandsonone_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsononedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childthreegrandsonone_family_name" value="{$childthreegrandsononeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childthreegrandsonone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsonone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供３孫２　削 除 -->
<div data-role="page" id="childthreegrandsontwo_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsontwodatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childthreegrandsontwo_family_name" value="{$childthreegrandsontwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childthreegrandsontwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsontwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供３孫３　削 除 -->
<div data-role="page" id="childthreegrandsonthree_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsonthreedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childthreegrandsonthree_family_name" value="{$childthreegrandsonthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childthreegrandsonthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childthreegrandsonthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供４孫１　削 除 -->
<div data-role="page" id="childfourgrandsonone_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsononedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childfourgrandsonone_family_name" value="{$childfourgrandsononeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childfourgrandsonone_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsonone_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供４孫２　削 除 -->
<div data-role="page" id="childfourgrandsontwo_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsontwodatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childfourgrandsontwo_family_name" value="{$childfourgrandsontwoFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childfourgrandsontwo_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsontwo_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　子供４孫３　削 除 -->
<div data-role="page" id="childfourgrandsonthree_delete">
    <div data-role="header" data-theme="f">
        <h1>孫</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsonthreedatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="childfourgrandsonthree_family_name" value="{$childfourgrandsonthreeFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#childfourgrandsonthree_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#childfourgrandsonthree_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　祖父父方　削 除 -->
<div data-role="page" id="grandfatherfather_delete">
    <div data-role="header" data-theme="f">
        <h1>祖父（父方）</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfatherfatherdatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="grandfatherfather_family_name" value="{$grandfatherfatherFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#grandfatherfather_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#grandfatherfather_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　祖母父方　削 除 -->
<div data-role="page" id="grandfathermather_delete">
    <div data-role="header" data-theme="f">
        <h1>祖母（父方）</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandfathermatherdatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="grandfathermather_family_name" value="{$grandfathermatherFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#grandfathermather_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#grandfathermather_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>

<!--　祖父母方　削 除 -->
<div data-role="page" id="grandmatherfather_delete">
    <div data-role="header" data-theme="f">
        <h1>祖父（母方）</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmatherfatherdatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="grandmatherfather_family_name" value="{$grandmatherfatherFamilyName}" size="24">
                      </td>
                    </tr>
                    <tr>
                    <div data-role="ui-field-contain">
                         <td colspan="2">
                            <button type="submit">削除実行</button>
                         </td>
                    </div>

                    <div data-role="ui-field-contain">
                        <td colspan="2">
                            <!-- <a href="#grandmatherfather_change" data-role="button">キャンセル</a> -->
                            <input type="button" onclick="location.href='#grandmatherfather_change'"value="キャンセル">
                        </td>
                    </div>
                     </tr>
                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>


<!--　祖母母方　削 除 -->
<div data-role="page" id="grandmathermather_delete">
    <div data-role="header" data-theme="f">
        <h1>祖母（母方）</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/grandmathermatherdatadelete" method="post" data-ajax="false">
                     <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="customer_id" value="{$customerId}" size="24">
                      </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td>
                          <input type="hidden" name="grandmathermather_family_name" value="{$grandmathermatherFamilyName}" size="24">
                      </td>
                    </tr>

                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <button type="submit">削除実行</button>
                            </td>
                        </tr>
                    </div>

                    <div data-role="ui-field-contain">
                        <tr>
                            <td colspan="2">
                                <!-- <a href="#grandmathermather_change" data-role="button">キャンセル</a> -->
                                <input type="button" onclick="location.href='#grandmathermather_change'"value="キャンセル">
                            </td>
                        </tr>
                    </div>

                 </form>

    </div>
    <div data-role="footer" data-theme="f">
        <h4></h4>
    </div>
</div>
<!-- 　　　　　　　　　　大切な故人　よ　り　追　加　処　理　　　　　　　　　　　　　 -->
<!-- 父親ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_father_insert">
    <div data-role="header" data-theme="f">
        <h1>父親情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/fatherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
<!--                                 <button type="submit">登　録</button>
 -->                                <input type="submit" value="登録">
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/matherdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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

<!-- 配偶者ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_spouse_insert">
    <div data-role="header" data-theme="f">
        <h1>配偶者情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/spousedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistspouse" name="spouse_family_name">
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
                              <!-- <input type="date" name="spouse_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_birthday" value="" size="24" data-role="date" data-inline="false" id="spouse_birthday_insert">
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
                              <!-- <input type="date" name="spouse_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="spouse_deathday" value="" size="24" data-role="date" data-inline="false" id="spouse_deathday_insert">
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
                        {if $spouse_img == 1}
                            <img src="{$urlocalspouse}?{$urlquery_img_thumb_spouse}" style="width: 100%; position:relative;">
                        {/if}
                        {if $spouse_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="spouse_deceasedlist_change">
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
                              <input type="hidden" name="spouse_img_name" value="" size="24" placeholder="" id="spouse_deceasedlist_img_name">
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
                          <input type="text" name="spouse_profession" value="{$spouseProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="spouse_memo" name="spouse_memo" placeholder="メモを入力">{$spouseMemo}</textarea>
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
                               <!--  <button type="submit">登　録</button> -->
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

<!-- 兄弟姉妹１ぺージ 新規（大切な故人）-->
<div data-role="page" id="deceased_brotherone_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotheronedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistbrotherone" name="brotherone_deceased_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="brotherone_deceased_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="brotherone_deceased_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_deceased_birthday" value="" size="24" data-role="date" data-inline="false" id="brotherone_birthday_insert">
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
                              <!-- <input type="date" name="brotherone_deceased_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherone_deceased_deathday" value="" size="24" data-role="date" data-inline="false" id="brotherone_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $brotherone_img == 1}
                            <img src="{$urlocalbrotherone}?{$urlquery_img_thumb_brotherone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherone_img == 0}
                             <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="brotherone_deceasedlist_change">
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
                              <input type="hidden" name="brotherone_img_name" value="" size="24" placeholder="" id="brotherone_deceasedlist_img_name">
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
                          <input type="text" name="brotherone_deceased_profession" value="{$brotheroneProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherone_memo" name="brotherone_deceased_memo" placeholder="メモを入力">{$brotheroneMemo}</textarea>
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
                                <!-- <button type="submit" class="brotherone_deceased_insert_btn_id">登　録</button> -->
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

<!-- 兄弟姉妹２ぺージ 新規（大切な故人）-->
<div data-role="page" id="deceased_brothertwo_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brothertwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistbrothertwo" name="brothertwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="brothertwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="brothertwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_birthday" value="" size="24" data-role="date" data-inline="false" id="brothertwo_birthday_insert">

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
                              <!-- <input type="date" name="brothertwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brothertwo_deathday" value="" size="24" data-role="date" data-inline="false" id="brothertwo_deathday_insert">
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
                        {if $brothertwo_img == 1}
                            <img src="{$urlocalbrothertwo}?{$urlquery_img_thumb_brothertwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brothertwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="brothertwo_deceasedlist_change">
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
                              <input type="hidden" name="brothertwo_img_name" value="" size="24" placeholder="" id="brothertwo_deceasedlist_img_name">
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
                          <input type="text" name="brothertwo_profession" value="{$brothertwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brothertwo_memo" name="brothertwo_memo" placeholder="メモを入力">{$brothertwoMemo}</textarea>
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

<!-- 兄弟姉妹３ぺージ 新規（大切な故人）-->
<div data-role="page" id="deceased_brotherthree_insert">
    <div data-role="header" data-theme="f">
        <h1>兄弟姉妹情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/brotherthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistbrotherthree" name="brotherthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="brotherthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="brotherthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_birthday" value="" size="24" data-role="date" data-inline="false" id="brotherthree_birthday_insert">

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
                              <!-- <input type="date" name="brotherthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="brotherthree_deathday" value="" size="24" data-role="date" data-inline="false" id="brotherthree_deathday_insert">
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
                        {if $brotherthree_img == 1}
                            <img src="{$urlocalbrotherthree}?{$urlquery_img_thumb_brotherthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $brotherthree_img == 0}
                             <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="brotherthree_deceasedlist_change">

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
                              <input type="hidden" name="brotherthree_img_name" value="" size="24" placeholder="" id="brotherthree_deceasedlist_img_name">
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
                          <input type="text" name="brotherthree_profession" value="{$brotherthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="brotherthree_memo" name="brotherthree_memo" placeholder="メモを入力">{$brotherthreeMemo}</textarea>
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

<!-- 子供１ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childone_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildone" name="childone_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childone_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                配偶者名
                            </th>
                            <td>
                                <input type="text" name="childone_spouse_name" value="" size="24" placeholder="配偶者名を入力">
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
                              <!-- <input type="date" name="childone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_birthday" value="" size="24" data-role="date" data-inline="false" id="childone_birthday_insert">
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
                              <!-- <input type="date" name="childone_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childone_deathday" value="" size="24" data-role="date" data-inline="false" id="childone_deathday_insert">
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
                        {if $childone_img == 1}
                            <img src="{$urlocalchildone}?{$urlquery_img_thumb_childone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childone_deceasedlist_change">
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
                              <input type="hidden" name="childone_img_name" value="" size="24" placeholder="" id="childone_deceasedlist_img_name">
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
                          <input type="text" name="childone_profession" value="{$childoneProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childone_memo" name="childone_memo" placeholder="メモを入力">{$childoneMemo}</textarea>
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

<!-- 子供２ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childtwo_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildtwo" name="childtwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childtwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                配偶者名
                            </th>
                            <td>
                                <input type="text" name="childtwo_spouse_name" value="" size="24" placeholder="配偶者を入力">
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
                              <!-- <input type="date" name="childtwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_birthday" value="" size="24" data-role="date" data-inline="false" id="childtwo_birthday_insert">

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
                              <!-- <input type="date" name="childtwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwo_deathday" value="" size="24" data-role="date" data-inline="false" id="childtwo_deathday_insert">

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
                        {if $childtwo_img == 1}
                            <img src="{$urlocalchildtwo}?{$urlquery_img_thumb_childtwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childtwo_deceasedlist_change">
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
                              <input type="hidden" name="childtwo_img_name" value="" size="24" placeholder="" id="childtwo_deceasedlist_img_name">
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
                          <input type="text" name="childtwo_profession" value="{$childtwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwo_memo" name="childtwo_memo" placeholder="メモを入力">{$childtwoMemo}</textarea>
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

<!-- 子供３ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childthree_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildthree" name="childthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                            <th>
                                配偶者名
                            </th>
                            <td>
                                <input type="text" name="childthree_spouse_name" value="{$childthreeSpouseName}" size="24" placeholder="配偶者を入力">
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
                              <!-- <input type="date" name="childthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_birthday" value="" size="24" data-role="date" data-inline="false" id="childthree_birthday_insert">

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
                              <!-- <input type="date" name="childthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthree_deathday" value="" size="24" data-role="date" data-inline="false" id="childthree_deathday_insert">
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
                        {if $childthree_img == 1}
                            <img src="{$urlocalchildthree}?{$urlquery_img_thumb_childthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childthree_deceasedlist_change">
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
                              <input type="hidden" name="childthree_img_name" value="" size="24" placeholder="" id="childthree_deceasedlist_img_name">
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
                          <input type="text" name="childthree_profession" value="{$childthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthree_memo" name="childthree_memo" placeholder="メモを入力">{$childthreeMemo}</textarea>
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

<!-- 子供４ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childfour_insert">
    <div data-role="header" data-theme="f">
        <h1>子供情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourdeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildfour" name="childfour_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childfour_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                     <tr>
                            <th>
                                配偶者名
                            </th>
                            <td>
                                <input type="text" name="childfour_spouse_name" value="{$childfourSpouseName}" size="24" placeholder="配偶者を入力">
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
                              <!-- <input type="date" name="childfour_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_birthday" value="" size="24" data-role="date" data-inline="false" id="childfour_birthday_insert">
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
                              <!-- <input type="date" name="childfour_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfour_deathday" value="" size="24" data-role="date" data-inline="false" id="childfour_deathday_insert">
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
                        {if $childfour_img == 1}
                            <img src="{$urlocalchildfour}?{$urlquery_img_thumb_childfour}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfour_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childfour_deceasedlist_change">
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
                              <input type="hidden" name="childfour_img_name" value="" size="24" placeholder="" id="childfour_deceasedlist_img_name">
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
                          <input type="text" name="childfour_profession" value="{$childfourProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfour_memo" name="childfour_memo" placeholder="メモを入力">{$childfourMemo}</textarea>
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

<!-- 子供１孫１ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childonegrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsononedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildonegrandsonone" name="childonegrandsonone_family_name">
                                <option value="">大切な故人から選ぶ</option>
                                 {foreach from=$deceased_name_list item="deceasedname"}
                                <option value="{$deceasedname['deceasedlist_family_name']}">{$deceasedname['deceasedlist_family_name']}</option>
                                {/foreach}
                            　</select>
                                </select>
                            </td>
                        </tr>
                    </div>
                </div>

                <div style="margin-top:10px;">
                    <div data-role="ui-field-contain">
                        <tr>
                            <th>
                                性別
                            </th>
                            <td>
                                <select name="childonegrandsonone_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childonegrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_birthday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsonone_birthday_insert">
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
                              <!-- <input type="date" name="childonegrandsonone_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsonone_deathday_insert">
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
                        {if $childonegrandsonone_img == 1}
                            <img src="{$urlocalchildonegrandsonone}?{$urlquery_img_thumb_childonegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childonegrandsonone_deceasedlist_change">
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
                              <input type="hidden" name="childonegrandsonone_img_name" value="" size="24" placeholder="" id="childonegrandsonone_deceasedlist_img_name">
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
                          <input type="text" name="childonegrandsonone_profession" value="{$childonegrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonone_memo" name="childonegrandsonone_memo" placeholder="メモを入力">{$childonegrandsononeMemo}</textarea>
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

<!-- 子供１孫２ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childonegrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsontwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildonegrandsontwo" name="childonegrandsontwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childonegrandsontwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childonegrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsontwo_birthday_insert">
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
                              <!-- <input type="date" name="childonegrandsontwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsontwo_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>
                             <br>
                         </th>
                        <td>
                        {if $childonegrandsontwo_img == 1}
                            <img src="{$urlocalchildonegrandsontwo}?{$urlquery_img_thumb_childonegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childonegrandsontwo_deceasedlist_change">
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
                              <input type="hidden" name="childonegrandsontwo_img_name" value="" size="24" placeholder="" id="childonegrandsontwo_deceasedlist_img_name">
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
                          <input type="text" name="childonegrandsontwo_profession" value="{$childonegrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsontwo_memo" name="childonegrandsontwo_memo" placeholder="メモを入力">{$childonegrandsontwoMemo}</textarea>
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

<!-- 子供１孫３ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childonegrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childonegrandsonthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildonegrandsonthree" name="childonegrandsonthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childonegrandsonthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childonegrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsonthree_birthday_insert">
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
                              <!-- <input type="date" name="childonegrandsonthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childonegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false" id="childonegrandsonthree_deathday_insert">
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
                        {if $childonegrandsonthree_img == 1}
                            <img src="{$urlocalchildonegrandsonthree}?{$urlquery_img_thumb_childonegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childonegrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childonegrandsonthree_deceasedlist_change">
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
                              <input type="hidden" name="childonegrandsonthree_img_name" value="" size="24" placeholder="" id="childonegrandsonthree_deceasedlist_img_name">
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
                          <input type="text" name="childonegrandsonthree_profession" value="{$childonegrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childonegrandsonthree_memo" name="childonegrandsonthree_memo" placeholder="メモを入力">{$childonegrandsonthreeMemo}</textarea>
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

<!-- 子供２孫１ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childtwograndsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsononedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildtwograndsonone" name="childtwograndsonone_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childtwograndsonone_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childtwograndsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_birthday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsonone_birthday_insert">
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
                              <!-- <input type="date" name="childtwograndsonone_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonone_deathday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsonone_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:10px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:10px;">
                             顔写真<br>

                         </th>
                        <td>
                        {if $childtwograndsonone_img == 1}
                            <img src="{$urlocalchildtwograndsonone}?{$urlquery_img_thumb_childtwograndsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childtwograndsonone_deceasedlist_change">
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
                              <input type="hidden" name="childtwograndsonone_img_name" value="" size="24" placeholder="" id="childtwograndsonone_deceasedlist_img_name">
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
                          <input type="text" name="childtwograndsonone_profession" value="{$childtwograndsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonone_memo" name="childtwograndsonone_memo" placeholder="メモを入力">{$childtwograndsononeMemo}</textarea>
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

<!-- 子供２孫２ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childtwograndsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsontwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildtwograndsontwo" name="childtwograndsontwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childtwograndsontwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childtwograndsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_birthday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsontwo_birthday_insert">
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
                              <!-- <input type="date" name="childtwograndsontwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsontwo_deathday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsontwo_deathday_insert">
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
                        {if $childtwograndsontwo_img == 1}
                            <img src="{$urlocalchildtwograndsontwo}?{$urlquery_img_thumb_childtwograndsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childtwograndsontwo_deceasedlist_change">
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
                              <input type="hidden" name="childtwograndsontwo_img_name" value="" size="24" placeholder="" id="childtwograndsontwo_deceasedlist_img_name">
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
                          <input type="text" name="childtwograndsontwo_profession" value="{$childtwograndsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsontwo_memo" name="childtwograndsontwo_memo" placeholder="メモを入力">{$childtwograndsontwoMemo}</textarea>
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


<!-- 子供２孫３ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childtwograndsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childtwograndsonthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildtwograndsonthree" name="childtwograndsonthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childtwograndsonthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childtwograndsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_birthday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsonthree_birthday_insert">
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
                              <!-- <input type="date" name="childtwograndsonthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childtwograndsonthree_deathday" value="" size="24" data-role="date" data-inline="false" id="childtwograndsonthree_deathday_insert">
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
                        {if $childtwograndsonthree_img == 1}
                            <img src="{$urlocalchildtwograndsonthree}?{$urlquery_img_thumb_childtwograndsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childtwograndsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childtwograndsonthree_deceasedlist_change">
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
                              <input type="hidden" name="childtwograndsonthree_img_name" value="" size="24" placeholder="" id="childtwograndsonthree_deceasedlist_img_name">
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
                          <input type="text" name="childtwograndsonthree_profession" value="{$childtwograndsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childtwograndsonthree_memo" name="childtwograndsonthree_memo" placeholder="メモを入力">{$childtwograndsonthreeMemo}</textarea>
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

<!-- 子供３孫１ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childthreegrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsononedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildthreegrandsonone" name="childthreegrandsonone_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childthreegrandsonone_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childthreegrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_birthday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsonone_birthday_insert">
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
                              <!-- <input type="date" name="childthreegrandsonone_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonone_deathday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsonone_deathday_insert">
                          </td>
                        </tr>
                    </div>
                </div>

            <div style="margin-top:20px;">
                <div data-role="ui-field-contain">
                    <tr>
                        <th style="margin-top:20px;">
                             顔写真<br>
                             <br
                         </th>
                        <td>
                        {if $childthreegrandsonone_img == 1}
                            <img src="{$urlocalchildthreegrandsonone}?{$urlquery_img_thumb_childthreegrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childthreegrandsonone_deceasedlist_change">
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
                              <input type="hidden" name="childthreegrandsonone_img_name" value="" size="24" placeholder="" id="childthreegrandsonone_deceasedlist_img_name">
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
                          <input type="text" name="childthreegrandsonone_profession" value="{$childthreegrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonone_memo" name="childthreegrandsonone_memo" placeholder="メモを入力">{$childthreegrandsononeMemo}</textarea>
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

<!-- 子供３孫２ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childthreegrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsontwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildthreegrandsontwo" name="childthreegrandsontwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childthreegrandsontwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childthreegrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsontwo_birthday_insert">
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
                              <!-- <input type="date" name="childthreegrandsontwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsontwo_deathday_insert">
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
                        {if $childthreegrandsontwo_img == 1}
                            <img src="{$urlocalchildthreegrandsontwo}?{$urlquery_img_thumb_childthreegrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childthreegrandsontwo_deceasedlist_change">
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
                              <input type="hidden" name="childthreegrandsontwo_img_name" value="" size="24" placeholder="" id="childthreegrandsontwo_deceasedlist_img_name">
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
                          <input type="text" name="childthreegrandsontwo_profession" value="{$childthreegrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsontwo_memo" name="childthreegrandsontwo_memo" placeholder="メモを入力">{$childthreegrandsontwoMemo}</textarea>
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

<!-- 子供３孫３ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childthreegrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childthreegrandsonthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildthreegrandsonthree" name="childthreegrandsonthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childthreegrandsonthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childthreegrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsonthree_birthday_insert">
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
                              <!-- <input type="date" name="childthreegrandsonthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childthreegrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false" id="childthreegrandsonthree_deathday_insert">
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
                        {if $childthreegrandsonthree_img == 1}
                            <img src="{$urlocalchildthreegrandsonthree}?{$urlquery_img_thumb_childthreegrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childthreegrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childthreegrandsonthree_deceasedlist_change">
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
                              <input type="hidden" name="childthreegrandsonthree_img_name" value="" size="24" placeholder="" id="childthreegrandsonthree_deceasedlist_img_name">
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
                          <input type="text" name="childthreegrandsonthree_profession" value="{$childthreegrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childthreegrandsonthree_memo" name="childthreegrandsonthree_memo" placeholder="メモを入力">{$childthreegrandsonthreeMemo}</textarea>
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

<!-- 子供４孫１ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childfourgrandsonone_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsononedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildfourgrandsonone" name="childfourgrandsonone_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childfourgrandsonone_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childfourgrandsonone_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_birthday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsonone_birthday_insert">
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
                              <!-- <input type="date" name="childfourgrandsonone_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonone_deathday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsonone_deathday_insert">
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
                        {if $childfourgrandsonone_img == 1}
                            <img src="{$urlocalchildfourgrandsonone}?{$urlquery_img_thumb_childfourgrandsonone}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonone_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childfourgrandsonone_deceasedlist_change">
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
                              <input type="hidden" name="childfourgrandsonone_img_name" value="" size="24" placeholder="" id="childfourgrandsonone_deceasedlist_img_name">
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
                          <input type="text" name="childfourgrandsonone_profession" value="{$childfourgrandsononeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonone_memo" name="childfourgrandsonone_memo" placeholder="メモを入力">{$childfourgrandsononeMemo}</textarea>
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

<!-- 子供４孫２ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childfourgrandsontwo_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsontwodeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildfourgrandsontwo" name="childfourgrandsontwo_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childfourgrandsontwo_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childfourgrandsontwo_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_birthday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsontwo_birthday_insert">
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
                              <!-- <input type="date" name="childfourgrandsontwo_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsontwo_deathday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsontwo_deathday_insert">
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
                        {if $childfourgrandsontwo_img == 1}
                            <img src="{$urlocalchildfourgrandsontwo}?{$urlquery_img_thumb_childfourgrandsontwo}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsontwo_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childfourgrandsontwo_deceasedlist_change">
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
                              <input type="hidden" name="childfourgrandsontwo_img_name" value="" size="24" placeholder="" id="childfourgrandsontwo_deceasedlist_img_name">
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
                          <input type="text" name="childfourgrandsontwo_profession" value="{$childfourgrandsontwoProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsontwo_memo" name="childfourgrandsontwo_memo" placeholder="メモを入力">{$childfourgrandsontwoMemo}</textarea>
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

<!-- 子供４孫３ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_childfourgrandsonthree_insert">
    <div data-role="header" data-theme="f">
        <h1>孫情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
    </div>
    <div data-role="content">
                <form action="../orderpage/childfourgrandsonthreedeceasedatainsert" method="post" data-ajax="false" enctype="multipart/form-data">
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
                                <select class="deceasedlistchildfourgrandsonthree" name="childfourgrandsonthree_family_name">
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
                                性別
                            </th>
                            <td>
                                <select name="childfourgrandsonthree_sex">
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
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
                              <!-- <input type="date" name="childfourgrandsonthree_birthday" value="1950-01-01" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_birthday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsonthree_birthday_insert">
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
                              <!-- <input type="date" name="childfourgrandsonthree_deathday" value="{$nowDate}" size="24" data-role="date" data-inline="false"> -->
                              <input placeholder="年/月/日" type="text" onfocus="(this.type='date')" name="childfourgrandsonthree_deathday" value="" size="24" data-role="date" data-inline="false" id="childfourgrandsonthree_deathday_insert">
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
                        {if $childfourgrandsonthree_img == 1}
                            <img src="{$urlocalchildfourgrandsonthree}?{$urlquery_img_thumb_childfourgrandsonthree}" style="width: 100%; position:relative;">
                        {/if}
                        {if $childfourgrandsonthree_img == 0}
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="childfourgrandsonthree_deceasedlist_change">
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
                              <input type="hidden" name="childfourgrandsonthree_img_name" value="" size="24" placeholder="" id="childfourgrandsonthree_deceasedlist_img_name">
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
                          <input type="text" name="childfourgrandsonthree_profession" value="{$childfourgrandsonthreeProfession}" size="24" placeholder="職業を入力">
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
                            <textarea id="childfourgrandsonthree_memo" name="childfourgrandsonthree_memo" placeholder="メモを入力">{$childfourgrandsonthreeMemo}</textarea>
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

<!-- 祖父父方ぺージ 新規大切な故人-->
<div data-role="page" id="deceased_grandfatherfather_insert">
    <div data-role="header" data-theme="f">
        <h1>祖父父方情報登録</h1>
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="grandfatherfather_deceasedlist_change">
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
                              <input type="hidden" name="grandfatherfather_img_name" value="" size="24" placeholder="" id="grandfatherfather_deceasedlist_img_name">
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
                          <input type="text" name="grandfatherfather_profession" value="{$grandfatherfatherProfession}" size="24">
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
                            <textarea id="grandfatherfather_memo" name="grandfatherfather_memo">{$grandfatherfatherMemo}</textarea>
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="grandfathermather_deceasedlist_change">
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
                              <input type="hidden" name="grandfathermather_img_name" value="" size="24" placeholder="" id="grandfathermather_deceasedlist_img_name">
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="grandmatherfather_deceasedlist_change">
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
                              <input type="hidden" name="grandmatherfather_img_name" value="" size="24" placeholder="" id="grandmatherfather_deceasedlist_img_name">
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
        <a style= "float:right; font-weight: bold;" href="#top" data-role="button" data-icon="home" data-direction="reverse">戻る</a>
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
                            <img src="../imges/Entypo.png" style="max-width: 200px; max-height: 200px; position:relative;" id="grandmathermather_deceasedlist_change">
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
                              <input type="hidden" name="grandmathermather_img_name" value="" size="24" placeholder="" id="grandmathermather_deceasedlist_img_name">
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
</div>

</div>
</body>
</html>
