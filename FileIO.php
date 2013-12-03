<?php
class FileIO {

	private $data;
	private $header;

	private $length;

	private $offset;

	/**
	 * new instance of FileIO
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

		$this->data = file($filename);
		if ($this->data === false) {
			throw new RuntimeException('File not Found: '.$filename);
		}

		$this->header = array_shift($this->data);

	}

	/**
	 * get array of row strings
	 *
	 * @return array
	 */
	public function getRows() {
		$data = array_slice($this->data, $this->offset, $this->length);
		array_unshift($data, $this->header);
		return $data;
	}

}
