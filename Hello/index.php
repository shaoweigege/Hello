<?php
/**
 * 一个黑色透明风格主题
 * 
 * @package hello
 * @author 南玖
 * @version 1.0
 * @link https://ztongyang.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $lazyimg = $this->options->themeUrl.'/img/loading.gif';
 $this->need('header.php');
 ?>
 		<div id="m-cover-box">
			<div class="flexslider wh-100">
		        <ul class="slides wh-100">
		            <?php if(!empty($this->options->banner) && $this->options->banner_ctrl == "On"){
			            	$banner_cids = $this->options->banner;
			            	$cid_arr = explode(',',$banner_cids);
			            	$length = count($cid_arr);
			            	for($i=0;$i<$length;$i++){
			            		$this->widget('Widget_Archive@banner'.$i, 'pageSize=1&type=post', 'cid='.$cid_arr[$i])->to($banner);
			            		$img = showCover($banner);
			            		$title = $banner->title;
			            		$url = $banner->permalink;
			            		echo '<li><a href="'.$url.'"><img src="'.$img.'"></a><span class="vcenter">'.$title.'</span></li>';}
		            	}else{echo '<li><img src="'.$this->options->coverimg.'"><span class="vcenter">'.$this->options->subtitle.'</span></li>';};?>
		        </ul>
		    </div>
			<script>$(function() {$(".flexslider").flexslider({animation: "fade", slideshow: true, slideshowSpeed: 7000, animationDuration: 600, touch: true,directionNav: true, });});</script>
		</div>
<div class="flex-left">
    <div class="top">
    <?php if (!($this->options->typed_text == '')): ?>
	<div class="description center-align">
		 <span class="typed-text"><?php $this->options->typed_text(); ?></span>
		 <span class="typed-cursor"><i style="color: #1689db;" class="fa fa-hand-o-up" aria-hidden="true"></i></span>&nbsp;&nbsp;<span id="typed"></span>&nbsp;&nbsp;<span class="typed-cursor"><i style="color: #1689db;" class="fa fa-hand-o-up" aria-hidden="true"></i></span>
	</div></div>
	<div class="content">
		<div id="cover-box">
			<div class="flexslider wh-100">
		        <ul class="slides wh-100">
		            <?php if(!empty($this->options->banner) && $this->options->banner_ctrl == "On"){
			            	$banner_cids = $this->options->banner;
			            	$cid_arr = explode(',',$banner_cids);
			            	$length = count($cid_arr);
			            	for($i=0;$i<$length;$i++){
			            		$this->widget('Widget_Archive@banner'.$i, 'pageSize=1&type=post', 'cid='.$cid_arr[$i])->to($banner);
			            		$img = showCover($banner);
			            		$title = $banner->title;
			            		$url = $banner->permalink;
			            		echo '<li><a href="'.$url.'"><img src="'.$img.'"></a><span class="vcenter">'.$title.'</span></li>';}
		            	}else{echo '<li><img src="'.$this->options->coverimg.'"><span class="vcenter">'.$this->options->subtitle.'</span></li>';};?>
		        </ul>
		    </div>
			<script>$(function() {$(".flexslider").flexslider({animation: "fade", slideshow: true, slideshowSpeed: 7000, animationDuration: 600, touch: true,directionNav: true, });});</script>
		</div>
	
		<div class="title"><div class="strong"><i class="line-lf"></i><b class="block-lf"></b><div>推荐文章</div><b class="block-rt"></b><i class="line-rt"></i></div></div>
		<div class="topbox">
		<?php if(!empty($this->options->roof)): ?>
		<?php $roof = $this->options->roof;$roof_array = explode(",", $roof);?>
		<?php else: ?>
		<?php $roof_array = getRoofcid(2); ?>
		<?php endif; ?>
		<?php
		$number=count($roog_array);
		$length = count($roof_array);
		for($i=0;$i<$length;$i++){
		?>
		<?php $this->widget('Widget_Archive@roof'.$i, 'pageSize=1&type=post', 'cid='.$roof_array[$i])->to($article); ?>
		<div class="recimg">
			<a href="<?php $article->permalink(); ?>">
			<div class="cuo">
				<div class="roof">
				    <?php if($this->options->lazyload == 'Yes'):?>
    					<img data-original="<?php echo showCover($article); ?>" src="<?php echo $lazyimg; ?>" alt="">
    				<?php else: ?>
                        <img src="<?php echo showCover($article); ?>" alt="">
                    <?php endif; ?>
					<span class="roof-title"><?php $article->title(); ?></span>
				</div>
			</div>
			<div class="dibu">
				<div class="summary">
					<?php if(showSummary($article)[0] == 0): ?>
					<span><?php $article->description(); ?></span>
					<?php else: ?><?php $summary = showSummary($article)[1]; ?>
					<span><?php echo $summary; ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class = roof-time><span><?php $article->date(); ?></span></div>
			<i class="triangle"><b></b></i>
			</a>			
		</div>
		
		<div class="m_recimg">
			<a class="wh-100" href="<?php $article->permalink(); ?>" >
			     <?php if($this->options->lazyload == 'Yes'):?>
					<img class="wh-100" data-original="<?php echo showCover($article); ?>" src="<?php echo $lazyimg; ?>" />
				<?php else: ?>
                    <img class="wh-100" src="<?php echo showCover($article); ?>" />
                <?php endif; ?>
			    
			    <i class="mask"></i><div class="m_title"><span class="m_badge">推荐</span><?php $article->title(); ?></div></a>
		</div><?php } ?>
		</div>

		
		
		
		<div class="title"><div class="strong"><i class="line-lf"></i><b class="block-lf"></b><div>最新动态</div><b class="block-rt"></b><i class="line-rt"></i></div></div>
		<div class="recent">
			<?php $this->widget('Widget_Contents_Post_Recent','pageSize=10')->to($recent);
			$lazyimg = $this->options->themeUrl.'/img/loading.gif';
			if($recent->have()):
			while($recent->next()):?>
			<?php $img = showCover($recent);
			if(showSummary($recent)[0] == 0){$summary = $recent->description;
			}else{$summary = showSummary($recent)[1];}?>
			<div class="post_card">
				<div class="recent-left">
					<a class="recent-content" href="<?php $recent->permalink();?>" />
					    <?php if($this->options->lazyload == 'Yes'):?>
					    <div class="recent-cover"><img data-original="<?php echo $img; ?>" src=<?php echo $lazyimg; ?>> alt="<?php $recent->title();?>"></div>
					    <?php else: ?>
						<div class="recent-cover"><img src="<?php echo $img; ?>" alt="<?php $recent->title();?>"></div>
						<?php endif; ?>
					</a>					
				</div>
				<div class="recent-right">
					<a href="<?php $recent->permalink();?>" />
						<div class="recent-label"><i class="fa fa-file-text" aria-hidden="true"></i><span><?php echo $recent->categories[0][name]; ?></span></div>
						<div class="recent-title"><span><?php $recent->title();?></span></div>
						<div class="recent-desc"><span><?php echo $summary; ?></span></div>
					</a>
					<div class="post-detail">
						<span datetime="<?php $recent->date(); ?>"><i class="fa fa-clock-o">&nbsp;</i><i><?php $recent->date(); ?></i></span>
						<span><i class="fa fa-user fs-16"></i>&nbsp;<i><?php $this->options->cusTitle(); ?></i></span>
						<span><i class="fa fa-eye fs-16"></i>&nbsp;<i><?php get_post_view($recent); ?></i></span>
						<span><i class="fa fa-commenting"></i>&nbsp;<i><?php $recent->commentsNum(); ?></i></span>
					</div>
				</div>
			</div>
			<div class="m_post_card">
				<div class="index-card">
					<div class="block-image">
						<a class="bor" href="<?php $recent->permalink();?>" title="<?php $recent->title();?>" >
						    <?php if($this->options->lazyload == 'Yes'): ?>
						    <img class="wh-100" data-original="<?php echo $img; ?>" src="<?php echo $lazyimg; ?>"/>
						    <?php else: ?>
						    <img class="wh-100" src="<?php echo $img; ?>">
						    <?php endif; ?>
						</a>
					</div>
					<div class="r-layout">
					<div class="entry-header">
						<a href="<?php $recent->permalink();?>"><span class="h-2x"><span class="m_badge "><?php echo $recent->categories[0][name]; ?></span><?php $recent->title();?></span></a>
					</div>
					<div class="cbottom">
						<span datetime="<?php $recent->date(); ?>"><i class="fa fa-clock-o">&nbsp;</i><i><?php $recent->date(); ?></i></span>
						<span><i class="fa fa-eye fs-16"></i>&nbsp;<i><?php get_post_view($recent); ?></i></span>
						<span><i class="fa fa-commenting"></i>&nbsp;<i><?php $recent->commentsNum(); ?></i></span>
					</div>
					</div>
				</div>
			</div>
			<?php endwhile; endif;?>

		</div>
	</div>
	
</div>
<script src="<?php $this->options->themeUrl('assets/js/typed.js'); ?>"></script>
<script>var typed_text=$(".typed-text").text();typed_array=typed_text.split("\n");var typed=new Typed("#typed",{strings:typed_array,startDelay:300,typeSpeed:250,loop:true,backSpeed:100,directionNav:false,showCursor:false});</script>
<?php endif; ?>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
