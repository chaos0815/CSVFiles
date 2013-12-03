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
	public function __construct($records) {
		$this->_data = $records;
		$this->_header = array_shift($this->_data);
	}
	
	public function extractFirstPage() {
		$this->_pageIndex = 1;
		return $this->getPage();		
	}
	
	public function extractNextPage() {
		$this->_pageIndex++;
		return $this->getPage();
	}
	
	public function getPage() {
		$page = new Page($this->_header, $this->_getRecordsForCurrentPage(), $this->getPageCount(), $this->_pageIndex);
		
		return $page;
	}
	
	/**
	 * 
	 * @return ArrayIterator
	 */
 	private function _getRecordsForCurrentPage() {
		$records = new ArrayIterator();
		
		$currentPageFirstLine = $this->_pageIndex * $this->_pageSize;
		
		for ($i = $currentPageFirstLine; $i < $currentPageFirstLine + $this->_pageSize; $i++) {
			$records->append($this->_data->offsetGet($i));
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