<?php
/**
 * Parse an array into a collection
 * 
 **/
class DataParser {
	
	private $_delimiter = ';';
	private $_data;
	
	/**
	 * constructor
	 * 
	 * @param array $data array of strings of csv 
	 */
	public function __construct(array $data) {
		$this->_data = $data;
	}
	
	/**
	 * getPage 
	 * 
	 * @return ArrayIterator the array of line elements
	 */
	public function getPage() {
		$page = new ArrayIterator(array());
		
		foreach ($this->_data as $line) {
			$row = explode($this->_delimiter, $line);
			$page->append($row);
		}
		
		return $page;
	}
	
	/**
	 * set the delimiter for exploding lines
	 * 
	 * @param string $delimiter the delimiter
	 * 
	 * @return void
	 */
	public function setDelimiter($delimiter) {
		$this->_delimiter = $delimiter;
	}
}
