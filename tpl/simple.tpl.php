<?php
use c3s\content\ContentObject;

$cms = ContentObject::getInstance ();

$order_ctx = $cms->getData ( 'order_ctx' );
$lang_switch = $cms->getData ( 'langs' );

$main_menu = $cms->getData ( 'menu_main', array (
		'type' => 'main'
) );

?>
<!DOCTYPE PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Моя сайта - <?php echo $cms->getTitle()?></title>
<!-- link rel="stylesheet" type="text/css" href="/style2.css">
<link rel="stylesheet" type="text/css" href="/users/css/order.css" -->
	<script>
	var partnerID = "I848043";
	</script>
	<link rel="stylesheet" href="https://api.direct-credit.ru/style.css" type="text/css">
	<script src="https://api.direct-credit.ru/JsHttpRequest.js" type="text/javascript"></script>
	<script src="https://api.direct-credit.ru/script.js" charset="windows-1251" type="text/javascript"></script>
</head>
<body>
	<div class="main">
	 <?php echo $lang_switch;?>
	 <div id="menu">
	 	<?php echo $main_menu;?>
	 </div>
		<div id="content">
	 	<?php echo $order_ctx;?>
	 </div>
	</div>
	<script>
		var products = [
		    {id : 'u1111', price: '10000', type: 'Ноутбуки'},
		    {id : 'u2222', price: '20000', type: 'Мобильные телефоны'},
		];
		DCLoans("5618800", 'getPayment', { products : products, loanTerm: '24' }, function(result){
			console.log(result);
			//result будет содержать массив товаров с рассчитанными ежемесячными платежами
		}, true);
	</script>

</body>
</html>
