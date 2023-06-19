<?php
    class model {
        public $conn = "";
        
        public function __construct() {
            $this->conn = new mysqli('localhost', 'root', '', 'crud_opration');
        }

        public function select($table) {
            $select = "SELECT * FROM $table";
            $run = $this->conn->query($select);

            $array = array();
            while($fetch = $run->fetch_object()) {
                $array[] = $fetch;
            }

            return $array;
        }

        public function insert($table, $array) {
            $col_array = array_keys($array);
            $col = implode(',', $col_array);

            $value_array = array_values($array);
            $value = implode("','", $value_array);

            $insert = "INSERT INTO $table ($col) VALUES ('$value')";
            $run = $this->conn->query($insert);

            return $run;
        }

        public function delete_where($table, $where) {
            $col_array = array_keys($where);
            $value_array = array_values($where);

            $delete = "DELETE FROM $table WHERE 1=1";
            $i = 0;

            foreach($where as $w) {
                echo $delete .= " AND $col_array[$i] = '$value_array[$i]'";
                $i++;
            }
            $run = $this->conn->query($delete);

            return $run;
        }

        public function update($table, $array, $where){
            $col_array = array_keys($array);
            $value_array = array_values($array);
            $update = "UPDATE $table SET ";
            $j = 0;

            $count = count($array);
            foreach($array as $arr) {
                if ($count == $j+1) {
                    $update .= "$col_array[$j] = '$value_array[$j]'";
                } else {
                    $update .= "$col_array[$j] = '$value_array[$j]',";
                    $j++;
                }
            }

            $wcol_array = array_keys($where);
            $wvalue_array = array_values($where);
            $update .= " WHERE 1=1";
            
            $i = 0;
            foreach($where as $w) {
                $update .= " AND $wcol_array[$i] = '$wvalue_array[$i]'";
                $i++;
            }

            $run = $this->conn->query($update);
            return $run;
        }

        public function select_where($table, $where) {
            $col_array = array_keys($where);
            $value_array = array_values($where);
            $select = "SELECT * FROM $table WHERE 1=1";

            $i = 0;
            foreach($where as $w) {
                $select .= " AND $col_array[$i] = '$value_array[$i]'";
                $i++;
            }

            $run = $this->conn->query($select);
            return $run;
        }
    }
$obj = new model();
?>