<?php
class DataReader {
	
	private $data;
	
	private $length;
	
	private $offset;
	
	/**
	 * new instance of DataReader
	 * 
	 * @param string  $filename
	 * @param integer $page_length
	 * @param integer $offest optional
	 * 
	 * @return void
	 */
	public function __construct($filename, $page_length, $offset = 0) {
		$this->length = $page_length;
		$this->offset = $offset;
		
		$fh = fopen($filename, 'r');
		$this->data = file($fh);
	}
	
	/**
	 * get array of row strings
	 * 
	 * @return array
	 */
	public function getRows() {
		return array_slice($this->data, $this->offset, $this->length);
	}
}

