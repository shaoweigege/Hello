<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
global $can;

if($cat>0){$can='?cat='.$cat;}else{$can="";}

class Typecho_Widget_Helper_PageNavigator_Classic extends Typecho_Widget_Helper_PageNavigator
{

    public function prev($prevWord = 'PREV')
    {
        //输出上一页
        if ($this->_total > 0 && $this->_currentPage > 1) {
            echo '<a class="prev" href="' . str_replace($this->_pageHolder, $this->_currentPage - 1, $this->_pageTemplate) . $this->_anchor . $GLOBALS['can'] . '">'
            . $prevWord . '</a>';
        }
    }

    public function next($nextWord = 'NEXT')
    {
        //输出下一页
        if ($this->_total > 0 && $this->_currentPage < $this->_totalPage) {
            echo '<a class="next" title="" href="' . str_replace($this->_pageHolder, $this->_currentPage + 1, $this->_pageTemplate) . $this->_anchor . $GLOBALS['can'] . '">'
            . $nextWord . '</a>';
        }
    }
}
?>



<?php $this->need('header.php'); ?>
<div class="archive">
    <div class="wt-100" id="main" role="main">
	    <h3 class="archive-title">
	        <?php $this->archiveTitle(array(
	            'category'  =>  _t('%s'),
	            'search'    =>  _t('包含关键字 %s 的文章'),
	            'tag'       =>  _t('标签 %s 下的文章'),
	            'author'    =>  _t('%s 发布的文章')
	        ), '', ''); ?></h3>
	       
	       <div class="layout-category">
	        <?php if ($this->have()): ?>
	    	<?php while($this->next()): ?>
			<div class="c-card">
				<a href="<?php $this->permalink(); ?>" title="<?php $this->title() ?>">
				<div class="a-post">
					<div class="c-img">
						<img class="wh-100" src="<?php echo showCover($this); ?>">
						<?php if($this->category == "gallery"): ?>
						<span class="item-num">[<?php echo CountImg($this->content); ?>P]</span>
						<?php endif; ?>
						<div class="a-title"><span class="h-1x"><?php $this->title() ?></span></div></div>
					<?php if(showSummary($this)[0] == 0){$summary = $this->description;}else{$summary = showSummary($this)[1];}?>
					<div class="wt-100">
						<div class="c-detail">
							<div class="a-summary"><span class="h-2x"><?php if($this->category == 'gallery'){echo showSummary($this)[1];}else{echo $summary;} ?></span></div>
							<div class="a-bottom">
								<span datetime="<?php $this->date(); ?>"><i class="fa fa-clock-o">&nbsp;</i><i><?php $this->date(); ?></i></span>
								<div style="float:right;">
									<span><i class="fa fa-eye fs-16"></i>&nbsp;<i><?php get_post_view($this); ?></i></span>&nbsp;&nbsp;
									<span><i class="fa fa-commenting"></i>&nbsp;<i><?php $this->commentsNum(); ?></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
	    	<?php endwhile; ?>
	    	
	    	<div class="col-btn">
				<?php $this->pageLink('<button type="button" class="btn btn-primary mr-2">上一页</button>'); ?>
				<?php $this->pageLink('<button type="button" class="btn btn-primary">下一页</button>','next'); ?>
				
				<div class="float-right pt-1">
					<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>/<?php echo   ceil($this->getTotal() / $this->parameter->pageSize); ?>
				</div>
			</div>
	    	
	    	
	        <?php endif; ?>
        
        
        </div>
        </div>
    </div>

	<?php $this->need('footer.php'); ?>
	