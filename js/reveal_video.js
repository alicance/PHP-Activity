/**
 * Created by alic on 15-7-21.
 */
$(document).ready(function () {
    var share_btn = $("#share_btn").button();
    var re_btn = $(".re_img");
    var id_value = $(".hidden").val();
    var con = $(".txt").val();

    re_btn.click(function(){
        $.get("handler_rec.php",{id:id_value,con:con,type:2},function(data){
            $(".txt").val("");
            window.location.reload();
        //alert(con);
        })
    });
    $(".txt").change(function(){
        con = $(".txt").val();
    })

});