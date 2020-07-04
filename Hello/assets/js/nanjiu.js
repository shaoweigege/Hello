
console.log('%c 生命不息，折腾不止，就是喜欢花里胡哨  南玖博客：https://ztongyang.cn','color: #fff; background: orange; padding:5px');
console.log('%cHHHHHHHHH     HHHHHHHHH                   lllllll lllllll                  \nH:::::::H     H:::::::H                   l:::::l l:::::l                  \nH:::::::H     H:::::::H                   l:::::l l:::::l                  \nHH::::::H     H::::::HH                   l:::::l l:::::l                  \n  H:::::H     H:::::H      eeeeeeeeeeee    l::::l  l::::l    ooooooooooo   \n  H:::::H     H:::::H    ee::::::::::::ee  l::::l  l::::l  oo:::::::::::oo \n  H::::::HHHHH::::::H   e::::::eeeee:::::eel::::l  l::::l o:::::::::::::::o\n  H:::::::::::::::::H  e::::::e     e:::::el::::l  l::::l o:::::ooooo:::::o\n  H:::::::::::::::::H  e:::::::eeeee::::::el::::l  l::::l o::::o     o::::o\n  H::::::HHHHH::::::H  e:::::::::::::::::e l::::l  l::::l o::::o     o::::o\n  H:::::H     H:::::H  e::::::eeeeeeeeeee  l::::l  l::::l o::::o     o::::o\n  H:::::H     H:::::H  e:::::::e           l::::l  l::::l o::::o     o::::o\nHH::::::H     H::::::HHe::::::::e         l::::::ll::::::lo:::::ooooo:::::o\nH:::::::H     H:::::::H e::::::::eeeeeeee l::::::ll::::::lo:::::::::::::::o\nH:::::::H     H:::::::H  ee:::::::::::::e l::::::ll::::::l oo:::::::::::oo \nHHHHHHHHH     HHHHHHHHH    eeeeeeeeeeeeee llllllllllllllll   ooooooooooo   ','color: #fff; background: black; padding:5px');
// console.log('%c 堂下何人，偷看控制台乃是重罪，你可知罪！','color: red; background: #fff; padding:5px;font-size:20px;');
// console.log("%c ", "background: url(https://s1.ax1x.com/2020/03/15/81OneI.png) no-repeat;padding-left:640px;padding-bottom: 242px;")

// 移动端搜索框
var searchForm=document.getElementById("topsearch");var m_controlSearch=document.getElementById("m_controlSearch");m_controlSearch.onclick=function(){var oop2=searchForm.style.opacity;if(oop2=="0"){searchForm.style.visibility="visible";searchForm.style.opacity="1";document.getElementById("m_switchicon").innerHTML='<i class="fa fa-times" aria-hidden="true"></i>'}else{searchForm.style.visibility="hidden";searchForm.style.opacity="0";document.getElementById("m_switchicon").innerHTML='<i class="fa fa-search" aria-hidden="true"></i>'}};

// 切换头像与二维码
$(document).ready(function(){var img=document.getElementById("avatar-img");var avatar=$(".avatar").text();var QQqrcode=$(".QQqr").text();var wechatqrcode=$(".wechatqr").text();$(".qq").hover(function(){img.src=QQqrcode},function(){img.src=avatar});$(".weixin").hover(function(){img.src=wechatqrcode},function(){img.src=avatar})});





// 网站运行时间
function runTime(){var d=new Date(),str="";BirthDay=new Date("July 25,2019");today=new Date();timeold=(today.getTime()-BirthDay.getTime());sectimeold=timeold/1000;secondsold=Math.floor(sectimeold);msPerDay=24*60*60*1000;msPerYear=365*24*60*60*1000;e_daysold=timeold/msPerDay;e_yearsold=timeold/msPerYear;daysold=Math.floor(e_daysold);yearsold=Math.floor(e_yearsold);str+=daysold+"天";str+=d.getHours()+"时";str+=d.getMinutes()+"分";str+=d.getSeconds()+"秒";return str}setInterval(function(){$("#run_time").html(runTime())},1000);
	
// 归档收缩	
$m=$(".collapsed");function show(obj){controls=$(obj).attr("aria-controls");angle=$(obj).attr("angle");var target=document.getElementById(controls);if($("#"+controls).attr("class")=="collapse show"){document.getElementById(angle).innerHTML='<i class="fa fa-angle-right" aria-hidden="true">';target.setAttribute("class","collapse")}else{document.getElementById(angle).innerHTML='<i class="fa fa-angle-down" aria-hidden="true">';target.setAttribute("class","collapse show")}};

