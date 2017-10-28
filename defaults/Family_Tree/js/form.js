/*
 * form.js
 * フォーム画面の操作関連
 * Copyright (c) 2016 DigitalspaceWOW All rights reserved.
 */

// (function($) {

  /**
   * インジケータ表示範囲を管理するコントローラ
   *
   * @class indicatorController
   */
  // var indicatorController = {

  //   __name: 'indicatorController',

    /**
     * インジケータ表示ボタン押下イベント
     *
     * @memberOf indicatorController
     */
    // '#submit-1 click': function(){

      //インジケータ表示
//       var indicator = this.indicator({
//         message: ''
//       }).show();


//     },
//   };

//   $(function(){
//     h5.core.controller('body', indicatorController);
//   });

// })(jQuery);


$(function()
{
    // ------------大切な故人＿選択時---------------------//

    //父親
    $(".deceasedlistfather").on('change', function(){
        var hostUrl     ="../orderpage/fatherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="father_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#father_birthday_insert").val(json.deceasedlist_birthday);
                    $("#father_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#father_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#father_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#father_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //母親
    $(".deceasedlistmather").on('change', function(){
        var hostUrl     ="../orderpage/matherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="mather_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#mather_birthday_insert").val(json.deceasedlist_birthday);
                    $("#mather_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#mather_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#mather_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#mather_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //配偶者
    $(".deceasedlistspouse").on('change', function(){
        var hostUrl     ="../orderpage/spousedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="spouse_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#spouse_birthday_insert").val(json.deceasedlist_birthday);
                    $("#spouse_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#spouse_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#spouse_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#spouse_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //兄弟姉妹１
    $(".deceasedlistbrotherone").on('change', function(){
        var hostUrl     ="../orderpage/brotheronedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="brotherone_deceased_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#brotherone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#brotherone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#brotherone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#brotherone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#brotherone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //兄弟姉妹２
    $(".deceasedlistbrothertwo").on('change', function(){
        var hostUrl     ="../orderpage/brothertwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="brothertwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#brothertwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#brothertwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#brothertwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#brothertwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#brothertwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //兄弟姉妹３
    $(".deceasedlistbrotherthree").on('change', function(){
        var hostUrl     ="../orderpage/brotherthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="brotherthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#brotherthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#brotherthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#brotherthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#brotherthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#brotherthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //祖父父方
    $(".deceasedlistgrandfatherfather").on('change', function(){
        var hostUrl     ="../orderpage/grandfatherfatherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="grandfatherfather_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#grandfatherfather_birthday_insert").val(json.deceasedlist_birthday);
                    $("#grandfatherfather_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#grandfatherfather_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#grandfatherfather_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#grandfatherfather_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //祖母父方
    $(".deceasedlistgrandfathermather").on('change', function(){
        var hostUrl     ="../orderpage/grandfathermatherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="grandfathermather_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#grandfathermather_birthday_insert").val(json.deceasedlist_birthday);
                    $("#grandfathermather_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#grandfathermather_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#grandfathermather_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#grandfathermather_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //祖父母方
    $(".deceasedlistgrandmatherfather").on('change', function(){
        var hostUrl     ="../orderpage/grandmatherfatherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="grandmatherfather_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#grandmatherfather_birthday_insert").val(json.deceasedlist_birthday);
                    $("#grandmatherfather_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#grandmatherfather_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#grandmatherfather_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#grandmatherfather_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //祖母母方
    $(".deceasedlistgrandmathermather").on('change', function(){
        var hostUrl     ="../orderpage/grandmathermatherdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="grandmathermather_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#grandmathermather_birthday_insert").val(json.deceasedlist_birthday);
                    $("#grandmathermather_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#grandmathermather_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#grandmathermather_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#grandmathermather_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //子供１
    $(".deceasedlistchildone").on('change', function(){
        var hostUrl     ="../orderpage/childonedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childone_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供２
    $(".deceasedlistchildtwo").on('change', function(){
        var hostUrl     ="../orderpage/childtwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childtwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childtwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childtwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childtwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childtwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childtwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供３
    $(".deceasedlistchildthree").on('change', function(){
        var hostUrl     ="../orderpage/childthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供４
    $(".deceasedlistchildfour").on('change', function(){
        var hostUrl     ="../orderpage/childfourdeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childfour_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childfour_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childfour_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childfour_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childfour_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childfour_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供１孫１
    $(".deceasedlistchildonegrandsonone").on('change', function(){
        var hostUrl     ="../orderpage/childonegrandsononedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childonegrandsonone_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childonegrandsonone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childonegrandsonone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childonegrandsonone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childonegrandsonone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childonegrandsonone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供１孫２
    $(".deceasedlistchildonegrandsontwo").on('change', function(){
        var hostUrl     ="../orderpage/childonegrandsontwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childonegrandsontwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childonegrandsontwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childonegrandsontwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childonegrandsontwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childonegrandsontwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childonegrandsontwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供１孫３
    $(".deceasedlistchildonegrandsonthree").on('change', function(){
        var hostUrl     ="../orderpage/childonegrandsonthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childonegrandsonthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childonegrandsonthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childonegrandsonthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childonegrandsonthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childonegrandsonthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childonegrandsonthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供２孫１
    $(".deceasedlistchildtwograndsonone").on('change', function(){
        var hostUrl     ="../orderpage/childtwograndsononedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childtwograndsonone_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childtwograndsonone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childtwograndsonone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childtwograndsonone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childtwograndsonone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childtwograndsonone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供２孫２
    $(".deceasedlistchildtwograndsontwo").on('change', function(){
        var hostUrl     ="../orderpage/childtwograndsontwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childtwograndsontwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childtwograndsontwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childtwograndsontwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childtwograndsontwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childtwograndsontwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childtwograndsontwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供２孫３
    $(".deceasedlistchildtwograndsonthree").on('change', function(){
        var hostUrl     ="../orderpage/childtwograndsonthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childtwograndsonthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childtwograndsonthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childtwograndsonthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childtwograndsonthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childtwograndsonthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childtwograndsonthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供３孫１
    $(".deceasedlistchildthreegrandsonone").on('change', function(){
        var hostUrl     ="../orderpage/childthreegrandsononedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childthreegrandsonone_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childthreegrandsonone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childthreegrandsonone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childthreegrandsonone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childthreegrandsonone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childthreegrandsonone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供３孫２
    $(".deceasedlistchildthreegrandsontwo").on('change', function(){
        var hostUrl     ="../orderpage/childthreegrandsontwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childthreegrandsontwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childthreegrandsontwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childthreegrandsontwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childthreegrandsontwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childthreegrandsontwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childthreegrandsontwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供３孫３
    $(".deceasedlistchildthreegrandsonthree").on('change', function(){
        var hostUrl     ="../orderpage/childthreegrandsonthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childthreegrandsonthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childthreegrandsonthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childthreegrandsonthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childthreegrandsonthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childthreegrandsonthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childthreegrandsonthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });


    //子供４孫１
    $(".deceasedlistchildfourgrandsonone").on('change', function(){
        var hostUrl     ="../orderpage/childfourgrandsononedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childfourgrandsonone_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childfourgrandsonone_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childfourgrandsonone_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childfourgrandsonone_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childfourgrandsonone_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childfourgrandsonone_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供４孫２
    $(".deceasedlistchildfourgrandsontwo").on('change', function(){
        var hostUrl     ="../orderpage/childfourgrandsontwodeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childfourgrandsontwo_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childfourgrandsontwo_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childfourgrandsontwo_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childfourgrandsontwo_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childfourgrandsontwo_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childfourgrandsontwo_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

    //子供４孫３
    $(".deceasedlistchildfourgrandsonthree").on('change', function(){
        var hostUrl     ="../orderpage/childfourgrandsonthreedeceasedlistselect";
        var mid         = $("input[name ='customer_id']").val();
        var param       = $('select[name="childfourgrandsonthree_family_name"] option:selected').text();
            $.ajax({
                url: hostUrl,
                type:'POST',
                dataType: "html",
                async : false,
                data:{
                    id:mid,
                    selectname:param
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $("#childfourgrandsonthree_birthday_insert").val(json.deceasedlist_birthday);
                    $("#childfourgrandsonthree_deathday_insert").val(json.deceasedlist_deathday);

                    if (json.deceasedlist_img_name !== "") {
                        var imgurl = "http://ms-dev.wow-d.net/mng/readdeceasedlistimage?customer_id=" + json.customer_id + "&deceasedlist_img_name=" + json.deceasedlist_img_name;
                        $("#childfourgrandsonthree_deceasedlist_change").attr('src', imgurl);
                    }else{
                        $("#childfourgrandsonthree_deceasedlist_change").attr('src', '../imges/Entypo.png');
                    }

                    $('#childfourgrandsonthree_deceasedlist_img_name').val(json.deceasedlist_img_name);
                },
                error: function(data) {
                }
            });
            return false;
        });

});
