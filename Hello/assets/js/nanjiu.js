console.log('%c 生命不息，折腾不止  南玖博客：https://ztongyang.cn','color: green; background: #fff; padding:5px');

console.log('%c 堂下何人，偷看控制台乃是重罪，你可知罪！','color: red; background: #fff; padding:5px;font-size:20px;');

console.log("%c ", "background: url(https://s1.ax1x.com/2020/03/15/81OneI.png) no-repeat;padding-left:640px;padding-bottom: 242px;")





// 移动端搜索框
var searchForm = document.getElementById('topsearch');
var m_controlSearch  = document.getElementById('m_controlSearch');
m_controlSearch.onclick = function(){
    var oop2 = searchForm.style.opacity;
    if(oop2 == '0'){
        searchForm.style.visibility = 'visible';
        searchForm.style.opacity = '1';
        document.getElementById('m_switchicon').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    }else{
        searchForm.style.visibility = 'hidden';
        searchForm.style.opacity = '0';
        document.getElementById('m_switchicon').innerHTML = '<i class="fa fa-search" aria-hidden="true"></i>';
    }
}

// 切换头像与二维码
$(document).ready(function() {
    var img = document.getElementById('avatar-img');
    var avatar = $(".avatar").text()
	var QQqrcode = $(".QQqr").text();
	var wechatqrcode = $(".wechatqr").text();
	$(".qq").hover(function(){
		img.src = QQqrcode;
	},function(){
		img.src = avatar;
	});
	$(".weixin").hover(function(){
		img.src = wechatqrcode;
	},function(){
		img.src = avatar;
	});

});




// 打字机
// var typed_text = $(".typed-text").text();
// typed_array = typed_text.split("\n");
// var typed = new Typed("#typed", {
//     strings: typed_array,
//     startDelay: 300,
//     typeSpeed: 100,
//     loop: true,
//     backSpeed: 50,
//     showCursor: true
// });

// 欢迎信息
// $(function(){
//         var t = document.createElement("a");
//         t.href = document.referrer;
//         var msgTitle = t.hostname;
//         var name = t.hostname.split(".")[1];
//         if("" !== document.referrer){
//             switch (name) {
//                 case 'bing':
//                     msgTitle = '必应搜索';
//                     break;
//                 case 'baidu':
//                     msgTitle = '百度搜索';
//                     break;
//                 case 'so':
//                     msgTitle = '360搜索';
//                     break;
//                 case 'google':
//                     msgTitle = '谷歌搜索';
//                     break;
//                 case 'sm':
//                     msgTitle = '神马搜索';
//                     break;
//                 case 'sogou':
//                     msgTitle = '搜狗搜索';
//                     break;
//                 default:
//                     msgTitle =  t.hostname;
//             }
//         };
//         var time = (new Date).getHours();
//         var msg = '';
//         23 < time || time <= 5 ? msg = "你是夜猫子呀？这么晚还不睡觉，明天起的来嘛？":
//         5< time && time <= 7 ? msg = "早上好！一日之计在于晨，美好的一天就要开始了！":
//         7< time && time <= 11 ? msg = "上午好！工作顺利嘛，不要久坐，多起来走动走动哦！":
//         11< time && time <= 14 ? msg = "中午了，工作了一个上午，现在是午餐时间！":
//         14< time && time <= 17 ? msg = "午后很容易犯困呢，今天的运动目标完成了吗？":
//         17< time && time <= 19 ? msg = "傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~":
//         19< time && time <= 21 ? msg = "晚上好，今天过得怎么样？":
//         21< time && time <= 23 && (msg = "已经这么晚了呀，早点休息吧，晚安~");
//         $.ajax({
//             type:"get", 
//             url:"https://api.gqink.cn/api/v2/UserInfo",  
//             data:{type:'json'},
//             async:true,   
//             success:function(data){
//                 layer.msg("Hi~ 来自"+ data.data.region + data.data.city + data.data.isp+'~<br/>Hi~ 从'+msgTitle+'来的朋友！<br/>使用 '+ data.data.os +"<br/>"+ data.data.browser +' 访问本站！' + '<br/>' + msg);
//             }
//         }); 
//     });


