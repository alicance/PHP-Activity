/**
 * Created by alic on 15-7-19.
 */
$(document).ready(function () {
    var find_btn = $("#more_sub").button();
    var btn = $(".reg_btn").button();
    var h_reg_btn = $(".h_reg_btn").button();
    var register = $(".reg_btn");
    register.each(function(index,event){
        $(this).click(function () {
            $.get("handler_reg.php",{id:$(this).attr("title")}, function (data){
                window.location.reload();
                //alert("加入成功")
            })
        })
    });
})