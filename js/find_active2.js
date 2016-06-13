/**
 * Created by alic on 15-7-18.
 */
$(document).ready(function () {
    var header_btn = $("#header_act");
    var find_btn = $("#find_sub").button();
    header_btn.click(function () {
        window.location.href = "active.php";
    });
    var join = $(".join");
    join.each(function(index,event){
        $(this).click(function () {
            $.get("handler_join.php",{id:$(this).attr("title")}, function (data){
                window.location.replace();
                //alert("加入成功")
            })
        })
    });
});