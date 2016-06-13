/**
 * Created by alic on 15-7-18.
 */
$(document).ready(function () {
    var btn_new = $("#btn_new").button();
    var date_s = $("#act_s_date").datepicker({dateFormat:"yy-mm-dd"});
    var date_e = $("#act_e_date").datepicker({dateFormat:"yy-mm-dd"});
    var fm = document.getElementsByTagName("form")[0];
    array = ["0:00","0:30","1:00",'1:30',"2:00","2:30","3:00","3:30",
        "4:00","5:00","5:30","6:00","6:30","7:00","7:30","8:00","8:30",
        "9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30",
        "13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30",
        "17:00","17:30","18:00","18:", "19:00","19:30","20:00","20:30",
        "21:00","21:30","22:00","22:30","23:00","23:30"];
    $("#act_s_time").autocomplete({source:array});
    /*表单验证*/
    fm.onsubmit = function(){
        if(fm.act_name.value.length<1 || fm.act_name.value.length>16){
            $("#act_name").css({border:"2px solid blue"});
            return false;
        }
        if(fm.act_num.value.length<1){
            $("#act_num").css({border:"2px solid blue"});
            return false;
        }
        if(fm.act_place.value.length<1){
            $("#act_place").css({border:"2px solid blue"});
            return false;
        }
        if(fm.act_s_date.value.length<1){
            $("#act_s_date").css({border:"2px solid blue"});
            return false;
        }
        if(fm.act_s_time.value.length<1){
            $("#act_s_time").css({border:"2px solid blue"});
            return false;
        }
        if(fm.act_e_date.value.length<1){
            $("#act_e_date").css({border:"2px solid blue"});
            return false;
        }
        //alert("ok")
        return true;
    };
    /*change_event*/
});