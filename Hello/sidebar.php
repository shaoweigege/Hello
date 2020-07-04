<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
<div class="flex-right">
	<div class="top-right">
		<div class="mainsearch">
			<div class="form-group">
	            <form id="search" class="wt-100" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
	            	<div class="form-wrapper"><i class="fa fa-search" aria-hidden="true"></i></div>
	                <input type="text" id="s" name="s" class="text" placeholder="<?php _e('请输入关键词并回车...'); ?>" />
	            </form>
            </div>
		</div>
	</div>
	    <div class="card-widget">
		<div class="card-title"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;&nbsp;关于博主</div>
		<div class="card>">
			<div class="card-info-avatar">
				<span class="QQqr"><?php $this->options->QQqrcode(); ?></span>
				<span class="wechatqr"><?php $this->options->wechatqrcode(); ?></span>
				<span class="avatar"><?php $this->options->avatar(); ?></span>
				<a id="logoUrl" href="<?php $this->options->siteUrl(); ?>">
					<?php if (!empty($this->options->avatar)): ?>
					<img id="avatar-img" src="<?php $this->options->avatar() ?>" alt="avatar">
					<?php else: ?>
					<img id="avatar-img" src="http://metu.ztongyang.cn/a/no-avatar.png" alt="avatar">
					<?php endif; ?>
				</a>				
			</div>
			<p class="author-info__name"><?php $this->options->cusTitle(); ?></p>
			<p class="center"><?php $this->options->subtitle(); ?></p>
			<div class="social">
				<div class="qq" id="qq"><i class="fa fa-qq" aria-hidden="true"></i></div>
				<div class="weixin" id="weixin" ><i class="fa fa-weixin" aria-hidden="true"></i></div>
				<div class="github" ><a class="tweibo-a" href="<?php $this->options->github(); ?>" target="_blank"><i style="color:#eee" class="fa fa-github" aria-hidden="true"></i></a></div>
				<!--<div class="rss"><a class="email-a" href="<?php $this->options->feedUrl(); ?>" target="_blank"><i class="fa fa-feed" aria-hidden="true"></i></a></div>	-->
				<div class="login"><a class="login" href="<?php $this->options->adminUrl(); ?>" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i></a></div>

			</div>
		</div>
	</div>
	
	<div class="card-widget">
		<div class="card-title"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;&nbsp;网站咨询</div>
		<div class="card-ul">
			<ul>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;当前在线<span class="badge"><?php get_number(); ?></span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;加载耗时<span class="badge"><?php timer_stop();?></span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;文章数目<span class="badge"><?php $stat->publishedPostsNum() ?>篇</span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;分类总数<span class="badge"><?php $stat->categoriesNum() ?>个</span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;评论总数<span class="badge"><?php $stat->publishedCommentsNum() ?>条</span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;站点字数<span class="badge"><?php allOfCharacters(); ?></span></li>
				<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;运行时间<span class="badge"><?php echo getBuildTime()[1]; ?></span></li>

			</ul>
		</div>
	</div>
	
	<div class="card-widget">
		<div class="card-title"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;&nbsp;我的资源</div>
		<div class="card-ul-1">
			<ul>
	    		<a href="http://zty.cqyes.cn/" target="_blank">
	    		<li class="source-list hover-color" ><i class="fa  fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;<span class="source">南玖业务网</span></li></a>	
	    		<a href="https://cloud.ztongyang.cn/cindex.html" target="_blank">
	    		<li class="source-list hover-color" ><i class="fa  fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;<span class="source">南玖云盘</span></li></a>
	    		<a href="http://ztyang.tzdsb.com/" target="_blank">
	    		<li class="source-list hover-color" ><i class="fa  fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;<span class="source">南玖代刷网</span></li></a>
	    		<li class="parse-video source-list hover-color" style="cursor: pointer;"><i class="fa  fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;<span class="source">南玖解析</span></li>
	    		
			</ul>
		</div>
	</div>
	
	
		<div class="card-widget">
		<div class="card-title"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;热门文章</div>
		<div class="card-ul">
			<ul>
				<?php $this->widget('Widget_Post_hot@hot', 'pageSize=6')->to($hot); ?>
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
		<div class="card-title"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;近期评论</div>
		<div class="card-ul">
			<ul>
				<?php $this->widget('Widget_Comments_Recent','pageSize=10&ignoreAuthor=true')->to($comments); ?>
				<?php if($comments->have()): ?>
					<?php while($comments->next()): ?>
				    <li class="ncomments"><a class="h-2x" href="<?php $comments->permalink(); ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp;<span><?php $comments->author(false); ?></span>&nbsp;:<span class="new-comments"><?php $comments->excerpt(); ?></span></a>
				    </li><?php endwhile; ?><?php else: ?>	<li>暂无评论</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<!--<div class="card-widget">-->
	<!--	<div class="card-title"><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;&nbsp;分类详情</div>-->
	<!--	<div class="card-ul">-->
	<!--		<ul>-->
	<!--			<?php $obj = $this->widget('Widget_Metas_Category_List'); ?>-->
	<!--			<?php if($obj->have()): ?>-->
 <!--   			<?php while($obj->next()) : ?>-->
 <!--   			<?php if(count($obj->children) == 0): ?>-->
	<!--    		<a href="<?php $obj->permalink(); ?>">-->
	<!--    		<li class="hover-color" ><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php $obj->name(); ?><span class="badge1"><?php $obj->levels(); ?></span></li></a>-->
	<!--        	<?php endif; ?>-->
 <!--       		<?php endwhile; ?>-->
	<!--			<?php else: ?>-->
	<!--			<li>无分类</li>-->
	<!--			<?php endif; ?>-->
	<!--		</ul>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="card-widget">	
		<div class="card-title"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;标签云</div>
		<div class="tag">
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags);?>
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


