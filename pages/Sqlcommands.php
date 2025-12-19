<?php 

    class Sqlcommands { 
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            // Constructor can be empty or used for initialization if needed
            $this->pdo = $pdo;
        }
       

        public function insert(string $table, array $fields, array $values) {
            $placeholders = array_fill(0, count($values), "?");
            $sql = "INSERT INTO " . $table . "(" ; 
            $sql .= implode("," , $fields) . ") VALUES (";
            $sql .= implode("," , $placeholders) . ")";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($values);

            return $this->pdo->lastInsertId();
        }

        public function select($table, $fields, $condition="", $params = [], $order = "", $limit = null, $offset = null) {
            $sql = "SELECT ";
            $sql .= implode(",", $fields) . " FROM ";
            $sql .= $table;
            if ($condition !== "") {
                $sql .= " WHERE " . $condition;
            } 
        
            if ($order === "id_desc") {
                $sql .= " ORDER BY id DESC";   
            } elseif ($order === "id_asc") {
                $sql .= " ORDER BY id ASC";
            } 
            
            if ($limit !== null) {
               $sql .= " LIMIT " . (int)$limit;
            }

            if ($offset !== null) {
               $sql .= " OFFSET " . (int)$offset;
            }
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function count($table, $condition="") {
            $sql = "SELECT COUNT(*) FROM " . $table;
            if ($condition != "") {
                $sql .= " WHERE " . $condition;
            } 
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchColumn();
        }

    public function update($table, $fields, $values, $condition = "", $conditionParams = []) {
        $sql = "UPDATE " . $table . " SET ";
        $setClauses = [];
        $params = [];

        for ($i = 0; $i < count($fields); $i++) {
            $setClauses[] = $fields[$i] . " = ?";
            $params[] = $values[$i];
        }

        $sql .= implode(", ", $setClauses);

        if ($condition != "") {
            $sql .= " WHERE " . $condition;
            $params = array_merge($params, $conditionParams);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->rowCount();
    }

        public function delete($table, $id) {
            $sql = " DELETE FROM " . $table;
            $sql .= " WHERE id = " . $id;


            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }




        
    }

  ?> 