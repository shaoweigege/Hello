<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<!--自定义不同分类文章样式-->
<?php if($this->category == "gallery"): ?><?php $this->need('post_style/gallery.php'); ?>
<?php elseif($this->category == "videos"): ?><?php $this->need('post_style/videos.php'); ?>
<?php else: ?>
<div id="im-cover-box">
			<div class="flexslider wh-100">
		        <ul class="slides wh-100">
		        <ul class="slides wh-100"><li><img src="<?php echo showCover($this); ?>" ><span class="vcenter"><?php $this->title(); ?></span></li></ul>
		        </ul>
		    </div>
			<script>$(function() {$(".flexslider").flexslider({animation: "fade", slideshow: true, slideshowSpeed: 7000, animationDuration: 600, touch: true,directionNav: true, });});</script>
		</div>

<div class="flex-left" id="main" role="main">
<div class="top">
<?php if (!($this->options->typed_text == '')): ?>
<div class="description center-align">
    <span class="typed-text"><?php $this->options->typed_text(); ?></span>
    <span class="typed-cursor"><i style="color: #1689db;" class="fa fa-hand-o-up" aria-hidden="true"></i></span>&nbsp;&nbsp;<span id="typed"></span>&nbsp;&nbsp;<span class="typed-cursor"><i style="color: #1689db;" class="fa fa-hand-o-up" aria-hidden="true"></i></span>
</div>
<script src="<?php $this->options->themeUrl('assets/js/typed.js'); ?>"></script>
<script>var typed_text=$(".typed-text").text();typed_array=typed_text.split("\n");var typed=new Typed("#typed",{strings:typed_array,startDelay:300,typeSpeed:100,loop:true,backSpeed:50,showCursor:true});</script>
<?php endif; ?>
</div>
	<div id="cover-box">
			<div class="flexslider wh-100">
		        <ul class="slides wh-100"><li><img src="<?php echo showCover($this); ?>" ><span class="vcenter"><?php $this->title(); ?></span></li></ul>
		    </div>
		</div>
	
    <article class="post">
	    <h1 class="post-title" itemprop="name headline"><a class="in-post h-1x" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	    <?php foreach ($this->tags as $tag): ?>
	    <span class="post-tags head-post-tags"  style="color:#000;background-color:rgb(<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>)"><?php echo $tag['name']; ?></span>
	    <?php endforeach;?>
	        <ul class="post-meta post-ul">
	            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;<?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
	            <li><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
	            <li><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;<?php _e('分类: '); ?><?php $this->category(','); ?></li>
	            <li><i class="fa fa-file-word-o" aria-hidden="true">&nbsp;</i> <?php _e('字数: '); ?><?php echo art_count($this->cid); ?></li>
	            <li><i class="fa fa-eye fs-16" aria-hidden="true"></i>&nbsp;<?php _e('浏览: '); ?><?php get_post_view($this); ?></li>
	            <li><i class="fa fa-commenting" aria-hidden="true">&nbsp;</i> <?php _e('评论: '); ?><?php $this->commentsNum(); ?></li>
	        </ul>
	        <hr class="clearfix">
	        <div class="tem markdown-body"><?php if($this->fields->indent == 'Yes'): ?>
	        	<div class="post-content tem" itemprop="articleBody">
	        	    <?php if($this->options->lazyload == 'Yes'){
	        	    $lazyimg = $this->options->themeUrl.'/img/loading.gif';
                    $content = preg_replace('#<img([^<>]*?)src=\"([^<>]*?)\"([^<>]*?)>#', "<a href=\"\$2\" data-fancybox=\"gallery\" /><img\$1data-original=\"\$2\" src=\"".$lazyimg."\"\$3></a>", $this->content,-1);
                    echo $content;}else{
                        $this->content();
                    }
                    ?>
	        	</div>

	        	<?php else: ?><div class="post-content distem" itemprop="articleBody">
	        	<?php if($this->options->lazyload == 'Yes'){
	        	    $lazyimg = $this->options->themeUrl.'/img/loading.gif';
                    $content = preg_replace('#<img([^<>]*?)src=\"([^<>]*?)\"([^<>]*?)>#', "<a href=\"\$2\" data-fancybox=\"gallery\" ><img\$1data-original=\"\$2\" src=\"".$lazyimg."\"\$3></a>", $this->content,-1);
                    echo $content;}else{
                        $this->content();
                    }
                    ?>
                </div><?php endif; ?>
	    	</div>
    
    </article>
    <ul class="post-near">
        <li class="pre-post h-1x">上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li class="next-post h-1x">下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
    <?php $this->need('comments.php'); ?>
    
    <div id="toc-widget" class="toc-widget" style="display:none;">
    	<div class="toc-card">	
    		<div class="toc-title"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;文章目录</div>
    		<?php getCatalog(); ?>
    	</div>
    </div>
    
    
    <div id="m-toc-widget" class="m-toc rtoc">
    	<div class="toc-card">	
    		<div class="toc-title"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;文章目录</div>
    		<?php getCatalog(); ?>
    	</div>        
    </div>
<script>
// 文章TOC块实现可拖拽
$(document).ready(function(){var drafting=false;var offX,offY,mouseX,mouseY,winX,winY,x,y;$("#toc-widget").mousedown(function(event){event.stopPropagation();drafting=true});$(document).mousemove(function(event){event.stopPropagation();var e=event||window.event;mouseX=e.pageX||e.clientX+$(document).scrollLeft();mouseY=e.pageY||e.clientY+$(document).scrollTop();winX=$("#toc-widget").offset().left-$(document).scrollLeft();winY=$("#toc-widget").offset().top-$(document).scrollTop();if(drafting==false){offX=mouseX-winX;offY=mouseY-winY}x=mouseX-offX;y=mouseY-offY;$("#toc-widget").css({"left":x,"top":y})});$(document).mouseup(function(event){event.stopPropagation();drafting=false})});
</script>    
</div>



<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
<?php endif; ?>





