<?php

//$start = microtime(true);
@include_once ('local.inc.php');
if (!defined('ROOT')) {
	include_once ('config.inc.php');
}
include_once (CMS.'lib/utils/timer/Timer.php');
c3s\lib\utils\timer\Timer::start();

use c3s\web\site\SiteLoaderXML;
use c3s\lib\storage\MemcachedStorage;
use c3s\lib\storage\SessionStorage;
use c3s\lib\storage\StorageFactory;
use c3s\log\LoggerFactory;
use c3s\log\loggers\LoggerLog4php;
use c3s\content\transformers\TwigTransformer;
use c3s\content\transformers\XSLTransformer;
use c3s\content\ContentObject;
use c3s\actions\xml\XMLActionMap;
use c3s\front\SimpleApplicationFrontlet;
use c3s\content\transformers\PHPTransformer;

session_start();
ob_start();

include_once(CMS.'lib/debug.php');
include_once(CMS.'lib/autoload.php');
include_once(CMS.'vendor/Log4php/Logger.php');

$load = new AutoloadDefault(CLASSPATH);
$load->addClassPath(array('c3s'=>CMS));
$load->addExtentions('lib.php');

//prn('Autoload in '.(microtime(true) - $start).' sec.');

Logger::configure(dirname(__FILE__) . '/log4php.xml');
LoggerFactory::registerLogger(LoggerLog4php::getClass());

//prn('Logger '.(microtime(true) - $start).' sec.');

$sess = new SessionStorage();
StorageFactory::register('default', $sess);
StorageFactory::register('session', $sess);
//StorageFactory::register('memcache', new MemcachedStorage());

ContentObject::getInstance()->registerTransformer(new XSLTransformer());
ContentObject::getInstance()->registerTransformer(new PHPTransformer());

//prn('Content & Other '.(microtime(true) - $start).' sec.');

/*
 * include TWIG
 */
if (defined('TWIG') && TWIG) {
	include_once CMS.'vendor/Twig/Autoloader.php';
	Twig_Autoloader::register();
	$twig_params = array();
	if (defined('TWIG_CACHE')) {
		$twig_params['cache'] = TWIG_CACHE;
	}
	$twig_params['debug'] = true;
	$twig = new Twig_Environment(new Twig_Loader_Filesystem(TWIG_TPLS), $twig_params);
	ContentObject::getInstance()->registerTransformer(new TwigTransformer($twig));
}

//prn('Twig '.(microtime(true) - $start).' sec.');

$site = SiteLoaderXML::getInstance()->load(ROOT.'sites.xml')->getSite($_SERVER['HTTP_HOST']);

if ($site) {

	//prn($site);

	$front = new SimpleApplicationFrontlet(new XMLActionMap($site->getConfig()), '/');

	//prn('Frontlet '.(microtime(true) - $start).' sec.');

	try {
		$front->processRequest();
	} catch (Exception $e) {
		prn(get_class($e).': '.$e->getMessage());
		prn($e->getTrace());
	}
} else {
	prn('No Site Configured');
}

//prn('Build in '.(microtime(true) - $start).' sec.');

ob_end_flush();



?>