// 网站运行时间
function runTime() {
	var d = new Date(),
	str = '';
	BirthDay = new Date("July 25,2019");
	today = new Date();
	timeold = (today.getTime() - BirthDay.getTime());
	sectimeold = timeold / 1000;
	secondsold = Math.floor(sectimeold);
	msPerDay = 24 * 60 * 60 * 1000;
	msPerYear = 365 * 24 * 60 * 60 * 1000;
	e_daysold = timeold / msPerDay;
	e_yearsold = timeold / msPerYear;
	daysold = Math.floor(e_daysold);
	yearsold = Math.floor(e_yearsold);
	// str = yearsold + "年";
	str += daysold + "天";
	str += d.getHours() + '时';
	str += d.getMinutes() + '分';
	str += d.getSeconds() + '秒';
	return str;
}
setInterval(function() {
	$('#run_time').html(runTime())
},
1000);


	
// 归档收缩	
$m = $('.collapsed');
function show(obj) {
	controls = $(obj).attr("aria-controls");
	angle = $(obj).attr("angle");
	var target = document.getElementById(controls);
	if($("#" + controls).attr("class") == "collapse show"){
		document.getElementById(angle).innerHTML = '<i class="fa fa-angle-right" aria-hidden="true">';
		target.setAttribute("class","collapse");
	}else{
		document.getElementById(angle).innerHTML = '<i class="fa fa-angle-down" aria-hidden="true">';
		target.setAttribute("class","collapse show");
	}
}


// 自适应移动端侧边栏
var side  = document.getElementById('m_side');
var m_cover = document.getElementById('overlay');
var body = document.getElementById('ty01');
$('#m_btn').on('click', function(e){
  e.stopPropagation(); 
  side.setAttribute("class","r_side scroll-y");
  m_cover.style.opacity = 1;
  m_cover.style.display = "block";
  body.setAttribute("class","ofw");
});
$(document).click(function(e){
     if($('#overlay').is(e.target)){
      m_cover.style.opacity = 0;
      m_cover.style.display = "none";
      side.setAttribute("class","l_side scroll-y");
      body.removeAttribute("class","ofw");
     }
});  


// 设置遮罩层禁止滑动
    $("#overlay").bind("touchmove", function (e) {
        e.preventDefault();
});
     
// 移动端上滑自动隐藏地址栏     
window.οnlοad=function(){
	if(document.documentElement.scrollHeight <= document.documentElement.clientHeight) {
		bodyTag = document.getElementsByTagName('body')[0];
		bodyTag.style.height = document.documentElement.clientWidth / screen.width * screen.height + 'px';
		}
	setTimeout(function() {
		window.scrollTo(0, 1)
		}, 0);
};
     
     

     
     
// 移动端侧栏下拉菜单
// 呸呸,这几行代码让我这几小菜鸡折腾了一个多小时,记录一下今日的衰2020-03-27
function extend(obj) {
	var ctrl_mid = $(obj).attr("c_mid");
	var num = $("#" + ctrl_mid).attr("num");
	var ch_menu = document.getElementById(ctrl_mid);
	if(ch_menu.style.height == "0px"){
		$("#" + ctrl_mid).removeClass("dpn");
		$("#" + ctrl_mid).addClass("dpb");
		$(obj).children("i").replaceWith('<i class="fa fa-angle-down" aria-hidden="true">');
		setTimeout(function(){
		ch_menu.style.height = 'calc(' + parseInt(num)*2 + 'px' + ' + ' + parseInt(num)*2.5 + "rem" + ')';
    },0);
	}else{
		setTimeout(function(){
		$("#" + ctrl_mid).addClass("dpn");
		},300);
		$(obj).children("i").replaceWith('<i class="fa fa-angle-right" aria-hidden="true">');
		$("#" + ctrl_mid).removeClass("dpb");
		ch_menu.style.height = "0px";
	}
}

// 视频播放切换
$(".play").on('click',function(){
	var spurl = $(this).attr('data-url');
	$("#dplayer").attr("play-url",spurl);
	sw();
}) 



































