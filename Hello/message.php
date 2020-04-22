<?php 
/**
 * 留言
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');?>
	
<div class="page" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="post-content" itemprop="articleBody">
            <img class="liuyan" src="http://metu.ztongyang.cn/b/liuyan4.jpg" />
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->


<?php $this->need('footer.php'); ?>