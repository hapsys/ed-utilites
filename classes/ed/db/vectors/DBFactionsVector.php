<?php
/**
 *  Autogenerated class
 */

namespace ed\db\vectors;


use c3s\lib\dc\XMLVector;
use ed\db\beans\DBFactionsBean;


class DBFactionsVector extends XMLVector {
	/**
	 * Enter description here ...
	 * @return DBFactionsBean
	 */
	protected function getNewElement() {
		$element = new DBFactionsBean();
		return $element;
	}
	
	/**
	 * Enter description here ...
	 * @return DBFactionsBean
	 */
	public function offsetGet($offset) {
		return parent::offsetGet($offset);
	}
	
	/**
	 * Enter description here ...
	 * @param $value DBFactionsBean
	 */
	public function offsetSet($offset, $value) {
		parent::offsetSet($offset, $value);
	}
	
	/**
	 * Enter description here ...
	 * @return DBFactionsBean
	 */
	public function current() {
		return parent::current();
	}
	
	/**
	 * Enter description here ...
	 * @return DBFactionsBean
	 */
	public function get($index) {
		return parent::get($index);
	}
	
	/**
	 * Enter description here ...
	 * @param $element DBFactionsBean
	 */
	public function add($element) {
		parent::add($element);
	}
	
	/**
	 * Enter description here ...
	 * @param $vector DBFactionsBean
	 */
	public function append($vector) {
		parent::append($vector);
	}
	
	
}