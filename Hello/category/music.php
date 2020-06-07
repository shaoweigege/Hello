<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>
<div class="archive">
    <div class="wt-100" id="main" role="main">
	    <h3 class="archive-title" style="display:none;"> 
	        <?php $this->archiveTitle(array(
	            'category'  =>  _t('%s'),
	            'search'    =>  _t('包含关键字 %s 的文章'),
	            'tag'       =>  _t('标签 %s 下的文章'),
	            'author'    =>  _t('%s 发布的文章')
	        ), '', ''); ?></h3>
	       
	  <div class="layout-category">
	   <iframe frameborder="no" border="0" marginwidth="0" marginheight="0"style="width: 100%; min-height: 700px;"src="//music.163.com/outchain/player?type=0&id=423497698&auto=1&height=430"></iframe>
    </div>
    </div>
    </div>

	<?php $this->need('footer.php'); ?>
	