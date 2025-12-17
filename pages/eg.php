<?php 

    class Sqlcommands { 
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            // Constructor can be empty or used for initialization if needed
            $this->pdo = $pdo;
        }
       

        public function insert(string $table, array $fields, array $values) {
            $sql = "INSERT INTO " . $table . "(" ; 
            $sql .= implode("," , $fields) . ") VALUES (";
            $sql .= implode("," , $values) . ")";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $this->pdo->lastInsertId();
        }

        public function select($table, $fields, $condition="", $order) {
            $sql = "SELECT ";
            $sql .= implode(",", $fields) . " FROM ";
            $sql .= $table;
            if ($condition != "") {
                $sql .= " WHERE " . $condition;
            } 
        
            if ($order === "id_desc") {
                $sql .= " ORDER BY id DESC";   
            } elseif ($order === "id_asc") {
                $sql .= " ORDER BY id ASC";
            } 

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function count($table, $condition="") {
            $countpost = "SELECT COUNT(*) FROM " . $table;
            if ($condition != "") {
                $countpost .= " WHERE " . $condition;
            } 
                return $countpost;
        }

        public function update($table, $fields, $values, $condition){
            $updatepost = " UPDATE " . $table . " SET ";
            $setClauses = [];
            for ($i = 0; $i < count($fields); $i++) {
                $setClauses[] = $fields[$i] . " = " . $values[$i];
            }
            $updatepost .= implode(", ", $setClauses);
            if ($condition != "") {
                $updatepost .= " WHERE " . $condition;
            }
                return $updatepost;
            
        }
        public function delete($table, $id) {
            $deletepost = " DELETE FROM " . $table;
            $deletepost .= " WHERE id = " . $id;
            return $deletepost;
        }




        
    }

  ?> 