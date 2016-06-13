/**
 * Created by alic on 15-7-20.
 */
$(document).ready(function () {
    var up_btn = $("#up_btn").button();
    var fm = document.getElementsByTagName("form")[0];
    fm.onsubmit = function () {
        if(fm.photo.value.length==0){
            $(".tip").css({display:"block"});
            return false
        }
        return true
    }
    fm.photo.onchange = function () {
        if(fm.photo.value.length!=0){
            $(".tip").css({display:"none"});
        }
    }
})