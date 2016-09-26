<?php
error_reporting(E_ALL);
//
//
define("ROOT", __DIR__."/");
define("CMS", "/Projects/php/c3s/fw/");

define("CLASSPATH", ROOT."classes/;".CMS.'vendor/');
//
define("DEBUG", 1);


define("TPLS",ROOT."_tpls/");
define("XSL",ROOT."xslt/");
define("INCS",ROOT."_incs/");
define("IMGS",ROOT."_imgs/");
define("XML", ROOT."xml/");

define("TWIG", 0);
define("TWIG_TPLS", ROOT.'twig/');
define("TWIG_CACHE", ROOT.'cache/');


define("TMP", ROOT."tmp/");


define('DB_HOST', '127.8.105.2');
define('DB_USER', 'adminqPRCwpW');
define('DB_PASSWORD', 'vf1rG8cNHKy4');
define('DB_DATABASE', 'edu');

define('SMTP_HOST', 'localhost');
define('SMTP_PORT', '25');
define('SMTP_USER', 'root');
define('SMTP_PASSWORD', 'root');

?>
