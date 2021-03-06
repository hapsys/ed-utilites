<?php
/**
 *  Autogenerated class
 */
 
namespace ed\db\access;

use c3s\db\intruders\SQLIntruder;
use c3s\db\access\BaseAccess;

use ed\db\beans\DBFactionsBean;
use ed\db\vectors\DBFactionsVector;

class DBFactionsAccess extends BaseAccess {

	/**
	 * Enter description here ...
	 * @var DBFactionsAccess
	 */
	protected  static $__instance = null;

	/**
	 * @return DBFactionsAccess
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
		$this->tablename = "factions";
	}

	
	public function insert(DBFactionsBean $bean) {
		
		$columns = array();
		$columns["faction_name_lower"] = $bean->getFactionNameLower();
		$columns["faction_name"] = $bean->getFactionName();
		
		$res = $this->getConnection()->insertRow($this->tablename, $columns);
		$bean->setAutoincrementField($res);
		return $res;
	}

	
	/**
	 * @param SQLIntruder $intruder
	 * @return DBFactionsVector
	 */
	public function getTableRecords(SQLIntruder $intruder = null) {

		$result = $this->_getTableRecords($intruder);

		$ret = null;
		if ($result) {
			$ret = new DBFactionsVector();
			foreach ($result as $res) {
				$bean = new DBFactionsBean();
				$bean->fillBean($res);
				
				$ret[] = $bean;
			}
		}
		return $ret;
	}

	
	/**
	 *
	 * @return DBFactionsBean
	 */
	public function getByPrimaryKey($paramFactionId)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  faction_id= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramFactionId));
		if ($result) {
			$ret = new DBFactionsBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return DBFactionsBean
	 */
	public function getByUniq($paramFactionNameLower)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  faction_name_lower= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramFactionNameLower));
		if ($result) {
			$ret = new DBFactionsBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return int
	 */
	public function updateByPrimaryKey(DBFactionsBean $bean, $paramFactionId) {
		
		$keys = array();
		 
		$keys["faction_id"] =  $paramFactionId;
		 
		return $this->getConnection()->updateRow("factions", $bean->__toArray(false), $keys);
	}
	
}