/**
 * Created by alic on 15-7-18.
 */
$(document).ready(function () {
    var join_btn = $(".join").button();
    var h_btn = $(".h_btn").button();
    var photo_q = $(".photo_q").button();
    var video_q = $(".video_q").button();

    join_btn.each(function(index,event){
        $(this).click(function () {
            $.get("handler_join.php",{id:$(this).attr("title")}, function (data){
                window.location.reload();
                //alert("加入成功")
            })
        })
    });
});