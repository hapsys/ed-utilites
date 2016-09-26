<?php
use c3s\content\ContentObject;
use c3s\lib\utils\timer\Timer;

$cms = ContentObject::getInstance();

$path = $cms->getPath();
$title = $path[count($path)-1]['title'];

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Турниры - <?php echo $title ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/sites.css" type="text/css"/>

<script type="text/javascript" src="/js/jquery/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="/js/three/three.js"></script>
<script src="/js/three/js/controls/TrackballControls.js"></script>

<script src="/js/three/js/Detector.js"></script>
<script src="/js/three/js/libs/stats.min.js"></script>

<script type="text/javascript" src="/js/proxy.js"></script>
<script type="text/javascript" src="/js/systems/systems.js"></script>

</head>
<body>
	<div class="header">
		<span class="logo"><img src="/images/logo.png"/></span>
	</div>
	<div class="menu-content" style="border: 1px solid red">
	</div>
	<div class="footer"></div>
</body>
</html>
<?php
prn('Build in '.Timer::get().' sec.');