// 自适应移动端侧边栏
var side = document.getElementById("m_side");
var m_cover = document.getElementById("overlay");
var body = document.getElementById("ty01");
$("#m_btn").on("click", function(e) {
    e.stopPropagation();
    side.setAttribute("class", "r_side scroll-y");
    m_cover.style.opacity = 1;
    m_cover.style.display = "block";
    body.setAttribute("class", "ofw")
});
$(document).click(function(e) {
    if ($("#overlay").is(e.target)) {
        m_cover.style.opacity = 0;
        m_cover.style.display = "none";
        side.setAttribute("class", "l_side scroll-y");
        body.removeAttribute("class", "ofw");
        $("#m-toc-widget").attr('class','rtoc');
    }
});

// 设置遮罩层禁止滑动
$("#overlay").bind("touchmove", function (e) {e.preventDefault();});
     
// 移动端上滑自动隐藏地址栏     
window.οnlοad=function(){if(document.documentElement.scrollHeight<=document.documentElement.clientHeight){bodyTag=document.getElementsByTagName("body")[0];bodyTag.style.height=document.documentElement.clientWidth/screen.width*screen.height+"px"}setTimeout(function(){window.scrollTo(0,1)},0)};
     
// 移动端侧栏下拉菜单
// 呸呸,这几行代码让我这小菜鸡折腾了一个多小时,记录一下今日的衰2020-03-27
function extend(obj){var ctrl_mid=$(obj).attr("c_mid");var num=$("#"+ctrl_mid).attr("num");var ch_menu=document.getElementById(ctrl_mid);if(ch_menu.style.height=="0px"){$("#"+ctrl_mid).removeClass("dpn");$("#"+ctrl_mid).addClass("dpb");$(obj).children("i").replaceWith('<i class="fa fa-angle-down" aria-hidden="true">');setTimeout(function(){ch_menu.style.height="calc("+parseInt(num)*2+"px"+" + "+parseInt(num)*2.5+"rem"+")"},0)}else{setTimeout(function(){$("#"+ctrl_mid).addClass("dpn")},300);$(obj).children("i").replaceWith('<i class="fa fa-angle-right" aria-hidden="true">');$("#"+ctrl_mid).removeClass("dpb");ch_menu.style.height="0px"}};

// 视频播放切换
$(".play").on("click",function(){var spurl=$(this).attr("data-url");$("#dplayer").attr("play-url",spurl);sw()});

// 表情配置
if($(".OwO").length>0){var OwO_demo=new OwO({logo:"OωO表情",container:document.getElementsByClassName("OwO")[0],target:document.getElementsByClassName("OwO-textarea")[0],api:"/usr/themes/Hello/assets/OwO/OwO.json",position:"down",width:"100%",maxHeight:"250px"})};

// 视频解析
$(".parse-video").on("click",function(){var url=prompt("请输入原视频链接：");var api="https://parse.ztongyang.cn/jiexi/?url=";if(url){if(url.slice(0,4)!=="http"){alert("请输入以http/https开头的合法的视频URL！")}else{window.open(api+url)}}});


// 返回顶部
!function(o){o.fn.toTop=function(t){var i=this,e=o(window),s=o("html, body"),n=o.extend({autohide:!0,offset:420,speed:500,position:0,right:15,bottom:30},t);i.css({cursor:"pointer"}),n.autohide&&i.css("display","none"),n.position&&i.css({position:"fixed",right:n.right,bottom:n.bottom}),i.click(function(){s.animate({scrollTop:0},n.speed)}),e.scroll(function(){var o=e.scrollTop();n.autohide&&(o>n.offset?i.fadeIn(n.speed):i.fadeOut(n.speed))})}}(jQuery);

// 文章TOC展示
$("#toc-btn").on("click",function(){
    if($("#toc-widget").css("display") == "none"){
        $("#toc-widget").attr("style",'display:block;');  
        $("#toc-widget").css("width",$("#toc-widget").width());
    }else{
        $("#toc-widget").attr("style",'display:none;');          
    }
})


// 移动端TOC
$("#m-toc-btn").on("click",function(){
    $("#m-toc-widget").removeAttr('class','rtoc');
    m_cover.style.opacity = 1;
    m_cover.style.display = "block";
    body.setAttribute("class", "ofw");
})
$(".toc-ctrl").on("click",function(){
    m_cover.style.opacity = 0;
    m_cover.style.display = "none";
    side.setAttribute("class", "l_side scroll-y");
    body.removeAttribute("class", "ofw");
    $("#m-toc-widget").attr('class','rtoc');
})

















