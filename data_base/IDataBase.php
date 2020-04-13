<?php
    interface IDataBase
    {
        public function select($table_name, $conditions);
        public function insert($table_name, $columns, $values);
        public function update($table_name, $columns, $values, $conditions);
        public function delete($table_name, $conditions);
    }
 ?>
