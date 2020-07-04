<?php 
/**
 * 说说
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');?>
  <link class="dplayer-css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
  <!--<script src="https://cdn.jsdelivr.net/npm/flv.js/dist/flv.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/hls.js/dist/hls.min.js"></script>
  <script src="https://cdn.ztongyang.cn/DPlayer.min.js"></script>
<div class="flex-left">	
<?php $talks = Talk_Plugin::output_talks(0); ?>
<?php  $lazyimg = $this->options->themeUrl.'/img/loading.gif'; ?>
<div class="talks" id="talks" >
	<!--<h4 class="talk-title">说说吧</h4>-->
	<?php if(count($talks) > 0): ?>
	<?php foreach ($talks as $talk): ?>
	<article class="post">
		<div><div class="talk-info">
            <div class="talk-head">
            	<div><img alt="" src="<?php $this->options->avatar() ?>" class="avatar" height="48" width="48"></div>
        	    <div class="talk-meta">
        	    	<a class="talk-author" href="<?php $this->options->siteUrl(); ?>" rel="author"><?php $this->options->cusTitle() ?></a>
        	    	<?php if(time_diff($talk['talk_created']) > 90){$talk_time = $talk['talk_created'];}else{$talk_time = timesince(strtotime($talk['talk_created']));}?><time itemprop="datePublished" title="<?php echo $talk['talk_created']?>"><?php echo $talk_time;?></time>
            	</div>
            </div>
            <?php if($this->user->hasLogin()): ?>
            <?php $update_url = $this->options->adminUrl.'extending.php?panel=Talk%2Fmanage-talk.php&talk_id='.$talk['talk_id'];if(strpos($this->permalink, 'index.php') == true){$delete_url = $this->options->siteUrl.'index.php/action/talk-edit?do=front_delete&talk_id='.$talk['talk_id'];}else{$delete_url = $this->options->siteUrl.'action/talk-edit?do=front_delete&talk_id='.$talk['talk_id'];}?>
            <div class="front_talk"><div class="talk_icon"><a href="<?php echo $this->options->adminUrl.'extending.php?panel=Talk%2Fmanage-talk.php&talk_id='.$talk['talk_id']; ?>" title="编辑该说说"><i class="fa fa-pencil-square" aria-hidden="true"></i></a><a href="<?php echo $delete_url ?>" title="删除该说说" onclick="javascript:return talk_del()"><i class="fa fa-trash" aria-hidden="true"></i></a></div></div><script>function talk_del() {var msg = "您真的确定要删除这条说说吗？";if (confirm(msg)==true){return true;}else{return false;}}</script>
            <?php endif; ?></div>
            <div class="talk-content">
	            <?php $talk_content = $talk['talk_text'];$talk_arr = explode("\n",$talk_content)?>
	           	<?php foreach ($talk_arr as $talk_str): ?><p><?php echo $talk_str;?></p><?php endforeach; ?>
			</div>
			<?php if($talk['sort'] == 'image'):?>
			<div class="talk-img-box">
				<?php $imgs=array_filter(explode("$",$talk['talk_media']));
					$img_num=count($imgs); if($img_num==1){$class="talk-img-1";}elseif($img_num==2){$class="talk-img-2";}else{$class="talk-img-3 h-equal";}?>
				<?php foreach ($imgs as $img): ?>
				    <?php if($this->options->lazyload == 'Yes'):?>
						<a class="<?php echo $class ?>" href="<?php echo $img; ?>" data-fancybox="gallery" ><img class="talk-img" data-original="<?php echo $img; ?>" src="<?php echo $lazyimg; ?>" /></a>
					<?php else: ?>
	                    <a href="<?php echo $img; ?>" data-fancybox="gallery" ><img class="<?php echo $class ?>" src="<?php echo $img; ?>"/></a>
	                <?php endif; ?>				
				
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php if($talk['sort'] == 'video'):?>
			<div class="talk-video-box">
				<div class="talk-video">
				<?php $str = str_replace(array("\r\n", "\r", "\n"), "", $talk['talk_media']);$video = array_filter(explode("$",$str));?>
				<div id="dp" class="video-ctrl" ></div>
				<script>
					const dp = new DPlayer({
					    container: document.getElementById('dp'),
					    video: {
					        url: "<?php echo $video[1]; ?>",
					        pic: "",
					    },
					});
			</script>
			<?php endif; ?>

        </div>
	</article>
	<?php endforeach; ?>
	<?php endif;?>
</div>
</div>
<script>
	$(".h-equal").css("height",$(".h-equal").css("width"));
</script>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
