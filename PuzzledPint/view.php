<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Puzzled Pint" />
		<meta name="keywords" content="puzzled pint bars puzzles games" />
		<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do&v2' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" type="text/css" href="<?=$this->getThemePath()?>/stylesheets/all.css" />
		<link rel="Shortcut Icon" href="/favicon.ico">
		<script type="text/javascript" src="<?=$this->getThemePath()?>/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

		<?php Loader::element('header_required'); ?>

		<!-- 
		<title>Puzzled Pint {% if page.title %} :: {{page.title}}{% endif %}</title>
		-->
	</head>
	<body {% if page.section %} id="{{page.section}}_section" {% endif %}>
		<div id="wrapper">
	    	<div id="header">
				<div id="logo">
	    			<h1><a href="/"><span>Puzzled Pint</span></a></h1>
				</div>
				<div id="navigation">
					<?php
						$bt = BlockType::getByHandle('autonav');
						$bt->controller->displayPages = 'top';
						$bt->controller->orderBy = 'display_asc';
						$bt->render('templates/header_menu');
					?>
				</div>
				<div style="clear:both;"></div>
	   	 	</div>
			<div id="content">
				<?php echo $innerContent; ?>

			</div>
			<div id="footer">
				<div id="license_info">
					Except where otherwise noted, content on this site is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
				</div>
			</div>
				<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
				<div id="concrete5_footer">
						<span class="powered-by">powered by: <a href="http://www.concrete5.org" title="<?php echo t('concrete5 - open source content management system for PHP and MySQL')?>"><?php echo t('concrete5 - open source CMS')?></a></span>
						&nbsp;&nbsp;
						<?php 
						$u = new User();
						if ($u->isRegistered()) { ?>
							<?php  
							if (Config::get("ENABLE_USER_PROFILES")) {
								$userName = '<a href="' . $this->url('/profile') . '">' . $u->getUserName() . '</a>';
							} else {
								$userName = $u->getUserName();
							}
							?>
							<span class="sign-in"><?php echo t('Currently logged in as <b>%s</b>.', $userName)?> <a href="<?php echo $this->url('/login', 'logout')?>"><?php echo t('Sign Out')?></a></span>
						<?php  } else { ?>
							<span class="sign-in"><a href="<?php echo $this->url('/login')?>"><?php echo t('Sign In to Edit this Site')?></a></span>
						<?php  } ?>
			            
				</div>
				<?php Loader::element('footer_required'); ?>
		</div>
		<!-- Piwik -->
		<script type="text/javascript">
		var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.victorasteinza.com/" : "http://piwik.victorasteinza.com/");
		document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
		</script><script type="text/javascript">
		try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
		piwikTracker.trackPageView();
		piwikTracker.enableLinkTracking();
		} catch( err ) {}
		</script><noscript><p><img src="http://piwik.victorasteinza.com/piwik.php?idsite=3" style="border:0" alt="" /></p></noscript>
		<!-- End Piwik Tag -->
		<!-- UserVoice -->
		<script type="text/javascript">
		var uservoiceOptions = {
		key: 'puzzledpint',
		host: 'puzzledpint.uservoice.com', 
		forum: '80327',
		alignment: 'right',
		background_color:'#454141', 
		text_color: 'white',
		hover_color: '#1d1f21',
		lang: 'en',
		showTab: true
  		};
  		function _loadUserVoice() {
    		var s = document.createElement('script');
    		s.src = ("https:" == document.location.protocol ? "https://" : "http://") + "uservoice.com/javascripts/widgets/tab.js";
    		document.getElementsByTagName('head')[0].appendChild(s);
  		}
  		_loadSuper = window.onload;
  		window.onload = (typeof window.onload != 'function') ? _loadUserVoice : function() { _loadSuper(); _loadUserVoice(); };
		</script>
		<!-- End UserVoice -->
	</body>
</html>
