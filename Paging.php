<?php
class Paging {
	
	private $_pageIndex = 1;
	
	private $_pageSize = 3;
	
	private $_header;
	
	/**
	 * 
	 * @var array
	 */
	private $_data;
	
	/**
	 * 
	 * @param array $records array of record objects
	 */
	private function _storeRecords($records) {
		$this->_data = $records;
		$this->_header = array_shift($this->_data);
	}
	
	public function extractFirstPage($records) {
		$this->_pageIndex = 1;
		return $this->getPage($records);		
	}
	
	public function extractNextPage($records) {
		if ($this->_pageIndex < $this->getPageCount()) {
			$this->_pageIndex++;
		}
		return $this->getPage($records);
	}
	
	public function extractPreviousPage($records) {
		if ($this->_pageIndex > 1) {
			$this->_pageIndex--;
		}
		return $this->getPage($records);
	}
	
	public function getPage($records) {
		$this->_storeRecords($records);
		$page = new Page($this->_header, $this->_getRecordsForPage($this->_pageIndex), $this->getPageCount(), $this->_pageIndex);
		
		return $page;
	}
	
	/**
	 * 
	 * @return ArrayIterator
	 */
 	private function _getRecordsForPage($pageNo) {
		$records = new ArrayIterator();
		
		$currentPageFirstLine = $pageNo * $this->_pageSize;
		
		for ($i = $currentPageFirstLine; $i < $currentPageFirstLine + $this->_pageSize; $i++) {
			$records->append($this->_data[$i]);
		}
		
		return $records;
	}

	
	private function getPageCount() {
		return ceil(count($this->_data) / $this->_pageSize);
	}
	
	public function getPageIndex() {
		return $this->_pageIndex;
	}
}

?>