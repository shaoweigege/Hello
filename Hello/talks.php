<?php 
/**
 * 说说
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');?>
<link href="https://cdn.bootcss.com/dplayer/1.25.0/DPlayer.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/dplayer/1.25.0/DPlayer.min.js"></script>
<script src="https://cdn.bootcss.com/hls.js/0.12.4/hls.min.js"></script>
<div class="flex-left">	
<!--<div class="page" id="main" role="main">-->
<?php $talks = Talk_Plugin::output_talks(0); ?>
<div class="talks" id="talks" >
	<h4 class="talk-title">说说吧</h4>
	<?php if(count($talks) > 0): ?>
	<?php foreach ($talks as $talk): ?>
	<article class="post">
		<div class="talk-info">
            <div class="talk-head">
            	<div><img alt="" src="<?php $this->options->avatar() ?>" class="avatar" height="48" width="48"></div>
        	    <div class="talk-meta">
        	    	<a class="talk-author" href="<?php $this->options->siteUrl(); ?>" rel="author"><?php $this->options->cusTitle() ?></a>
        	    	<?php if(time_diff($talk['talk_created']) > 90){$talk_time = $talk['talk_created'];}else{$talk_time = timesince(strtotime($talk['talk_created']));}?><time itemprop="datePublished" title="<?php echo $talk['talk_created']?>"><?php echo $talk_time;?></time>
            	</div>
            </div>
            <div class="talk-content">
	            <?php $talk_content = $talk['talk_text'];$talk_arr = explode("\n",$talk_content)?>
	           	<?php foreach ($talk_arr as $talk_str): ?><p><?php echo $talk_str;?></p><?php endforeach; ?>
			</div>
			<?php if($talk['sort'] == 'image'):?>
			<div class="talk-img-box">
				<div class="talk-img">
				<?php $imgs = array_filter(explode("$",$talk['talk_media']));
					$img_num = count($imgs); if($img_num == 1){$width = "100%";$height = "250px";}elseif($img_num == 2){$width = "50%";$height = "260px";}else{$width = "33.33%";$height = "260px";}?>
				<?php foreach ($imgs as $img): ?>
					<div class="img-ctrl"  style="width:<?php echo $width; ?>;" ><img class="wt-100"src="<?php echo $img; ?>"/></div>
				<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if($talk['sort'] == 'video'):?>
			<div class="talk-video-box">
				<div class="talk-video">
				<?php $str = str_replace(array("\r\n", "\r", "\n"), "", $talk['talk_media']);$video = array_filter(explode("$",$str));?>
				<div id="dplayer" class="video-ctrl" ></div>
				<script>
					const dp = new DPlayer({
					    container: document.getElementById('dplayer'),
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
	<?php else: ?>
		<article class="post"><div class="talk-info"><div class="post-content"><p><?php echo $talks; ?></p></div></div></article>
	<?php endif;?>
</div>
<!--</div>-->
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
