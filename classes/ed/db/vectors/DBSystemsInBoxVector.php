<?php
/**
 *  Autogenerated class
 */

namespace ed\db\vectors;


use c3s\lib\dc\XMLVector;
use ed\db\beans\DBSystemsInBoxBean;


class DBSystemsInBoxVector extends XMLVector {
	/**
	 * Enter description here ...
	 * @return DBSystemsInBoxBean
	 */
	protected function getNewElement() {
		$element = new DBSystemsInBoxBean();
		return $element;
	}
	
	/**
	 * Enter description here ...
	 * @return DBSystemsInBoxBean
	 */
	public function offsetGet($offset) {
		return parent::offsetGet($offset);
	}
	
	/**
	 * Enter description here ...
	 * @param $value DBSystemsInBoxBean
	 */
	public function offsetSet($offset, $value) {
		parent::offsetSet($offset, $value);
	}
	
	/**
	 * Enter description here ...
	 * @return DBSystemsInBoxBean
	 */
	public function current() {
		return parent::current();
	}
	
	/**
	 * Enter description here ...
	 * @return DBSystemsInBoxBean
	 */
	public function get($index) {
		return parent::get($index);
	}
	
	/**
	 * Enter description here ...
	 * @param $element DBSystemsInBoxBean
	 */
	public function add($element) {
		parent::add($element);
	}
	
	/**
	 * Enter description here ...
	 * @param $vector DBSystemsInBoxBean
	 */
	public function append($vector) {
		parent::append($vector);
	}
	
	
}