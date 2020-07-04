<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $siteicon = new Typecho_Widget_Helper_Form_Element_Text('siteicon', NULL, NULL, _t('站点favicon.ico图标地址'), _t(''));
    $form->addInput($siteicon);

    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('网站logo地址'), _t(''));
    $form->addInput($logo);

    $cusTitle = new Typecho_Widget_Helper_Form_Element_Text('cusTitle', NULL, "Hello,world", _t('站点名称'), _t(''));
    $form->addInput($cusTitle);
    
    $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('站点头像'), _t(''));
    $form->addInput($avatar);
    
    $settime = new Typecho_Widget_Helper_Form_Element_Text('settime', NULL, date("Y-m-d H:i:s",time()), _t('自定义建站时间'), _t('用于统计网站运行时间，格式：2019-07-25 22:13:04'));
    $form->addInput($settime);
    
    $coverimg = new Typecho_Widget_Helper_Form_Element_Text('coverimg', NULL, 'https://metu.ztongyang.cn/hello/212112-1551792072f791.jpg-yasuo', _t('首页默认封面'), _t(''));
    $form->addInput($coverimg);
    
    $subtitle = new Typecho_Widget_Helper_Form_Element_Text('subtitle', NULL, 'Just So So ...', _t('站点副标题'), _t(''));
    $form->addInput($subtitle);
   
    $typed_text = new Typecho_Widget_Helper_Form_Element_Textarea('typed_text', NULL, 'Never really desperate, only the lost of the soul', _t('打字效果副标题,以回车分隔'), _t(''));
    $form->addInput($typed_text);
	
	$banner_ctrl = new Typecho_Widget_Helper_Form_Element_Radio('banner_ctrl', 
    array('On' => _t('开启'),
    'Off' => _t('关闭')),'Off' 
    ,_t('是否显示首页轮播图,默认关闭，勾选表示开启,不开启则显示默认封面!'),_t(''));
    $form->addInput($banner_ctrl);
 
	$banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, _t('首页轮播图文章设置'), _t('请填写需要在首页轮播展示的文章cid,以英文逗号分隔'));
    $form->addInput($banner);
    
	$bgimg = new Typecho_Widget_Helper_Form_Element_Text('bgimg', NULL, 'http://metu.ztongyang.cn/typecho/prism.png', _t('网站背景图'), _t('建议填写，留空影响美观'));
    $form->addInput($bgimg);
    
    $wechatqrcode = new Typecho_Widget_Helper_Form_Element_Text('wechatqrcode', NULL, NULL, _t('微信二维码地址'), _t('显示在侧栏关于博主处'));
    $form->addInput($wechatqrcode);
    
    $QQqrcode = new Typecho_Widget_Helper_Form_Element_Text('QQqrcode', NULL, NULL, _t('QQ二维码地址'), _t('显示在侧栏关于博主处'));
    $form->addInput($QQqrcode);
    
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('github地址'), _t('显示在侧栏关于博主处'));
    $form->addInput($github);
    
    $roof = new Typecho_Widget_Helper_Form_Element_Text('roof', NULL, NULL, _t('推荐文章'), _t('仅限两篇，推荐格式为两个文章cid中间用英文逗号隔开如:123,456，不填则默认显示热门文章'));
    $form->addInput($roof);
    
	$sad = new Typecho_Widget_Helper_Form_Element_Radio('sad', 
    array('Yes' => _t('是'),
    'No' => _t('否')),'No' 
    ,_t('全站灰白'),_t('用于特殊节日(哀悼日等)，开启全站灰白，表以哀思'));
    $form->addInput($sad);
     
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, "天朝通行证", _t('网站备案号'), _t('在页脚展示'));
    $form->addInput($beian);
    
    $eruda = new Typecho_Widget_Helper_Form_Element_Radio('eruda', 
    array('Yes' => _t('是'),
    'No' => _t('否')),'No' 
    ,_t('是否开启移动端网页调试'),_t('打开后可实现在移动端捕获 console 日志、检查元素状态、捕获XHR请求、显示本地存储和 Cookie 信息等'));
    $form->addInput($eruda);
    
    $lazyload = new Typecho_Widget_Helper_Form_Element_Radio('lazyload', 
    array('Yes' => _t('是'),
    'No' => _t('否')),'Yes' ,_t('是否开启图片懒加载'),_t('建议开启，开启后增强用户体验，减少http的请求，减少服务器端压力'));
    $form->addInput($lazyload);
    
    
	$HLstyle = new Typecho_Widget_Helper_Form_Element_Radio('HLstyle', 
    array('dark' => _t('dark'),
    'okaikia' => _t('okaikia'),
    'tomorrow-night' => _t('tomorrow-night'),
    'okaikia' => _t('okaikia'),
    'twilight' => _t('twilight'),
    ),'okaikia' 
    ,_t('选择代码高亮主题风格,默认为<span style="color:#1689db">okaikia</span>'),_t(''));
    $form->addInput($HLstyle);
        
	$linenumber = new Typecho_Widget_Helper_Form_Element_Radio('linenumber', 
    array('Yes' => _t('显示'),
    'No' => _t('不显示')),'Yes' 
    ,_t('是否显示代码行号,默认显示'),_t(''));
    $form->addInput($linenumber);
 
	$tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('百度或谷歌统计代码'), _t(''));
    $form->addInput($tongji);
    


}


