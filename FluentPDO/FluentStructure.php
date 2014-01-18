<?php

namespace FluentPDO;

class FluentStructure {

	private $primaryKey, $foreignKey, $sequenceKey;

	function __construct($primaryKey = 'id', $foreignKey = '%s_id', $sequenceKey = '%s_id_seq') {
		if ($foreignKey === null) {
			$foreignKey = $primaryKey;
		}
		$this->primaryKey = $primaryKey;
		$this->foreignKey = $foreignKey;
		$this->sequenceKey = $sequenceKey;
	}

	public function getPrimaryKey($table) {
		return $this->key($this->primaryKey, $table);
	}

	public function getForeignKey($table) {
		return $this->key($this->foreignKey, $table);
	}

	public function getSequenceName($table) {
	    return $this->key($this->sequenceKey, $table);
	}

	private function key($key, $table) {
		if (is_callable($key)) {
			return $key($table);
		}
		return sprintf($key, $table);
	}
}
