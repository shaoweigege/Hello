<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
<div class="flex-right">
	<div class="top-right"></div>
	<div class="card-widget">
		<div class="card-title"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&nbsp;<?php $this->title() ?></div>
		<div class="card>">
			<div class="v-cover" style="background-image: url('<?php echo showCover($this); ?>');"></div>
			<div class="v-list-box">
				<div class="card-ul scroll_wrap">
					<ul class="v-list">
					    <?php $txt = $this->fields->videos;$video_arr = explode("\r\n", $txt);?>
					    <?php foreach ($video_arr as $video): ?>
					    <li><span class="button play" data-url="<?php echo(explode("$", $video)[1]); ?>"><?php echo(explode("$", $video)[0]); ?></span></li>
					    <?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>

		<div class="card-widget">
		<div class="card-title"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;近期视频</div>
		<div class="card-ul">
			<ul>
				<?php $this->widget('Widget_Archive@index', 'pageSize=6&type=category', 'mid=109')->to($hot); ?>
				<?php if($hot->have()): ?>
				<?php while($hot->next()): ?>
					<li class="shot">
						<div class="hot">
							<a class="wh-100" href="<?php $hot->permalink();?>" style="background-image: url('<?php echo showCover($hot); ?>')"></a>
						</div>
						<div class="hot-content">
							<a class=" h-2x" href="#"><span class="htitle"><?php $hot->title();?></span></a>
							<div class="hot-time">
								<span><?php echo $hot->date(); ?></php></span>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	
	<div class="card-widget">	
		<div class="card-title"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;标签云</div>
		<div class="tag">
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'type=category&ignoreZeroCount=1&limit=30','mid=109')->to($tags); ?>
			<?php if($tags->have()): ?>			
			<?php while($tags->next()): ?>
			<span title="该标签下有<?php $tags->count(); ?>篇文章" class="tag-clould-color"  style="background-color:rgb(<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>)">
			    <a class="black" href="<?php $tags->permalink(); ?>" ><?php $tags->name(); ?></a>
			</span>
			<?php endwhile; ?>
			<?php else: ?>
			<span>暂无标签</span>
			<?php endif; ?>
		</div>
	</div>
</div>


