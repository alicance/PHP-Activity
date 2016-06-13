/**
 * Created by alic on 15-7-19.
 */
$(document).ready(function () {
    var header_btn = $("#header_act");
    var hidden = $("#hidden");
    header_btn.click(function () {
        hidden.slideToggle(300);
    });


    //$(function () {
//获取要定位元素距离浏览器顶部的距离
//        var obj_distance = $("#head").offset().top;
        //var dis = $("#content").offset().top;

//滚动条事件
//        $(window).scroll(function () {
//            var dis = 0;
////获取滚动条的滑动距离
//            var scroll_Top = $(this).scrollTop();
////滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
//            if (scroll_Top >= obj_distance) {
//                $("#head").css({"position": "fixed", "top": 0,"margin-top": 0});
//                $("#hidden").css({});
//                $("#assortment").css({"margin-top":dis});
//            }
//            else {
//                $("#head").css({"position": "relative","margin-top":30});
//                //$("#content").css({"margin-top": 30, "margin-right": 20, "margin-button": 30, "margin-left": 20});
//            }
//        })
//    });


})