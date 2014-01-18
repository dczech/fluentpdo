<?php

namespace FluentPDO;

/** DELETE query builder
 *
 */
class DeleteQuery extends CommonQuery {

	public function __construct(FluentPDO $fpdo, $table) {
		$clauses = array(
			'DELETE FROM' => array($this, 'getClauseDeleteFrom'),
			'WHERE' => ' AND ',
		);

		parent::__construct($fpdo, $clauses);

		$this->statements['DELETE FROM'] = $table;
	}

	/** Execute DELETE query
	 * @return boolean
	 */
	public function execute() {
		$result = parent::execute();
		if ($result) {
			return $result->rowCount();
		}
		return false;
	}

	protected function getClauseDeleteFrom() {
		return 'DELETE FROM ' . $this->statements['DELETE FROM'];
	}
}
