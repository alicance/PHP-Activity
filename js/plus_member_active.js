/**
 * Created by alic on 15-7-20.
 */
$(document).ready(function(){
    var pl_btn = $(".pl_btn").button();
    var toggle_btn1 = $(".toggle1").button();
    toggle_btn1.click(function(){
        $("#plu").slideToggle(1000);
        $("#un_plu").slideToggle(1000);
    });
    var toggle_btn2 = $(".toggle2").button();
    toggle_btn2.click(function(){
        $("#plu").slideToggle(1000);
        $("#un_plu").slideToggle(1000);
    })
});