  <link class="dplayer-css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
  <!--<script src="https://cdn.jsdelivr.net/npm/flv.js/dist/flv.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/hls.js/dist/hls.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.js"></script>

<div class="flex-left" id="main" role="main">

<?php $txt = $this->fields->videos;$video_arr = explode("\r\n", $txt);?>
	<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
	    <h1 class="post-title" itemprop="name headline"><a class="in-post h-1x" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	        <ul class="post-meta post-ul" style="margin-top: 0.2rem;">
	            <li><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
	            <li><i class="fa fa-eye fs-16" aria-hidden="true"></i>&nbsp;<?php _e('浏览: '); ?><?php get_post_view($this); ?></li>
	            <li><i class="fa fa-commenting" aria-hidden="true">&nbsp;</i> <?php _e('评论: '); ?><?php $this->commentsNum(); ?></li>
	            <?php foreach ($this->tags as $tag): ?>
	    <span class="post-tags tag-clould-color"  style="color:#000;background-color:rgb(<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>)"><?php echo $tag['name']; ?></span>
	    <?php endforeach;?>
	        </ul>
	        
	    
		<div id="dplayer" play-url="<?php echo explode('$',$video_arr[0])[1]; ?>"></div>
		<script>
			const dp = new DPlayer({
				container: document.getElementById('dplayer'),
				preload: 'auto',
				screenshot: true, //截屏
				hotkey: true,
				logo: 'http://metu.ztongyang.cn/b/logo-1.png',
				playbackSpeed: [0.5, 0.75, 1, 1.25, 1.5,2],
				autoplay: true,
				video: {
					url: $("#dplayer").attr('play-url'),
					pic: "",
					type: 'auto',
				},
				});
				function sw(){
					dp.switchVideo({
    				url: $("#dplayer").attr('play-url'),
    				pic: "",
			})
		}

			</script>
    </article>

<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
	    <h1 class="post-title">视频简介</h1>
	    <?php if(showSummary($this)[0] == 0){$summary = $this->description;}else{$summary = showSummary($this)[1];}?>
	    <div class="v-summary"><?php if($this->category == 'gallery'){echo showSummary($this)[1];}else{echo $summary;} ?></div>

	    
	    
</article>

    <?php $this->need('comments.php'); ?>


</div>

<?php $this->need('video_sidebar.php'); ?>
<?php $this->need('footer.php'); ?>

