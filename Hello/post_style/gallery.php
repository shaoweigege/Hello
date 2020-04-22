<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/viewer.min.css'); ?>">
<div class="page" id="main" role="main">	

<?php $imgs=explode('$',$this->content);array_shift($imgs);?>

<ul id="dowebok">
<?php foreach ($imgs as $img): ?>
	<li><div class="gallery"><img src="<?php echo strip_tags($img,$allow) ?>"></div></li>
<?php endforeach; ?>
</ul>
		
</div>

<script src="<?php $this->options->themeUrl('assets/js/viewer.min.js'); ?>"></script>
<script>var viewer = new Viewer(document.getElementById('dowebok'));</script>
<?php $this->need('footer.php'); ?>