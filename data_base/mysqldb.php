<?php
    class MySQLdb implements IDataBase
    {
        public $mysqli = null;

        function __construct($connection_info){

            $this->mysqli = new mysqli($connection_info['ip'], $connection_info['login'], $connection_info['pass'], $connection_info['db']);

            if (!empty($mysqli) && $mysqli->connect_errno) {
                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
		}

        public function select($table_name, $conditions = null){
            $query = "SELECT * FROM $table_name";

            if(!empty($conditions)){

                $query .=  " WHERE ";
                foreach ($conditions as $condition) {
                    $query .= $condition.",";
                }
                $query = rtrim($query, ",");
            }
            $query .= ";";

            $res = $this->mysqli->query($query);
            $rows = null;

            for($i = 0; $i < $res->num_rows; $i++){
				$rows[$i] = $res->fetch_assoc();
			}

            return $rows;
        }

        public function insert($table_name, $columns, $values){
            $cols = "";
            foreach ($columns as $col) {
                $cols .= $col.",";
            }

            $vals = "";
            foreach ($values as $value) {
                $vals .= "$value,";
            }

            $cols = rtrim($cols, ",");
            $vals = rtrim($vals, ",");

            $query = "INSERT INTO $table_name ($cols) VALUES ($vals);";
            $this->mysqli->query($query);

            if(empty($this->mysqli->error))
                return "{$this->mysqli->insert_id}";
            else
                return "error";
        }

        public function update($table_name, $columns, $values, $conditions){
            $vals = "";
            foreach ($columns as $key => $col) {
                $vals .= $col." = ";
                $vals .= $values[$key].",";
            }

            $cols = rtrim($cols, ",");
            $query = "UPDATE $table_name SET $vals";
            $query = rtrim($query, ",");

            if(!empty($conditions)){
                $query .=  " WHERE ";
                foreach ($conditions as $condition) {
                    $query .= $condition.",";
                }
                $query = rtrim($query, ",");
            }
            $query .= ";";

            $this->mysqli->query($query);

            return "{$this->mysqli->insert_id}";
        }

        public function delete($table_name, $conditions){

            $query = "DELETE FROM $table_name";

            if(!empty($conditions)){
                $query .=  " WHERE ";
                foreach ($conditions as $condition) {
                    $query .= $condition.",";
                }
                $query = rtrim($query, ",");
            }
            $query .= ";";

            $this->mysqli->query($query);

            return "{$this->mysqli->insert_id}";
        }
    }
 ?>
