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
    <p><span><a target="_blank" href="http://beian.miit.gov.cn" rel="nofollow"><?php $this->options->beian(); ?></a></span></p>
	<p>艰难生存:<span id="run_time"></span></p>
	<p><span id="busuanzi_container_site_pv">本站总访问量<span id="busuanzi_value_site_pv"></span>次</span> | 本站访客数<span id="busuanzi_value_site_uv"></span>人次</span></p>
	<p>
		<span>&copy;2019-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?>.</a></span>
		<span>Theme By Hello.</span>
		<span> Count by<a href="http://busuanzi.ibruce.info/" target="_blank" rel="noopener"> Busuanzi</a>&nbsp;&&nbsp;<a href="<?php echo $tongji_url; ?>" target="_blank">Baidu</a>.</span>
		<span>Powered by <?php _e('<a href="http://www.typecho.org">Typecho</a>'); ?>.</span>
	</p>
    </div>
</footer>

<?php $this->footer(); ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/assets/js/nanjiu.js'); ?>"></script>
<script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
<script src="<?php $this->options->themeUrl('assets/js/sidebar.js'); ?>"></script>

<!--代码显示行号-->
<?php if($this->options->linenumber == 'Yes'): ?>
<script type="text/javascript">
	(function(){
		var pres = document.querySelectorAll('pre');
		var lineNumberClassName = 'line-numbers';
		pres.forEach(function (item, index) {
			item.className = item.className == '' ? lineNumberClassName : item.className + ' ' + lineNumberClassName;
		});
	})();
</script>
<?php endif; ?>
<!--侧栏固定-->
<script>
  $(document).ready(function() {
    $('.flex-left, .flex-right')
      .theiaStickySidebar({
        additionalMarginTop: 56
      });
  });
</script>
</body>
</html>
