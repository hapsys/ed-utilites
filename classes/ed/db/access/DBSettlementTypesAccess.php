<?php
/**
 *  Autogenerated class
 */
 
namespace ed\db\access;

use c3s\db\intruders\SQLIntruder;
use c3s\db\access\BaseAccess;

use ed\db\beans\DBSettlementTypesBean;
use ed\db\vectors\DBSettlementTypesVector;

class DBSettlementTypesAccess extends BaseAccess {

	/**
	 * Enter description here ...
	 * @var DBSettlementTypesAccess
	 */
	protected  static $__instance = null;

	/**
	 * @return DBSettlementTypesAccess
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
		$this->tablename = "settlement_types";
	}

	
	public function insert(DBSettlementTypesBean $bean) {
		
		$columns = array();
		$columns["title"] = $bean->getTitle();
		$columns["type"] = $bean->getType();
		
		$res = $this->getConnection()->insertRow($this->tablename, $columns);
		$bean->setAutoincrementField($res);
		return $res;
	}

	
	/**
	 * @param SQLIntruder $intruder
	 * @return DBSettlementTypesVector
	 */
	public function getTableRecords(SQLIntruder $intruder = null) {

		$result = $this->_getTableRecords($intruder);

		$ret = null;
		if ($result) {
			$ret = new DBSettlementTypesVector();
			foreach ($result as $res) {
				$bean = new DBSettlementTypesBean();
				$bean->fillBean($res);
				
				$ret[] = $bean;
			}
		}
		return $ret;
	}

	
	/**
	 *
	 * @return DBSettlementTypesBean
	 */
	public function getByPrimaryKey($paramSettlementTypeId)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  settlement_type_id= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramSettlementTypeId));
		if ($result) {
			$ret = new DBSettlementTypesBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return DBSettlementTypesVector
	 */
	public function getSorted()  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			$sql .= " ORDER BY type ";
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			
		}
		$result = $this->getConnection()->getTable($sql, array());
		if ($result) {
			$ret = new DBSettlementTypesVector();
			
			foreach ($result as $res) {
				$bean = new DBSettlementTypesBean();
				$bean->fillBean($res);
				
				$ret[] = $bean;
			}
				
		}
		return $ret;
	}
	
	/**
	 *
	 * @return DBSettlementTypesBean
	 */
	public function getByType($paramType)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  type= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramType));
		if ($result) {
			$ret = new DBSettlementTypesBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return int
	 */
	public function updateByPrimaryKey(DBSettlementTypesBean $bean, $paramSettlementTypeId) {
		
		$keys = array();
		 
		$keys["settlement_type_id"] =  $paramSettlementTypeId;
		 
		return $this->getConnection()->updateRow("settlement_types", $bean->__toArray(false), $keys);
	}
	
}