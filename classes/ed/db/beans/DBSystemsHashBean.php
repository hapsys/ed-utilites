<?php
/**
 *  Autogenerated class
 */

namespace ed\db\beans;

use c3s\db\containers\BaseBean;


class DBSystemsHashBean extends BaseBean {
	public function __construct() {
		
		$this->_map["Population"] = "population";
		$this->_map["NameStations"] = "name_stations";
		$this->_map["Name"] = "name";
		$this->_map["X"] = "x";
		$this->_map["Y"] = "y";
		$this->_map["NameLower"] = "name_lower";
		$this->_map["Z"] = "z";
		$this->_map["SystemId"] = "system_id";
		$this->_aliases["population"] = "int";
		$this->_aliases["name_stations"] = "string";
		$this->_aliases["name"] = "string";
		$this->_aliases["x"] = "double";
		$this->_aliases["y"] = "double";
		$this->_aliases["name_lower"] = "string";
		$this->_aliases["z"] = "double";
		$this->_aliases["system_id"] = "int";
	}


	/**
	 * @var int
	 */
    private $_varPopulation;

	/**
	 * @return int
	 */
	public function getPopulation() {
		return $this->_varPopulation;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setPopulation($value) {
		$this->_varPopulation = $value;
		return $this;
	}
	

	/**
	 * @var string
	 */
    private $_varNameStations;

	/**
	 * @return string
	 */
	public function getNameStations() {
		return $this->_varNameStations;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setNameStations($value) {
		$this->_varNameStations = $value;
		return $this;
	}
	

	/**
	 * @var string
	 */
    private $_varName;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->_varName;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setName($value) {
		$this->_varName = $value;
		return $this;
	}
	

	/**
	 * @var double
	 */
    private $_varX;

	/**
	 * @return double
	 */
	public function getX() {
		return $this->_varX;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setX($value) {
		$this->_varX = $value;
		return $this;
	}
	

	/**
	 * @var double
	 */
    private $_varY;

	/**
	 * @return double
	 */
	public function getY() {
		return $this->_varY;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setY($value) {
		$this->_varY = $value;
		return $this;
	}
	

	/**
	 * @var string
	 */
    private $_varNameLower;

	/**
	 * @return string
	 */
	public function getNameLower() {
		return $this->_varNameLower;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setNameLower($value) {
		$this->_varNameLower = $value;
		return $this;
	}
	

	/**
	 * @var double
	 */
    private $_varZ;

	/**
	 * @return double
	 */
	public function getZ() {
		return $this->_varZ;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setZ($value) {
		$this->_varZ = $value;
		return $this;
	}
	

	/**
	 * @var int
	 */
    private $_varSystemId;

	/**
	 * @return int
	 */
	public function getSystemId() {
		return $this->_varSystemId;
	}

	/**
	 * @param string $value
	 * @return DBSystemsHashBean
	 */
	public function setSystemId($value) {
		$this->_varSystemId = $value;
		return $this;
	}
	
	public function setAutoincrementField($value) {
		
	}
	
}