// 自定义关键字
if($_SERVER['SCRIPT_NAME']=="/admin/write-post.php"){
function themeFields($layout) {
	$indent = new Typecho_Widget_Helper_Form_Element_Radio('indent', 
    array('Yes' => _t('是'),
    'No' => _t('否')),'No' 
    ,_t('是否开启自动缩进'),_t('开启后文章段首自动缩进2字符'));
    $layout->addItem($indent);
    
    $cover = new Typecho_Widget_Helper_Form_Element_Text('cover', NULL, NULL, _t('封面'), _t('请填入封面图片地址,不输入则随机使用默认封面'));
    $cover->input->setAttribute('class', 'w-100');
    $layout->addItem($cover);
    
    $summary = new Typecho_Widget_Helper_Form_Element_Textarea('summary', NULL, NULL, _t('描述'), _t('此处输入文章、相册或者影视描述'));
    $summary->input->setAttribute('style', 'width:100%;height:100px;');
    $layout->addItem($summary);
  
	$keyword = new Typecho_Widget_Helper_Form_Element_Text('keyword', NULL, NULL, _t('关键词'), _t('请输入文章关键词'));
    $keyword->input->setAttribute('class', 'w-100');
    $layout->addItem($keyword);  
    
    $videos = new Typecho_Widget_Helper_Form_Element_Textarea('videos', NULL, NULL, _t('视频列表'), _t('请输入视频链接，示例：<p style="color:red;">第一集$https://xxx.mp4</p>'));
    $videos->input->setAttribute('class', 'w-100');
    $layout->addItem($videos);  
    
    
}
}




function sad(){
    ?>
<style>html{
        /*兼容FF*/
        filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
        /*兼容IE内核*/
        filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);
        /*兼容其它，谷歌之类的*/
        -webkit-filter: grayscale(1);
    }</style>
<?php
}


function charactersNum($archive) {
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $archive->text);
    return mb_strlen($text,'UTF-8');
    // return mb_strlen($archive->text,'UTF-8');
}

//全站中文字符统计
function allOfCharacters() {
        $showPrivate = intval($pluginOpts->showPrivate);
        $chars = 0;
        $db = Typecho_Db::get();
        if($showPrivate == 0){
            $select = $db ->select('text')
                        ->from('table.contents')
                        ->where('table.contents.status = ?','publish');
        } else {
            $select = $db ->select('text')
                        ->from('table.contents');
        }

        $rows = $db->fetchAll($select);
        
        foreach ($rows as $row){
        	$text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $row['text']);//过滤中文
            $chars += mb_strlen($text, 'UTF-8');
        }

        $unit = '';
        if($chars >= 10000) {
            $chars /= 10000;
            $unit = 'W';
        } else if($chars >= 1000) {
            $chars /= 1000;
            $unit = 'K';
        }
        $out = sprintf('%.2lf %s',$chars, $unit);

        echo $out;
    }

function  art_count ($cid){
$db=Typecho_Db::get ();
$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
$rel_text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
echo mb_strlen($rel_text, 'UTF-8');
}


