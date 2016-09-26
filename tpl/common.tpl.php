<?php
use c3s\content\ContentObject;
use c3s\lib\utils\timer\Timer;

$cms = ContentObject::getInstance();

$lang_switch = $cms->getData('langs');

$content = $cms->getData('content');

$main_menu = $cms->getData('menu_main', array(
	'type' => 'main'
));

$content .= $cms->getData('view_ctx');
$content .= $cms->getData('form_ctx');

$path = $cms->getPath();
$title = $path[count($path)-1]['title'];

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Турниры - <?php echo $title ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/chosen.css" type="text/css"/>
<link rel="stylesheet" href="/css/bootstrap-chosen.css" type="text/css"/>
<link rel="stylesheet" href="/css/sites.css" type="text/css"/>

<script type="text/javascript" src="/js/jquery/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="/js/form/jquery.form.js"></script>
<script type="text/javascript" src="/js/json/jquery.json.min.js"></script>
<script type="text/javascript" src="/js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/js/chosen/ajax-chosen.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
<script type="text/javascript" src="/js/popup.js"></script>
<script type="text/javascript" src="/js/proxy.js"></script>
<script type="text/javascript" src="/js/store.js"></script>
<script type="text/javascript" src="/js/form.js"></script>

</head>
<body>
	
	<div class="header">
		<span class="logo"><img src="/images/logo.png"/></span>
	</div>
	<div class="menu-content">
		<div class="menu">
	 		<?php echo $main_menu;?>
	 	</div>
		<div class="content">
			<h2><?php echo $title ?></h2>
	 		<?php echo $content;?>
	 	</div>
	</div>
	<div class="footer"></div>
</body>
</html>
<?php
prn('Build in '.Timer::get().' sec.');