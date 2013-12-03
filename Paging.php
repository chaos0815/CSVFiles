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
		$page = new Page();
		
		$currentPageFirstLine = $this->_pageIndex * $this->_pageSize;
		
		for ($i = $currentPageFirstLine; $i < $currentPageFirstLine + $this->_pageSize; $i++) {
			$page->addRow($this->_data->offsetGet($i));
		}
		
		return $page;
		
	}
	
	public function extractNextPage() {
	
	}
	
	public function getPage($page_number) {
		
	}
	
	public function getPageIndex() {
		return $this->_pageIndex;
	}
}

?>