<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
<div class="m_nav">
<div id="m_side" class="l_side scroll-y" style="temp:0;">
	<div class="discoll wh-100">
				<div class="m_avatar">
					<div class="m_side_cover">
	                    <div class="m_cover_img wh-100"style="background-image:url('http://metu.ztongyang.cn/meitu/7.jpg')"></div>
                    </div>
                    <div class="m_side_body">
                    	<div class="lay">
	                    	<a href="<?php $this->options->siteUrl(); ?>">
	                    		<?php if (!empty($this->options->avatar)): ?>
								<img id="avatar-img" src="<?php $this->options->avatar() ?>" alt="avatar">
								<?php else: ?>
								<img id="avatar-img"  src="http://metu.ztongyang.cn/a/no-avatar.png" alt="avatar">
								<?php endif; ?>
	                        </a>
                    	</div>
                    	<div>
                    		<p class="m_author"><?php $this->options->cusTitle(); ?></p><p class="center"><?php $this->options->subtitle(); ?></p>
                    	</div>
                    </div>
                </div>
                <div class="m_menu">
                	
                	<nav class="m_menu_list wh-100"><div class="side-card-widget"><div class="side-card-title"><i class="fa fa-angle-double-right" aria-hidden="true"></i></i>&nbsp;&nbsp;导航</div><nav class="menu">
                 	<ul class="side_ul">
                 	<li class="list_style"><a class="whb" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
			        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
					<?php while($categorys->next()): ?>
					<?php if ($categorys->levels === 0): ?>
					<?php $children = $categorys->getAllChildren($categorys->mid); ?>
					<?php if (empty($children)): ?>
			        <li  class="list_style"><a class="whb" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->description(); ?>"><?php $categorys->name(); ?></a></li><?php else: ?>
					<li><li  class="list_style" c_mid="extend-<?php  $categorys->mid() ?>" onclick="extend(this);"><a class="whb" href="#"><?php $categorys->name(); ?></a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<ul id="extend-<?php  $categorys->mid() ?>" class="dpn" num="<?php echo count($children); ?>" style="height:0px;" >
					<?php foreach ($children as $mid) { ?>
					<?php $child = $categorys->getCategory($mid); ?>
					<li class="m_dropdown"><a href="<?php echo $child['permalink'] ?>" class="whb1"><?php echo $child['name']; ?></a></li><?php } ?>
					</ul></li>
					<?php endif; ?><?php endif; ?><?php endwhile; ?>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?><?php if(!($pages->template == 'page-status.php')): ?>
					<li class="list_style"><a class="whb" href="<?php $pages->permalink(); ?>" ><?php $pages->title(); ?></a></li>
					<?php endif; ?><?php endwhile; ?>
                 	</ul></nav></nav>
                 	
                 	
                 	<nav class="m_menu_list wh-100"><div class="side-card-widget"><div class="side-card-title"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;&nbsp;网站咨询</div><nav class="menu">
            <ul class="side_ul">
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;当前在线<span class="m-badge"><?php get_number(); ?></span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;加载耗时<span class="m-badge"><?php timer_stop();?></span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;文章数目<span class="m-badge"><?php $stat->publishedPostsNum() ?>篇</span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;分类总数<span class="m-badge"><?php $stat->categoriesNum() ?>个</span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;评论总数<span class="m-badge"><?php $stat->publishedCommentsNum() ?>条</span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;站点字数<span class="m-badge"><?php allOfCharacters(); ?></span></li>
				<li class="list_style2"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;运行时间<span class="m-badge"><?php echo getBuildTime()[1]; ?></span></li>
			</ul>
                </nav></div></nav>
                 	
            <nav class="m_menu_list wh-100"><div class="side-card-widget"><div class="side-card-title"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;热门文章</div><nav class="menu">
            <ul class="side_ul">
				<?php $this->widget('Widget_Post_hot@hot', 'pageSize=5')->to($hot); ?>
				<?php if($hot->have()): ?>
				<?php while($hot->next()): ?>
					<li class="list_style3">
						<div class="hot"><a class="wh-100" href="<?php $hot->permalink();?>" style="background-image: url('<?php echo showCover($hot); ?>')"></a></div>
						<div class="hot-content">
							<a class=" h-1x" style="float:left;"href="#"><span class="htitle"><?php $hot->title();?></span></a>
							<div class="hot-time"><span>2019-09-21</span></div>
						</div>
					</li>
				<?php endwhile; ?><?php endif; ?>
			</ul>
            </nav></div></nav>
                 	
            <nav class="m_menu_list wh-100"><div class="side-card-widget"><div class="side-card-title"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;标签云</div><nav class="menu">
			<div class="tag">
				<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
				<?php if($tags->have()): ?>			
				<?php while($tags->next()): ?>
				<span title="该标签下有<?php $tags->count(); ?>篇文章" class="m-tag-clould-color"  style="background-color:rgb(<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>,<?php echo(rand(150,255)); ?>)">
				    <a class="black" href="<?php $tags->permalink(); ?>" ><?php $tags->name(); ?></a>
				</span>
				<?php endwhile; ?>
				<?php else: ?>
				<span>暂无标签</span>
				<?php endif; ?>
			</div>
            </nav></div></nav>               	
    </div>
   <div class="side-footer">
   	<div class="m-social">
				<div class="qq" id="qq"><i class="fa fa-qq" aria-hidden="true"></i></div>
				<div class="weixin" id="weixin" ><i class="fa fa-weixin" aria-hidden="true"></i></div>
				<div class="github" ><a class="tweibo-a" href="<?php $this->options->github(); ?>" target="_blank"><i style="color:#eee" class="fa fa-github" aria-hidden="true"></i></a></div>
				<div class="login"><a class="login" href="<?php $this->options->adminUrl(); ?>" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i></a></div>

			</div>
   </div>
   </div>
</div></div>
 
<div id="overlay" class="overlay wh-100" style="display: none; opacity: 0;"></div>
			