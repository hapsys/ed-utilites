<?php
/**
 *  Autogenerated class
 */
 
namespace ed\db\access;

use c3s\db\intruders\SQLIntruder;
use c3s\db\access\BaseAccess;

use ed\db\beans\DBSystemsHashBean;
use ed\db\beans\DBSystemsSearchBean;
use ed\db\beans\DBSystemsInBoxBean;
use ed\db\vectors\DBSystemsHashVector;
use ed\db\vectors\DBSystemsSearchVector;
use ed\db\vectors\DBSystemsInBoxVector;

class DBSystemsHashAccess extends BaseAccess {

	/**
	 * Enter description here ...
	 * @var DBSystemsHashAccess
	 */
	protected  static $__instance = null;

	/**
	 * @return DBSystemsHashAccess
	 */
	public static function getInstance() {
		if (self::$__instance == null) {
			$classname = __CLASS__;
			self::$__instance = new $classname();
		}
		return self::$__instance;
	}



	protected function __construct() {
		$this->con_name = "default";
		$this->tablename = "systems_hash";
	}

	
	public function insert(DBSystemsHashBean $bean) {
		
		$columns = array();
		$columns["population"] = $bean->getPopulation();
		$columns["name_stations"] = $bean->getNameStations();
		$columns["name"] = $bean->getName();
		$columns["x"] = $bean->getX();
		$columns["y"] = $bean->getY();
		$columns["name_lower"] = $bean->getNameLower();
		$columns["z"] = $bean->getZ();
		$columns["system_id"] = $bean->getSystemId();
		
		$res = $this->getConnection()->insertRow($this->tablename, $columns);
		$bean->setAutoincrementField($res);
		return $res;
	}

	
	/**
	 * @param SQLIntruder $intruder
	 * @return DBSystemsHashVector
	 */
	public function getTableRecords(SQLIntruder $intruder = null) {

		$result = $this->_getTableRecords($intruder);

		$ret = null;
		if ($result) {
			$ret = new DBSystemsHashVector();
			foreach ($result as $res) {
				$bean = new DBSystemsHashBean();
				$bean->fillBean($res);
				
				$ret[] = $bean;
			}
		}
		return $ret;
	}

	
	/**
	 *
	 * @return DBSystemsHashBean
	 */
	public function getByPrimaryKey($paramSystemId)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  system_id= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramSystemId));
		if ($result) {
			$ret = new DBSystemsHashBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return DBSystemsHashBean
	 */
	public function getByName($paramNameLower)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  name_lower= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramNameLower));
		if ($result) {
			$ret = new DBSystemsHashBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 * @return DBSystemsSearchVector
	 */
	public function getSystemsSearch($paramsearch) {
		$intruder = new SQLIntruder();
		

		$query = $intruder->getFullQuery();
		if ($query == null) {
			$record = $intruder->getRecordQuery();
			$from = $intruder->getFromQuery();
			$join = $intruder->getJoinQuery();
			$where = $intruder->getWhereQuery();
			$order = $intruder->getOrderQuery();
			$limit = $intruder->getLimitQuery();
			$query = " 				SELECT s.system_id, IF(ISNULL(s.name_stations), s.name, s.name_stations) as name 				FROM systems_hash s 				WHERE s.name_lower LIKE ? 				GROUP BY s.system_id 				ORDER BY s.name 				LIMIT 20 			";
		}

		
		$result =  $this->getConnection()->getTable($query , array($paramsearch));
		$ret = null;
		if ($result) {
				
			$ret = new DBSystemsSearchVector();
			foreach ($result as $res) {
				
				$bean = new DBSystemsSearchBean();
					
				$bean->fillBean($res);
				$ret[] = $bean;
			}
					
		}
			
		return $ret;
	}
	
	/**
	 * @return DBSystemsInBoxVector
	 */
	public function getSystemsInBox($paramx1, $paramx2, $paramy1, $paramy2, $paramz1, $paramz2) {
		$intruder = new SQLIntruder();
		

		$query = $intruder->getFullQuery();
		if ($query == null) {
			$record = $intruder->getRecordQuery();
			$from = $intruder->getFromQuery();
			$join = $intruder->getJoinQuery();
			$where = $intruder->getWhereQuery();
			$order = $intruder->getOrderQuery();
			$limit = $intruder->getLimitQuery();
			$query = " 				SELECT s.* 				FROM systems_hash s 				WHERE 1=1 				AND s.x BETWEEN ? AND ? 				AND s.y BETWEEN ? AND ? 				AND s.z BETWEEN ? AND ?				 			";
		}

		
		$result =  $this->getConnection()->getTable($query , array($paramx1, $paramx2, $paramy1, $paramy2, $paramz1, $paramz2));
		$ret = null;
		if ($result) {
				
			$ret = new DBSystemsInBoxVector();
			foreach ($result as $res) {
				
				$bean = new DBSystemsInBoxBean();
					
				$bean->fillBean($res);
				$ret[] = $bean;
			}
					
		}
			
		return $ret;
	}
	
}