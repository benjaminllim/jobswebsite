<?php
namespace CSY2028;

class DatabaseTable {

    public $pdo;
    public $table;
    public $primarykey;
    private $entityclass;
    private $entityconstructor;
    private $droptable;

    public function __construct($pdo, $table, $primarykey, $entityclass = 'stdclass', $entityconstructor = []){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primarykey = $primarykey;
        $this->entityclass = $entityclass;
		$this->entityconstructor = $entityconstructor;
    }

    public function find($field, $value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $stmt ->setFetchMode(\PDO::FETCH_CLASS, $this->entityclass, $this->entityconstructor);
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
 
        }

    public function findAll($orderby = null, $limit = null) {
        $stmt = 'SELECT * FROM ' . $this->table;
        
        if ($orderby != null) {
			$stmt .= ' ORDER BY ' . $orderby;
        }
        
        if ($limit != null) {
			$stmt .= ' LIMIT ' . $limit;
		}

        $stmts = $this->query($stmt);
        return $stmts->fetchAll(\PDO::FETCH_CLASS, $this->entityclass, $this->entityconstructor);
      
     }

     private function query($sql, $criteria = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($criteria);
        return $stmt;
    }

    //So that duplicate locations don't show up in the dropdown
    public function dropdown($field, $droptable) {
        $stmt = $this->pdo->prepare('SELECT DISTINCT ' . $field .  ' FROM ' . $droptable);
        $stmt ->setFetchMode(\PDO::FETCH_CLASS, $this->entityclass, $this->entityconstructor);
        $stmt->execute();
        return $stmt->fetchAll();
}


    public function total($field = null, $value = null) {
		$sql = 'SELECT COUNT(*) FROM `' . $this->table . '`';
		$parameters = [];

		if (!empty($field)) {
			$sql .= ' WHERE `' . $field . '` = :value';
			$parameters = ['value' => $value];
		}
		
		$query = $this->query($sql, $parameters);
		$row = $query->fetch();
		return $row[0];
	}


    public function insert($record) {
	        $keys = array_keys($record);

	        $values = implode(', ', $keys);
	        $valuesWithColon = implode(', :', $keys);

	        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

	        $stmt = $this->pdo->prepare($query);

	        $stmt->execute($record);
	}

    public function update($record) {
            $query = 'UPDATE ' . $this->table . ' SET ';
            $parameters = [];
            foreach ($record as $key => $value) {
            $parameters[] = $key . ' = :' .$key;
            }
            $query .= implode(', ', $parameters);
            $query .= ' WHERE ' . $this->primarykey . ' = :primarykey';
            $record['primarykey'] = $record[$this->primarykey];
            $stmt = $this->pdo->prepare($query);
            
        $stmt->execute($record);
        
        }


    public function delete($id) {
            $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primarykey . ' = :id');
            $criteria = [
                'id' => $id
            ];
            $stmt->execute($criteria);
        } 

    /*public function save($record) {
        try {
            $this->insert($record);
        } catch (Exception $e) {
            $this->update($record);
        }
    
    }*/

    public function save($record) {
		$entity = new $this->entityclass(...$this->entityconstructor);

		try {
			if ($record[$this->primarykey] == '') {
				$record[$this->primarykey] = null;
			}
			$insertid = $this->insert($record);

			$entity->{$this->primarykey} = $insertid;
		}
		catch (\PDOException $e) {
			$this->update($record);
		}
        
		return $entity;	
	} 



}