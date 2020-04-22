<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';$sf="<i class=\"mdi mdi-account-outline\"></i> 游客";
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {$sf="<i class=\"mdi mdi-account-check\"></i> 作者";$commentClass .= ' comment-by-author';  
        }else{$commentClass .= ' comment-by-user';$sf="<i class=\"mdi mdi-account-box\"></i> 用户";}} 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级?>
<div id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
	if ($comments->levels > 0) {echo ' comment-child';$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
	} else {echo ' comment-parent hang';}
	$comments->alt(' comment-odd', ' comment-even');
    if ($comments->url) {$author = '<a href="' . $comments->url . '" target="_blank" rel="external nofollow">' . $comments->author . '</a>';
    } else {$author = '<span>' . $comments->author . '</span>';}?>">
<div class="cot-body">
	<img class="avatar" src="<?php tx($comments->mail,0,$comments->coid); ?>">
	<div class="media-body">
		<h5 class="mt-0"><?php echo $author; ?><?php if ('waiting' == $comments->status) { ?><span class="text-muted">您的评论需管理员审核后才能显示！</span><?php } ?> <span class=""><i class="fa fa-user" aria-hidden="true"></i><?php echo $sf; ?></span></h5>
		<p class="text-muted mb-0">
			<?php if(time_diff(date('Y-m-d',$comments->created)) > 90){
				$comments_time = date('Y-m-d',$comments->created);}else{$comments_time = timesince($comments->created);}?>
			<span class=""><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $comments_time;?></span>
			<span class="mr-1"><i class="fa fa-spinner" aria-hidden="true"></i><?php echo getOs($comments->agent); ?></span>
			<span id="reply" class="comment-reply cp-<?php $comments->theId(); ?>"  ><?php $comments->reply('<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;回复'); ?></span>
		</p>
	</div>
	<div class="cot-content">
<?php $cots=$comments->content;$cots = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#','<a$1 href="$2$3"$5 target="_blank" rel="nofollow">', $cots);echo get_comment_at($comments->coid).$cots;?>
	</div>
<div id="<?php $comments->theId(); ?>" class="mt-1"></div>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
    <?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</div>
<?php } ?>
<div id="comments" class="comments">
    <?php $this->comments()->to($comments); ?>
          <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
    	<h3 id="response"><?php _e('说些什么吧'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
			<div class="comment-row">
		    	<div class="comment-col"> <div class="comment-form-group"> <input type="text" name="author" maxlength="12" id="author" class="form-control" placeholder="称呼*" value="<?php $this->remember('author'); ?>" required=""> </div>
		        </div> 
		        <div class="comment-col"> <div class="comment-form-group"> <input type="email" name="mail" id="mail" class="form-control" placeholder="电子邮箱 *" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>> </div> 
		        </div> 
		        <div class="comment-col"> <div class="comment-form-group"> <input type="url" name="url" id="url" class="form-control" placeholder="网址(http://)" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>>  </div> 
		        </div> 
		    </div>
		    <div class="comment-content"><textarea class="form-textarea form-control-light mb-2 " name="text" placeholder="说些什么吧..." id="example-textarea" rows="5" required=""><?php $this->remember('text'); ?></textarea></div>
		        <div class="comment-bottom">
					<a href="javascript: void(0);"class="btn btn-primary OwO-logo" rel="external nofollow">OwO</a>
					<div class="float-right">
						<span id="cancel_reply" class="cancel-comment-reply cl-<?php $comments->theId(); ?>"><?php $comments->cancelReply('<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;取消'); ?></span>
							<button type="submit" class="btn btn-primary btn-sm submit" id="misubmit">提交</button>
						</div>
					</div>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
     <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>
</div>
