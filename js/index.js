/**
 * Created by alic on 15-7-18.
 */
$(document).ready(function () {
    var btn_login = $("#sub").button();
    var header_btn = $("#header_act");
    var fm = document.getElementsByTagName("form")[0];
    header_btn.click(function () {
        window.location.href = "active.php";
    });
})