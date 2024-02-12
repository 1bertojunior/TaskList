<?php

class Task {
	private $id;
    private $statusId;
    private $name;
    private $created_at;

	public function __get($attr) {
		return $this->$attr;
	}

	public function __set($attr, $value) {
		$this->$attr = $value;
		return $this;
	}
}

?>