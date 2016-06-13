/**
 * Created by alic on 15-7-19.
 */
$(document).ready(function(){
    var group_btn = $("#group_btn").button();
    var fm = document.getElementsByTagName("form")[0];
    var error_pass = $("#error_pass");
    var error_name = $("#error_name");
    fm.onsubmit = function () {
        if(fm.named.value.length == 0 || fm.named.value.length>9){
            error_name.css({display:"block"})
            return false
        }
        if(fm.password.value.length>0 && fm.password.value.length<5){
            error_pass.css({display:"block"})
            return false
        }
        return true
    };

    fm.named.onchange = function(){
        if(fm.named.value.length != 0 || fm.named.value.length>9){
            error_name.css({display:"none"})
        }
    }
    fm.password.onchange = function(){
        if(fm.password.value.length>4){
            error_pass.css({display:"none"})
        }
    }
})