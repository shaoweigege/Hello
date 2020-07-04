<?php 
/**
 * 友链
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$lazyimg = $this->options->themeUrl.'/img/loading.gif';
	$this->need('header.php');?>
	
<div class="page" id="main" role="main">
<div class="friends dpf" id="friends" >
	<h2 class="fh2">大佬们</h2>
	<div style="display:flex;flex-wrap: wrap;">
    <?php if($this->options->lazyload == 'Yes'):?>
     
		<?php Links_Plugin::output('
	<div class="friends-card">
		<a href="{url}" target="_blank">
			<div class="f-card act" title="{title}">
			<div style="height:80px;"><img class="f-img wh-100" onerror="imgError(this,1)" data-original="{image}" src="'.$lazyimg.'"></div>
				<div class="f-body">
					<span class="sitename">{name}</span>
				</div>
			
		    </div>
		</a></div>',0,'blog'); ?>
	<?php else: ?>
        <?php Links_Plugin::output('
	<div class="friends-card">
		<a href="{url}" target="_blank">
			<div class="f-card act" title="{title}">
			<div style="height:80px;"><img class="f-img wh-100" onerror="imgError(this,1)" src="{image}"></div>
				<div class="f-body">
					<span class="sitename">{name}</span>
				</div>
			
		    </div>
		</a></div>',0,'blog'); ?>
    <?php endif; ?>	 
	    
	
</div>
</div>

<div class="friends dpf" id="friends">
	<h2 class="fh2">常用网站</h2>
	<div style="display:flex;flex-wrap: wrap;">
	<?php Links_Plugin::output('
	<div class="friends-card">
		<a class="sd" href="{url}" target="_blank">
			<div class="f-card-1" title="{title}">
				<div>
					<span class="sitename">{name}</span>
				</div>
		</div>
		</a></div>',0,'bookmark'); ?>
</div></div>

<div class="friends" style="font-size:1rem;" id="friends">
<?php  $this->content(); ?>
</div>

<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
