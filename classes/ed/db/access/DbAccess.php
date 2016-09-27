<?php namespace ed\db\access;

class DbAccess {

	public static function systemsAccess() { return \ed\db\access\DBSystemsAccess::getInstance(); }
	public static function stationsAccess() { return \ed\db\access\DBStationsAccess::getInstance(); }
	public static function factionsAccess() { return \ed\db\access\DBFactionsAccess::getInstance(); }
	public static function systemsHashAccess() { return \ed\db\access\DBSystemsHashAccess::getInstance(); }
	public static function settlementsAccess() { return \ed\db\access\DBSettlementsAccess::getInstance(); }
	public static function settlementTypesAccess() { return \ed\db\access\DBSettlementTypesAccess::getInstance(); }

}
