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
                //echo "Conexion exitosa";
            }catch(mysqli_sql_exception $e){
                header('Location: ../vistas/error.php');
            }
        }
        public function executeSoloQuery(){
            $data = array();
            if(is_string($this->sql) and !empty($this->sql)){
                try{
                    $result = $this->connection->query($this->sql);
                    $result = 'ok';
                }catch(Exception $e){
                   $result=null;
                }finally{
                    return $result;
                }
            }
        }
        public function executeQuery(){
            $data = array();
            if(is_string($this->sql) and !empty($this->sql)){
                try{
                    $result = $this->connection->query($this->sql);
                    if(mysqli_num_rows($result) > 0){
                        //array_push($data,'exito');
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
                $data=null;
                return $data ;

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