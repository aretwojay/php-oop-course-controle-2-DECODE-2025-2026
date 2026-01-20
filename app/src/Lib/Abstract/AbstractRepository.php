<?php


namespace App\Lib\Abstract;

use App\Lib\PDO\Database;

class AbstractRepository {

   	private function connect(): \PDO {
	    $database = new Database();
        return $database->connect();
	}
    
    private function executeQuery(string $query, array $params = []): \PDOStatement {
		$db = $this->connect();
		$stmt = $db->prepare($query);
		foreach ($params as $key => $param) $stmt->bindValue($key, $param);
		$stmt->execute();
		return $stmt;
	}

    private function getTableName(string $class): string {
		if (defined($class . '::TABLE_NAME')) {
			$table = $class::TABLE_NAME;
		} else {
			$tmp = explode('\\', $class);
			$table = strtolower(end($tmp));
		}
		return $table;
	}

	protected function readOne(string $class, array $filters): mixed {
		$query = 'SELECT * FROM ' . $this->getTableName($class) . ' WHERE ';
		foreach (array_keys($filters) as $filter) {
			$query .= $filter . " = :" . $filter;
			if ($filter != array_key_last($filters)) $query .= ' AND ';
		}
		$stmt = $this->executeQuery($query, $filters);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
		return $stmt->fetch();
	}

	protected function readMany(string $class, array $filters = [], array $order = [], int|null $limit = null, int|null $offset = null, array $joins = []): mixed {
		$query = 'SELECT ' . $this->getTableName($class) . '.* FROM ' . $this->getTableName($class);
		foreach ($joins as $join) {
			$query .= ' INNER JOIN ' . $join['table'] . ' ON ' . $join['condition'];
		}
		if (!empty($filters)) {
			$query .= ' WHERE ';
			foreach (array_keys($filters) as $filter) {
				$query .= $filter . " = :" . $filter;
				if ($filter != array_key_last($filters)) $query .= ' AND ';
			}
		}
		if (!empty($order)) {
			$query .= ' ORDER BY ';
			foreach ($order as $key => $val) {
				$query .= $key . ' ' . $val;
				if ($key != array_key_last($order)) $query .= ', ';
			}
		}
		if (isset($limit)) {
			$query .= ' LIMIT ' . $limit;
			if (isset($offset)) {
				$query .= ' OFFSET ' . $offset;
			}
		}
		$stmt = $this->executeQuery($query, $filters);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
		return $stmt->fetchAll();
	}
}