// 统计当前在线人数,首先你要有读写文件的权限，首次访问肯不显示，正常情况刷新即可
function get_number(){
	$online_log = "slzxrs.dat"; //保存人数的文件到根目录,
	$timeout = 30;//30秒内没动作者,认为掉线
	$entries = file($online_log);
	$temp = array();
	for ($i=0;$i<count($entries);$i++){
    	$entry = explode(",",trim($entries[$i]));
    	if(($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
        	array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
    }
}
	array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间
	$slzxrs = count($temp); //计算在线人数
	$entries = implode("",$temp);
	//写入文件
	$fp = fopen($online_log,"w");
	flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些[网络]^(Network)文件系统中正常工作
	fputs($fp,$entries);
	flock($fp,LOCK_UN);
	fclose($fp);
	$tj= $slzxrs."人";
	echo $tj;
}

// 网站运行时间
date_default_timezone_set('Asia/Shanghai');
function getBuildTime(){
	$settime = Typecho_Widget::widget('Widget_Options')->settime;
	$site_create_time = strtotime($settime);
	$time = time() - $site_create_time;
	if(is_numeric($time)){
		$value = array(
		"years" => 0, "days" => 0, "hours" => 0,
		"minutes" => 0, "seconds" => 0,
	);
	if($time >= 31556926){
		$value["years"] = floor($time/31556926);
		$time = ($time%31556926);
	}
	if($time >= 86400){
		$value["days"] = floor($time/86400);
		$time = ($time%86400);
	}
	if($time >= 3600){
		$value["hours"] = floor($time/3600);
		$time = ($time%3600);
	}
	if($time >= 60){
		$value["minutes"] = floor($time/60);
		$time = ($time%60);
	}
	$value["seconds"] = floor($time);}
	$time_arr = array();
	$time1 =  '<span class="btime">'.$value['years'].'年'.$value['days'].'天'.$value['hours'].'小时'.$value['minutes'].'分'.$value['minutes'].'秒</span>';
	$time2 =  $value['days'].'天';
	array_push($time_arr,$time1,$time2);
	return $time_arr;
}
   

// 页面加载耗时
function timer_start() {
	global $timestart;
	$mtime     = explode( ' ', microtime() );
	$timestart = $mtime[1] + $mtime[0];
	return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
	global $timestart, $timeend;
	$mtime     = explode( ' ', microtime() );
	$timeend   = $mtime[1] + $mtime[0];
	$timetotal = number_format( $timeend - $timestart, $precision );
	$r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
	if ( $display ) {
		echo $r;
	}
	echo $r;
}

// 获取热门文章
function getHotComments($limit,$num){
	$db = Typecho_Db::get();
	$result = $db->fetchAll($db->select()->from('table.contents')
	->where('status = ?','publish')
	->where('type = ?', 'post')
	->where('created <= unix_timestamp(now())', 'post')
	->limit($limit)
	->order('commentsNum', Typecho_Db::SORT_DESC)
);
	if($result){
		$val = $result[$num];
		$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
		$post_title = htmlspecialchars($val['title']);
		$permalink = $val['permalink'];
		echo '<li><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
}}

// 获取热门文章cid
function getRoofcid($num){
	$db = Typecho_Db::get();
	$result = $db->fetchAll($db->select()->from('table.contents')
	->where('status = ?','publish')
	->where('type = ?', 'post')
	->where('created <= unix_timestamp(now())', 'post')
	->limit($num)
	->order('commentsNum', Typecho_Db::SORT_DESC)
);	
	$cid_array = array();
	if($result){
		$lenth = count($result);
		for($i=0;$i<$lenth;$i++){
		$val = $result[$i];
		$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
		$cid = $val['cid'];
		array_push($cid_array,$cid);
		}
		return $cid_array;
}}

// 热门文章
class Widget_Post_hot extends Widget_Abstract_Contents
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    public function execute()
    {
        $select  = $this->select()->from('table.contents')
->where("table.contents.password IS NULL OR table.contents.password = ''")
->where('table.contents.status = ?','publish')
->where('table.contents.created <= ?', time())
->where('table.contents.type = ?', 'post')
->limit($this->parameter->pageSize)
->order('table.contents.views', Typecho_Db::SORT_DESC);
 $this->db->fetchAll($select, array($this, 'push'));
    }
}

// 文章封面
function showCover($widget){
	if(($widget->fields->cover)){
		$img=$widget->fields->cover;
	}else{
		$img = 'https://metu.ztongyang.cn/hello/212112-1551792072f791.jpg';
	}
	return $img;
}

// 文章描述
function showSummary($widget){
	$cover_arr = array();
	if(($widget->fields->summary)){
		$summary=$widget->fields->summary;
		$tem = 1;
		array_push($cover_arr,$tem,$summary);
		return $cover_arr;
	}else{
		$tem = 0;
		array_push($cover_arr,$tem);
		return $cover_arr;
	}
}

