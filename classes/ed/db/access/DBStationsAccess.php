<?php
/**
 *  Autogenerated class
 */
 
namespace ed\db\access;

use c3s\db\intruders\SQLIntruder;
use c3s\db\access\BaseAccess;

use ed\db\beans\DBStationsBean;
use ed\db\vectors\DBStationsVector;

class DBStationsAccess extends BaseAccess {

	/**
	 * Enter description here ...
	 * @var DBStationsAccess
	 */
	protected  static $__instance = null;

	/**
	 * @return DBStationsAccess
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
		$this->tablename = "stations";
	}

	
	public function insert(DBStationsBean $bean) {
		
		$columns = array();
		$columns["has_outfitting"] = $bean->getHasOutfitting();
		$columns["max_landing_pad_size"] = $bean->getMaxLandingPadSize();
		$columns["station_id"] = $bean->getStationId();
		$columns["faction"] = $bean->getFaction();
		$columns["distance_to_star"] = $bean->getDistanceToStar();
		$columns["state"] = $bean->getState();
		$columns["has_rearm"] = $bean->getHasRearm();
		$columns["is_planetary"] = $bean->getIsPlanetary();
		$columns["has_docking"] = $bean->getHasDocking();
		$columns["updated_at"] = $bean->getUpdatedAt();
		$columns["allegiance"] = $bean->getAllegiance();
		$columns["has_blackmarket"] = $bean->getHasBlackmarket();
		$columns["name"] = $bean->getName();
		$columns["has_commodities"] = $bean->getHasCommodities();
		$columns["type_id"] = $bean->getTypeId();
		$columns["has_refuel"] = $bean->getHasRefuel();
		$columns["economies"] = $bean->getEconomies();
		$columns["has_shipyard"] = $bean->getHasShipyard();
		$columns["type"] = $bean->getType();
		$columns["government"] = $bean->getGovernment();
		$columns["has_repair"] = $bean->getHasRepair();
		$columns["system_id"] = $bean->getSystemId();
		$columns["has_market"] = $bean->getHasMarket();
		
		$res = $this->getConnection()->insertRow($this->tablename, $columns);
		$bean->setAutoincrementField($res);
		return $res;
	}

	
	/**
	 * @param SQLIntruder $intruder
	 * @return DBStationsVector
	 */
	public function getTableRecords(SQLIntruder $intruder = null) {

		$result = $this->_getTableRecords($intruder);

		$ret = null;
		if ($result) {
			$ret = new DBStationsVector();
			foreach ($result as $res) {
				$bean = new DBStationsBean();
				$bean->fillBean($res);
				
				$ret[] = $bean;
			}
		}
		return $ret;
	}

	
	/**
	 *
	 * @return DBStationsBean
	 */
	public function getByPrimaryKey($paramStationId)  {
		$ret = null;
		$intruder = new SQLIntruder();
		
		$sql = "SELECT t.* ".$intruder->getRecordQuery()." FROM ".$this->tablename." as t ".$intruder->getFromQuery()." WHERE 1=1 AND  station_id= ?  ".$intruder->getWhereQuery()." ";
		if ($intruder->getOrderQuery()) {
			$sql .= $intruder->getOrderQuery();
		} else {
			
		}
		if ($intruder->getLimitQuery()) {
			$sql .= $intruder->getLimitQuery();
		} else {
			$sql .= " LIMIT 1 ";
		}
		$result = $this->getConnection()->getTable($sql, array($paramStationId));
		if ($result) {
			$ret = new DBStationsBean();
			
			$ret->fillBean($result[0]);
			
		}
		return $ret;
	}
	
	/**
	 *
	 * @return int
	 */
	public function updateByPrimaryKey(DBStationsBean $bean, $paramStationId) {
		
		$keys = array();
		 
		$keys["station_id"] =  $paramStationId;
		 
		return $this->getConnection()->updateRow("stations", $bean->__toArray(false), $keys);
	}
	
}