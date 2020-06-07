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
    
    $coverimg = new Typecho_Widget_Helper_Form_Element_Text('coverimg', NULL, 'http://metu.ztongyang.cn/meitu/7.jpg', _t('首页默认封面'), _t(''));
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
    
	$bgimg = new Typecho_Widget_Helper_Form_Element_Text('bgimg', NULL, NULL, _t('网站背景图'), _t('建议填写，留空影响美观'));
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
    
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('网站备案号'), _t('在页脚展示'));
    $form->addInput($beian);
      
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
	if(!empty($widget->fields->cover)){
		$img=$widget->fields->cover;
	}else{
		$img = 'http://metu.ztongyang.cn/meitu/7.jpg';
	}
	return $img;
}

// 文章描述
function showSummary($widget){
	$cover_arr = array();
	if(!empty($widget->fields->summary)){
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
	}
	echo $g;
}

	
/** 获取操作系统信息 */
function getOs($agent)
{
    $os = false;
 
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = '<i class="mdi mdi-windows-classic"></i> WindowsVista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Windows7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Windows8';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Windows8.1';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $os = '<i class="mdi mdi-windows-classic"></i> WindowsXP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $os = '<i class="mdi mdi-windows"></i> Windows10';
        } else{
            $os = '<i class="mdi mdi-windows"></i> Windows';
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





