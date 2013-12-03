<?php
class Paging {
	
	private $_pageIndex = 0;
	
	private $_pageSize = 3;
	
	/**
	 * 
	 * @var Record
	 */
	private $_data;
	
	/**
	 * 
	 * @param Record $record record object
	 */
	public function __construct($record) {
		$this->_data = $record;
	}
	
	public function extractFirstPage() {
		$this->_pageIndex = 0;
		return $this->getPage();		
	}
	
	public function extractNextPage() {
		$this->_pageIndex++;
		return $this->getPage();
	}
	
	public function getPage() {
		$page = new Page();
		
		$currentPageFirstLine = $this->_pageIndex * $this->_pageSize;
		
		for ($i = $currentPageFirstLine; $i < $currentPageFirstLine + $this->_pageSize; $i++) {
			$page->addRow($this->_data->offsetGet($i));
		}
		
		return $page;
	}
	
	public function getPageIndex() {
		return $this->_pageIndex;
	}
}

?>