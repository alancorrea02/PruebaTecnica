<?php
    class MysqlStructure {
        private $dbName = 'preinscripciones';
        private $password = 'admin';
        private $host = 'localhost';
        private $user = 'alan';
        public $connection;
        public $sql;
        public function __construct(){
            $this->sql = '';
            try{
                $this->connection = mysqli_connect($this->host,$this->user,$this->password,$this->dbName);
                echo "Conexion exitosa";
            }catch(mysqli_sql_exception $e){
                header('Location: ../vistas/error.php');
            }
        }
        public function executeQuery(){
            $data = array();
            if(is_string($this->sql) and !empty($this->sql)){
                try{
                    $result = $this->connection->query($this->sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            array_push($data,$row);
                        }
                    }else{
                        $data = null;
                    }
                }catch(Exception $e){
                    $data = null;
                }finally{
                    return $data;
                }   
            }else{
                return null;
            }
        }
        public function getSingleResult(){
            if(is_string($this->sql) and !empty($this->sql)){
                $result = mysqli_query($this->connection,$this->sql);
                if(mysqli_num_rows($result) > 0){
                    return mysqli_fetch_assoc($result);
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        public function closeConnection(){
            mysqli_close($this->connection);
        }

        public function setSql($sql)
        {
                $this->sql = $sql;
        }
        public function getSql()
        {
                return $this->sql;
        }
    }
?>