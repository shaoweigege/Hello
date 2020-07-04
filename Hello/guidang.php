<?php 
/**
 * 归档
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 $lazyimg = $this->options->themeUrl.'/img/loading.gif';
?> 

<div class="g-page">
    <div class="guidang">
	<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives); 
    $year=0; $mon=0; $i=3; $n=0;
	$ml = $archives->options->rootUrl;
	$output = ''; 
    while($archives->next()):   
        $y = date('Y',$archives->created);   
        $m = date('m',$archives->created);
        $d = date('d',$archives->created);
		if($y!=$year && $year>0){
		$output .= '';}	
		if($m!=$mon && $mon>0){$n=0;
		$output .= '</div></div></div></div></div>'; }
		if($y!=$year){$year=$y;$output .= '<div class="col-12"><h3 class="">'.$y.'年</h3></div>'; }
		if($m!=$mon){$mon=$m;
		if($i>0){$i--;$zt="true";$sh=" show";
		}else{$zt="false";$sh="";}
		if($sh == " show"){
			$angle = '<i class="fa fa-angle-down" aria-hidden="true">';
		}else{
			$angle = '<i class="fa fa-angle-right" aria-hidden="true">';
		}
	$output .= '<div class="col-12">
	<div class="g-card">
	<div class="card-header" id="os-'.$m.'">
	<h5 class="noborder">
		<a class="collapsed" onclick="show(this);" aria-controls="xos-'.$y.$m.'" angle = "angle-'.$y.$m.'">'.$m.'月<span id = angle-'.$y.$m.' class="angle">'.$angle.'</i></i></span></a>
		</h5>
	</div>
	<div id="xos-'.$y.$m.'" class="collapse'.$sh.'">
	<div class="g-article">
	<div class="g-flow">';}
	$time = '<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;'.date( "Y-m-d", $archives->date->timeStamp);
	$day = date( "d", $archives->date->timeStamp);
	$title = '<span style="color:#3d85d5db;display:contents;">['.$archives->categories[0][name].']&nbsp;&nbsp;</span>'.$archives->title;
	$category = $archives->categories[0][name];
	$n++; 
	if($this->options->lazyload == 'Yes'){
	    $g_img = '<img data-original="'.showCover($archives).'" src="'.$lazyimg.'" alt="'.$archives->title.'" >';
	}else{
	   	$g_img = '<img src="'.showCover($archives).'" alt="'.$archives->title.'" >';
	}
	$output .= '<div class="g-item"><div class="g-day">'.$day.'</div><div class="g-img wh-100"><div class="g-item-body wh-100"><a href="'.$archives->permalink .'">'.$g_img.'</a><div class="g-post"><a class="h-2x g-layout" href="'.$archives->permalink .'"><div class="g-content g-fly">'.$title.'</div></a><div class="g-content g-detail">'.$time.'</div></div></div></div></div>'; 
    endwhile;   
   $output .= '</div></div></div></div>';
    echo $output;  
?>  </div></div></div></div>
<?php $this->need('footer.php'); ?>