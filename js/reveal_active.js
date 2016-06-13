/**
 * Created by alic on 15-7-18.
 */
$(document).ready(function () {
    var btn_b_l = $(".b_l").button();
    //var btn_b_r = $(".b_r").button();
    //var btn_b_l_h = $(".b_l_h").button();
    var img = $(".up_img").button();
    var video = $(".up_video").button();
    var s_img = $(".s_img").button();
    var s_video = $(".s_video").button();
    btn_b_l.each(function(index,event){
        $(this).click(function () {
            $.get("handler_reg.php",{id:$(this).attr("title")}, function (data){
                window.location.reload();
            })
        })
    });

    var re_btn = $(".result");
    re_btn.each(function(index,event){
        $(this).blur(function () {
            var tt = $(this).val();
            var id = $(this).attr("title");
            $.get("handler_result.php",{result:tt,id:id}, function (data){
                window.location.reload();
            //alert(id);
            })
        })
    });
});