// 文章阅读数
function get_post_view($archive,$r=0)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
       if($r==0){ echo 1;}
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
if($r==0){
    echo $row['views'];
}
}
// 多少天前
function timesince($older_date,$comment_date = false) {
if($older_date=="no"){return;}
$chunks = array(
array(86400 , ' 天'),
array(3600 , ' 小时'),
array(60 , ' 分'),
array(1 , ' 秒'),
);
$newer_date = time();
$since = abs($newer_date - $older_date);

for ($i = 0, $j = count($chunks); $i < $j; $i++){
$seconds = $chunks[$i][0];
$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0) break;
}
$output = $count.$name.'前';

return $output;
}

// 计算时间差
function time_diff($start){
	$datetime_start = new DateTime($start);
	$datetime_end = new DateTime(date("Y-m-d",time()));
	$days = $datetime_start->diff($datetime_end)->days;
	return $days;
}


function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ?', $coid));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
if($arow['author']){ $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
}else { echo '';}
    } else {
        echo '';
    }
}


// 头像
function tx($mail,$id=0){
	$a=Typecho_Widget::widget('Widget_Options')->gravatars;
	$b='https://gravatar.loli.net/avatar'.$a.'/';
	$c=strtolower($mail);
	$d=md5($c);
	$f=str_replace('@qq.com','',$c);
	if(strstr($c,"qq.com")&&is_numeric($f)&&strlen($f)<11&&strlen($f)>4){
		$g='//q.qlogo.cn/g?b=qq&nk='.$f.'&s=100';
	}else{
		$g=$b.$d.'?d=mm';
        // $g=getrdqq(10);
	}
	echo $g;
}

