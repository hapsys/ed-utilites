<?php
namespace ed\systems;
use c3s\modules\BaseModule;
use ed\db\access\DbAccess;
use c3s\lib\utils\xml\XMLUtils;
use c3s\content\ContentObject;
use c3s\request\XRequest;
use ed\systems\filter\InFilter;
use c3s\redirect\DropRedirect;
use c3s\lib\utils\Utils;

/**
 *
 * @author admin
 *        
 */
class Settlements extends BaseModule {
	
	public function getCanvas() {
		
		$types = DbAccess::settlementTypesAccess()->getSorted();
		foreach ($types as $type) {
			$t = $type->getType();
			$type->setGroup(substr($t, 0, 2));
		}
		
		$gr = $types->getGrouped('group');
		
		$tag = $this->getParameter('tag');
		$template = $this->getParameter('template');
		
		$xml = XMLUtils::arrayToXml($gr);
		
		ContentObject::getInstance()->setData($tag, $xml, $template, array('mode' => 'canvas'));
		//prn(XMLUtils::xml2out($xml->saveXML()));
		
	}
	
	public function searchSettlements() {
		
		$this->getDispatcher()->setRedirect(new DropRedirect());
		$post = XRequest::request();
		
		$types = trim($post->getParam('stype', XRequest::PARAM_STRING, ''));
		$system_id = $post->getParam('system', XRequest::PARAM_UINT, 0);
		$visited = trim($post->getParam('visited', XRequest::PARAM_STRING, ''));
		
		$x = 0;
		$y = 0;
		$z = 0;
		$id = 0;
		
		if (($system = DbAccess::systemsHashAccess()->getByPrimaryKey($system_id)) !== null) {
			$x = $system->getX();
			$y = $system->getY();
			$z = $system->getZ();
		}

		$idx = false;
		if ($types) {
			$idx = preg_split('~;~', $types, -1, PREG_SPLIT_NO_EMPTY);
			//prn($idx);
		}
		
		$visited = preg_split('~;~', $visited, -1, PREG_SPLIT_NO_EMPTY);
		
		$result = array();
		
		if (($sys = DbAccess::settlementsAccess()->getSettlementsSearch(new InFilter('t.type', $idx))) !== null) {
			$dsts =  array();
			$dsts[0] = array(
				'id' => $id,	
				'x' => $x,	
				'y' => $y,	
				'z' => $z,	
				'dst' => array()
			);
			foreach ($sys as $k=>$s) {
				if (in_array($s->getSettlementId(), $visited)) {
					unset($sys[$k]);
				} else {
					$dsts[$s->getSystemId()] = array(
						'id' => $s->getSystemId(),
						'x' => $s->getX(),
						'y' => $s->getY(),
						'z' => $s->getZ(),
						'dst' => array()
					);
				}
			}
			
			foreach ($dsts as $k1 => $v1) {
				foreach ($dsts as $k2 => $v2) {
					if ($k1 != $k2 && !isset($dsts[$k1]['dst'][$k2])) {
						$r = sqrt(pow($v1['x'] - $v2['x'], 2) + pow($v1['y'] - $v2['y'], 2) + pow($v1['z'] - $v2['z'], 2));
						$dsts[$k1]['dst'][$k2] = $r;
						$dsts[$k2]['dst'][$k1] = $r;
					}
				}
			}
			
			$path = $this->getPath($dsts);
			
			$systems =  $sys->__toArray();
			$systems = Utils::getArrayGrouped($systems, 'system_id');
			//prn($systems);
			//die();
			
			foreach ($path as $k => $v) {
				$dst = round($v, 2);
				$s = $systems[$k];
				$sol_dst = round(sqrt(pow($s[0]['x'], 2) + pow($s[0]['y'], 2) + pow($s[0]['z'], 2)), 2);
				
				foreach ($s as $key => $val) {
					$val['sol_dest'] = $sol_dst;
					$val['dest'] = 0;
					if (!$key) {
						$val['dest'] = $dst;
					}
					$result[] = $val;
				}
					
				//$s[0]['dest'] = round($v, 2);
				//$s[0]['sol_dest'] = round(sqrt(pow($s[0]['x'], 2) + pow($s[0]['y'], 2) + pow($s[0]['z'], 2)), 2);
			}
			
			//prn($path);
		}
		
		$tag = $this->getParameter('tag');
		ContentObject::getInstance()->setData($tag, $result);
	}
	
	private function getPath($source) {
		$result = array();
		$cur = $source[0];
		unset($source[0]);
		while(count($source)) {
			//prn(count($source));
			$dest = $cur['dst'];
			asort($dest);
			while(true) {
				$next = each($dest);
				$n = $next['key'];
				if (isset($source[$n])) {
					$result[$n] = $next['value'];
					$cur = $source[$n];
					unset($source[$n]);
					break;
				}
			}
		}
		return $result;
	}
}

