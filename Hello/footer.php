<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div>
    </div>
</div>
<?php $this->need('m_sidebar.php'); ?>

<footer id="footer" role="contentinfo">
			<?php if($this->user->hasLogin()){
			$api = 'https://tongji.baidu.com/web/welcome/ico?s=';
			$key=explode('"',explode('https://hm.baidu.com/hm.js?',$this->options->tongji)[1])[0];
			$tongji_url = $api.$key;
		}else{$tongji_url = 'https://tongji.baidu.com/'; 
		}?>
    <div class="footer">
    <p><span style="height: 1rem;"><a target="_blank" href="http://beian.miit.gov.cn" rel="nofollow"><img style="height:1rem;position: relative;top:2px;" src="https://metu.ztongyang.cn/hello/icp.png-yasuo" />&nbsp;<?php $this->options->beian(); ?></a></span></p>
	<p>艰难生存:<span id="run_time"></span></p>
	<p><span id="busuanzi_container_site_pv">本站总访问量<span id="busuanzi_value_site_pv"></span>次</span> | 本站访客数<span id="busuanzi_value_site_uv"></span>人次</span></p>
	<p>
		<span>&copy;2019-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</span>
		<span>Theme By <a href="https://ztongyang.cn/" target="_blank">Hello</a>.</span>
		<span> Count by<a href="http://busuanzi.ibruce.info/" target="_blank" rel="noopener"> Busuanzi</a>&nbsp;&&nbsp;<a href="<?php echo $tongji_url; ?>" target="_blank">Baidu</a>.</span>
		<span>Powered by <?php _e('<a href="http://www.typecho.org">Typecho</a>'); ?>.</span>
	</p>
    </div>
</footer>
<section><div class="rightside">
    <i class="to-top hover-button fa fa-chevron-up" aria-hidden="true" title="返回顶部"></i>
    <!--移动端调试-->
    <?php if($this->options->eruda  == "Yes"): ?>
    <i id="console" class="hover-button fa fa-cog" aria-hidden="true" title="检查"></i>
    <script src="https://file.ztongyang.cn/cloud/1/2020/06/21/eruda.js"></script>
    <script>$(".eruda-entry-btn").css("display","none");$("#console").on("click",function(){if($("#console").attr("title")=="检查"){eruda.init();eruda.show();$("#console").attr("title","退出检查")}else{eruda.destroy();$("#console").attr("title","检查")}});</script>
    <?php endif; ?>
	
	<?php if($this->is('post')): ?><?php if($this->user->hasLogin()): ?>
        <a target="_blank" href="<?php $this->options->adminUrl('write-post.php?cid='.$this->cid); ?>"><i class="hover-button fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <?php endif; ?><?php endif; ?>

    <?php if($this->is('post') && $this->category !== "videos" && $this->category !== "gallery"): ?>
    <i id="toc-btn" class="hover-button fa fa-list" aria-hidden="true" title="文章目录"></i>
    <i id="m-toc-btn" class="hover-button fa fa-list" aria-hidden="true" title="文章目录"></i>
    <i class=""><?php ArticlePoster_Plugin::button($this->cid); ?></i>
    <?php endif; ?>
    
    <?php if($this->user->hasLogin()): ?>
    <?php if($this->is("page","talk")): ?>
            <a href="<?php echo $this->options->adminUrl.'extending.php?panel=Talk%2Fmanage-talk.php' ?>"  title="发表说说" target="_blank"><i class="hover-button fa fa-paper-plane" aria-hidden="true"></i></a>
        <?php endif; ?>
    <a href="<?php $this->options->adminUrl(); ?>"><i class="hover-button fa fa-user" aria-hidden="true" title="进入后台"></i></a>
    <?php else: ?>
    <a href="<?php $this->options->adminUrl(); ?>"><i class="hover-button fa fa-sign-in" aria-hidden="true" title="登录"></i></a>
    <?php endif; ?>
</div></section>


<?php $this->footer(); ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/assets/js/nanjiu.js'); ?>"></script>
<script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
<script src="<?php $this->options->themeUrl('assets/js/sidebar.js'); ?>"></script>

<!--代码显示行号-->
<?php if($this->options->linenumber == 'Yes'): ?>
<script>(function(){var pres=document.querySelectorAll("pre");var lineNumberClassName="line-numbers";pres.forEach(function(item,index){item.className=item.className==""?lineNumberClassName:item.className+" "+lineNumberClassName})})();</script>
<?php endif; ?>

<!--侧栏固定-->
<script>$(document).ready(function() {$('.flex-left, .flex-right').theiaStickySidebar({additionalMarginTop: 56});});</script>
<!--返回顶部-->
<script>$(function() {  $('.to-top').toTop();});</script>
<!--图片懒加载-->
<?php if($this->options->lazyload == 'Yes'): ?>
<script type="text/javascript" src="https://apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.min.js"></script>
<script type = "text/javascript"> jQuery(function() {jQuery("img").lazyload({threshold: 100,effect: "fadeIn"});});</script>
<?php endif; ?>

</body>
</html>
