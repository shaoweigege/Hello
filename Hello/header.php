<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<?php if($this->is('index')){$head_image = $this->options->logo;$head_title = $this->options->title;$head_descption = $this->options->subtitle;$keywords = $this->options->title;}else{$head_image = showCover($this);
		if($this->is('archive')){$head_title = '分类'.$this->categories[0][name].'下的文章-'.$this->options->title;$keywords = $this->categories[0][name];
		}else{$head_title = $this->title.'-'.$this->options->title;if($this->is('page')){$keywords = $this->title;}else{$keywords = $this->fields->keyword;}}javascript:;
		if($this->is('archive')){$head_descption = $this->categories[0][description];
		}else{if(showSummary($this)[0] == 0){$head_descption = $this->description;}else{$head_descption = showSummary($this)[1];}}}?>
	<meta itemprop="name" content="<?php echo $head_title ?>">
	<meta itemprop="description" content="<?php echo $head_descption; ?>">
	<meta itemprop="image" content="<?php echo $head_image; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<?php if ($this->is('post')): ?>
	<?php endif ?>
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php if(!($this->options->siteicon == '')): ?>
    <link rel="icon" href="<?php $this->options->siteicon(); ?>" mce_href="<?php $this->options->siteicon(); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php $this->options->siteicon(); ?>" mce_href="<?php $this->options->siteicon(); ?>" type="image/x-icon">
    <?php else: ?>
    <link rel="icon" href="<?php $this->options->themeUrl('img/avatar.ico'); ?>" mce_href="<?php $this->options->themeUrl('img/avatar.ico'); ?>" type="image/x-icon">
    <?php endif; ?>
    <?php $HLstyle = 'assets/css/HLstyle/'.$this->options->HLstyle.'.css'; ?>
    <?php if($this->options->sad == 'Yes'){sad();} ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/flexslider.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/md.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/HLstyle/'.$this->options->HLstyle.'.css'); ?>">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" charset="utf-8" src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="https://www.mcheng.cn/wp-content/themes/b2/Assets/fontend/library/zooming.min.js?ver=2.1.0"></script>
	<script src="<?php $this->options->themeUrl('assets/js/jquery.flexslider-min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('assets/js/prism.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('assets/js/clipboard.min.js'); ?>"></script>
	<!--<script src="http://cdn.gqink.cn/layer/3.1.1/layer.js" type="text/javascript" charset="utf-8"></script>-->
	<?php $this->options->tongji(); ?>
    <?php $this->header(); ?>
	


</head>

<body id="ty01" style="background: url(<?php $this->options->bgimg(); ?>) center center fixed;">
<header id="header" class="clearfix">
	<div class="head hcenter" id="head">
		<div class="headnav">
			<div id="headlogo" class="headlogo">
				<?php if(!empty($this->options->logo)): ?>
				<a class="logo ht-100">
					<img class="ht-100" src="<?php $this->options->logo(); ?>"/>
				</a>
				<?php else: ?>
				<span style="display:inline-block;font-size: 1.5rem;padding: 0.2rem 0;"><?php $this->options->cusTitle(); ?></span>
				<?php endif; ?>
			</div>
			<nav class="nav">
		        <ul class="nav_menu">
		            <li class="nav_menu_li"><a class="nav_menu_lis" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
		            		            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
		            <?php while($categorys->next()): ?>
		            <?php if ($categorys->levels === 0): ?>
		        	<?php $children = $categorys->getAllChildren($categorys->mid); ?>
					<?php if (empty($children)): ?>
		            	<li class="nav_menu_li"><a class="nav_menu_lis" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->description(); ?>"><?php $categorys->name(); ?></a></li>
					<?php else: ?>
						<li class="nav_menu_li dropdown">
		            		<a class="navmla nav_menu_lis"  href="#"><?php $categorys->name(); ?></a>
		            		<div class="dropdown-menu" aria-labelledby="topnav-apps">
		            			<?php foreach ($children as $mid) { ?>
								<?php $child = $categorys->getCategory($mid); ?>
		                         <a href="<?php echo $child['permalink'] ?>" class="dropdown-item <?php if($this->is('category', $mid)): ?>active<?php endif; ?>"><?php echo $child['name']; ?></a>
								<?php } ?>
		            		</div>
		            	</li>
					<?php endif; ?><?php endif; ?><?php endwhile; ?>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		            <?php while($pages->next()): ?><?php if(!($pages->template == 'page-status.php')): ?>
		            <li class="nav_menu_li"><a class="nav_menu_lis" href="<?php $pages->permalink(); ?>" ><?php $pages->title(); ?></a></li>
		            <?php endif; ?><?php endwhile; ?>
	            </ul>
	    	</nav>
		</div>
	</div>
	
			
	
	<div class="headnav" id="m_headnav">
		<div class="mobile_nav">
			<div id="m_btn" class="m_btn"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<?php if(!empty($this->options->logo)): ?>
			<div id="subtitle" class="subtitle"><a href="<?php $this->options->siteUrl(); ?>"><img style="height:30px;" src="<?php echo $this->options->logo; ?>"></a></div>
			<?php else: ?>
			<div id="subtitle" class="subtitle"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->cusTitle(); ?></a></div>
			<?php endif; ?>
			<div id="m_controlSearch" class="m_search"><a id="m_switchicon"><i class="fa fa-search" aria-hidden="true"></i></a></div>
		
		</div>
	</div>
	<div id="topsearch" class="topsearch" style="visibility: hidden;opacity: 0;">
	    <div class="intopsearch">
	        <div class="m_mainsearch">
	            <form id="m_search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
	                <input type="text" id="s" name="s" class="text m_input" placeholder="<?php _e('请输入关键词搜索...'); ?>" />
	                <button type="submit" class="submit"><?php _e('Search'); ?></button>
	            </form>
	        </div>
	    </div>
	</div>
	

</header>

	
<div id="body">
    <div class="layout_page">
