<?php
/**
 *  Autogenerated class
 */

namespace ed\db\vectors;


use c3s\lib\dc\XMLVector;
use ed\db\beans\DBStationsBean;


class DBStationsVector extends XMLVector {
	/**
	 * Enter description here ...
	 * @return DBStationsBean
	 */
	protected function getNewElement() {
		$element = new DBStationsBean();
		return $element;
	}
	
	/**
	 * Enter description here ...
	 * @return DBStationsBean
	 */
	public function offsetGet($offset) {
		return parent::offsetGet($offset);
	}
	
	/**
	 * Enter description here ...
	 * @param $value DBStationsBean
	 */
	public function offsetSet($offset, $value) {
		parent::offsetSet($offset, $value);
	}
	
	/**
	 * Enter description here ...
	 * @return DBStationsBean
	 */
	public function current() {
		return parent::current();
	}
	
	/**
	 * Enter description here ...
	 * @return DBStationsBean
	 */
	public function get($index) {
		return parent::get($index);
	}
	
	/**
	 * Enter description here ...
	 * @param $element DBStationsBean
	 */
	public function add($element) {
		parent::add($element);
	}
	
	/**
	 * Enter description here ...
	 * @param $vector DBStationsBean
	 */
	public function append($vector) {
		parent::append($vector);
	}
	
	
}