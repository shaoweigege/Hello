<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/viewer.min.css'); ?>">
<div class="page" id="main" role="main">	

<?php $imgs=explode('$',$this->content);array_shift($imgs);$lazyimg = $this->options->themeUrl.'/img/loading.gif';?>

<ul id="dowebok">
<?php if($this->options->lazyload == 'Yes'): ?>
<?php foreach ($imgs as $img): ?>
	<li><div class="gallery"><a href="<?php echo strip_tags($img,$allow) ?>" data-fancybox="gallery" ><img data-original="<?php echo strip_tags($img,$allow) ?>" src="<?php echo $lazyimg; ?>"></a></div></li>
<?php endforeach; ?>
<?php else: ?>
<?php foreach ($imgs as $img): ?>
	<li><div class="gallery"><a href="<?php echo strip_tags($img,$allow) ?>" data-fancybox="gallery" ><img src="<?php echo strip_tags($img,$allow) ?>" ></a></div></li>
<?php endforeach; ?>
<?php endif; ?>
</ul>
		
</div>

<?php $this->need('footer.php'); ?>