// 随机QQ生成
function getrdqq($num){
	$qq="";
	for($i=0;$i<$num;$i++){
		$qq.=strval(rand(0, 9));
	}
	$radavatar = 'http://q.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
	return $radavatar;
}	




	
/** 获取操作系统信息 */
function getOs($agent)
{
    $os = false;
 
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = '<i class="mdi mdi-windows-classic"></i> WindowsVista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Win7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Win8';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Win8.1';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $os = '<i class="mdi mdi-windows-classic"></i> WinXP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Win10';
        } else{
            $os = '<i class="mdi mdi-windows"></i> Win';
        }
    } else if (preg_match('/android/i', $agent)) {
if (preg_match('/android 10/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓 10';
    }
if (preg_match('/android 9/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓派';
    }
else if (preg_match('/android 8/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓奥利奥';
    }
else if (preg_match('/android 7/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓牛轧糖';
    }
else if (preg_match('/android 6/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓棉花糖';
    }
else if (preg_match('/android 5/i', $agent)) {
        $os = '<i class="mdi mdi-android"></i> 安卓棒棒糖';
    }
else{
        $os = '<i class="mdi mdi-android"></i> 安卓';
}
    }
 else if (preg_match('/ubuntu/i', $agent)) {
        $os = '<i class="mdi mdi-ubuntu"></i> 乌班图';
    } else if (preg_match('/linux/i', $agent)) {
        $os = '<i class="mdi mdi-linux"></i> Linux';
    } else if (preg_match('/iPhone/i', $agent)) {
        $os = '<i class="mdi mdi-cellphone-iphone"></i> Ios';
    } else if (preg_match('/iPad/i', $agent)) {
        $os = '<i class="mdi mdi-tablet-ipad"></i> IpadOS';
    } else if (preg_match('/mac/i', $agent)) {
        $os = '<i class="mdi mdi-desktop-mac"></i> MacOS';
    }else if (preg_match('/cros/i', $agent)) {
        $os = '<i class="mdi mdi-google-chrome"></i> ChromeOS';
    }else if (preg_match('/BlackBerry/i', $agent)) {
        $os = '<i class="mdi mdi-blackberry"></i> 黑莓';
    }else {
 return false;
    }
   return $os;
}


// 统计相册照片数量
function CountImg($obj) {
    // $txt = $obj->fields->gallery; 
    $string_imgs = explode("$", $obj);
    $imgs = count($string_imgs) -1;
    return $imgs;
}

//表情解析
function parsePaopaoBiaoqingCallback($match){
        return '<img class="biaoqing" src="/usr/themes/Hello/assets/OwO/owo/paopao/'. str_replace('%', '', urlencode($match[1])) . '_2x.png">';
    }
function parseAruBiaoqingCallback($match){
        return '<img class="biaoqing" src="/usr/themes/Hello/assets/OwO/owo/aru/'. str_replace('%', '', urlencode($match[1])) . '_2x.png">';
    }
function parseBiaoQing($content){
        $content = preg_replace_callback('/\:\:\(\s*(呵呵|哈哈|吐舌|太开心|笑眼|花心|小乖|乖|捂嘴笑|滑稽|你懂的|不高兴|怒|汗|黑线|泪|真棒|喷|惊哭|阴险|鄙视|酷|啊|狂汗|what|疑问|酸爽|呀咩爹|委屈|惊讶|睡觉|笑尿|挖鼻|吐|犀利|小红脸|懒得理|勉强|爱心|心碎|玫瑰|礼物|彩虹|太阳|星星月亮|钱币|茶杯|蛋糕|大拇指|胜利|haha|OK|沙发|手纸|香蕉|便便|药丸|红领巾|蜡烛|音乐|灯泡|开心|钱|咦|呼|冷|生气|弱|吐血)\s*\)/is',
'parsePaopaoBiaoqingCallback', $content);
        $content = preg_replace_callback('/\:\@\(\s*(高兴|小怒|脸红|内伤|装大款|赞一个|害羞|汗|吐血倒地|深思|不高兴|无语|亲亲|口水|尴尬|中指|想一想|哭泣|便便|献花|皱眉|傻笑|狂汗|吐|喷水|看不见|鼓掌|阴暗|长草|献黄瓜|邪恶|期待|得意|吐舌|喷血|无所谓|观察|暗地观察|肿包|中枪|大囧|呲牙|抠鼻|不说话|咽气|欢呼|锁眉|蜡烛|坐等|击掌|惊喜|喜极而泣|抽烟|不出所料|愤怒|无奈|黑线|投降|看热闹|扇耳光|小眼睛|中刀)\s*\)/is',
'parseAruBiaoqingCallback', $content);
        return $content;
    }

// 文章目录
function createCatalog($obj) {    //为文章标题添加锚点
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count ++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h'.$obj[1].$obj[2].'><a class="topmao" name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
    }, $obj);
    return $obj;
}

function getCatalog() {    //输出文章目录容器
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<ul class="toc-height">'."\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>'."\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul>'."\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i=0; $i<$to_depth2; $i++) {
                            $index .= '</li>'."\n".'</ul>'."\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li class="toc-ctrl"><a href="#cl-'.$catalog_item['count'].'">'.$catalog_item['text'].'</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i=0; $i<=$to_depth; $i++) {
            $index .= '</li>'."\n".'</ul>'."\n";
        }
    $index = '<div id="toc-container">'."\n".'<div id="toc">'."\n"."\n".$index.'</div>'."\n".'</div>'."\n";
    }
    echo $index;
}
function themeInit($archive) {
    if ($archive->is('single')) {
        $archive->content = createCatalog($archive->content);
    }
}

// 发布文章数统计
function echart_data($data_arr) {
$data_arr = array_reverse($data_arr);
$sarr=array();
for($i=0;$i<count($data_arr);$i++){
    $found = 0;
    foreach((array)$sarr as $k=>$v){
        if($data_arr[$i] == $v['key']){
            $sarr[$k]['count'] += 1;
            $found = 1;
            continue;
        }
    }
    if(!$found){
        $sarr[] = array('key'=>$data_arr[$i],'count'=>1);
    }
}
$date = '[';
$num = '[';
foreach ($sarr as $s){
    $date .= "'".$s['key']."'".',';
    $num .= $s['count'].',';
}
$date = substr($date,0,strlen($date)-1).']';
$num = substr($num,0,strlen($num)-1).']';
$earry = array();
array_push($earry,$date,$num);
return $earry;
}

// 随机颜色生成
function SuijiColor($num,$range1,$range2){
    $color = '';
    for($i=0;$i<$num;$i++){
        $color .= '"rgb('.rand($range1,$range2).','.rand($range1,$range2).','.rand($range1,$range2).')",';
    }
    $color = '['.substr($color,0,strlen($date)-1).']';
    echo $color;
}

// 排序函数
function quickSort($arr) {
    $count = count($arr);
    for ($i=1;$i<$count;$i++) {
            $tmp = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $tmp[1] > $arr[$j][1]) {
                    $arr[$j+1] = $arr[$j--];
            }
            $arr[$j+1] = $tmp;
    }
    return $arr;
}





