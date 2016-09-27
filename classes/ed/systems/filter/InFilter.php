<?php
namespace ed\systems\filter;
use c3s\db\intruders\SQLIntruder;

/**
 *
 * @author admin
 *        
 */
class InFilter extends SQLIntruder {

	protected $column = null;
	protected $values = null;
	/**
	 */
	public function __construct($column = false, $values = array()) {
		
		$this->column = $column;
		$this->values = $values;
		
	}
	
	public function getWhereQuery() {
		$result = '';
		
		if ($this->column && $this->values && count($this->values)) {
			$result = ' AND '.$this->column.' IN (';
			$zp = '';
			foreach ($this->values as $val) {
				$result .= $zp.(is_string($val)?'"'.$val.'"':$val);
				$zp = ',';
			}
			$result .= ') ';
		}
		
		return $result;
	}
}



