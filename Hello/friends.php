<?php 
/**
 * 友链
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');?>
	
<div class="page" id="main" role="main">
<h3 class="f-title">大佬们</h3>
<div class="friends dpf" id="friends" >
	
	<?php Links_Plugin::output('
	<div class="friends-card">
		<a href="{url}" target="_blank">
			<div class="f-card">
			<div class="dpf"><div  style="height:80px;width:80px;"><img class="f-img wh-100" onerror="imgError(this,1)" src="{image}"></div>
				<div class="f-body">
					<span class="sitename">{name}</span>
					<span class="linkdes h-2x">{title}</span>
				</div>
			</div>
		</div>
		</a></div>',0,'blog'); ?>
</div>


<h3 class="f-title">常用网站</h3>
<div class="friends dpf" id="friends">
	
	<?php Links_Plugin::output('
	<div class="friends-card">
		<a class="sd" href="{url}" target="_blank">
			<div class="f-card-1">
				<div class="f-body">
					<span class="sitename">{name}</span>
					<span class="linkdes h-2x">{title}</span>
				</div>
		</div>
		</a></div>',0,'bookmark'); ?>
</div>

<div class="friends" style="font-size:1rem;" id="friends">
<?php  $this->content(); ?>
</div>

<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
