<?php
namespace ed\systems;
use c3s\modules\BaseModule;
use c3s\request\XRequest;
use ed\db\access\DbAccess;
use c3s\redirect\DropRedirect;
use c3s\content\ContentObject;

/**
 *
 * @author admin
 *        
 */
class Systems extends BaseModule {
	
	public function getSystemsNearCoordiantes() {
		
		$this->getDispatcher()->setRedirect(new DropRedirect());
		
		$post = XRequest::request();
		
		$x = $post->getParam('x', XRequest::PARAM_FLOAT, 0); 
		$y = $post->getParam('y', XRequest::PARAM_FLOAT, 0); 
		$z = $post->getParam('z', XRequest::PARAM_FLOAT, 0); 
		$scale = $post->getParam('scale', XRequest::PARAM_FLOAT, 20); 
		
		$systems = DbAccess::systemsHashAccess()->getSystemsInBox($x - $scale, $x + $scale, $y - $scale, $y + $scale, $z - $scale, $z + $scale);
		
		$tag = $this->getParameter('tag');
		
		ContentObject::getInstance()->setData($tag, $systems->__toArray());
		
	}
	
	public function getSystemByPatiallyName() {
		$this->getDispatcher()->setRedirect(new DropRedirect());
		$post = XRequest::request();
		
		$str = $post->getParam('system', XRequest::PARAM_STRING);
		
		$result = array();
		
		if (strlen($str) > 0) {
			$str = strtolower($str.'%');

			if (($systems = DbAccess::systemsHashAccess()->getSystemsSearch($str)) !== null) {
				$result = $systems->__toArray();
				//prn($result);
			}
		}
		
		$tag = $this->getParameter('tag');
		ContentObject::getInstance()->setData($tag, $result);
	}
	
}

