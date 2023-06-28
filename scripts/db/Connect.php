<?php
    namespace App;
    
    class Connect{
        public $con;
        public $db = array("mysql"=>Array(
            'driver'=>'mysql',
            'host'=>'localhost',
            'username'=>'campus',
            'database'=>'campuslands',
            'password'=>'campus2023',
            'collation'=>'utf8mb4_unicode_ci',
            'port'=>'3306',
            'flags'=>array(
                \PDO::ATTR_PERSISTENT,
                \PDO::ATTR_ERRMODE,
                \PDO::ATTR_EMULATE_PREPARES,
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::MYSQL_ATTR_INIT_COMMAND
        )));
        function __construct(){
            
            try {
                $this->con= new \PDO($this->db['mysql']['driver']. ":host=" . $this->db['mysql']['host'] . ";dbname=" . $this->db['mysql']['database'] . ";user=" . $this->db['mysql']['username'] . ";password=" . $this->db['mysql']['password']. ";port=" . $this->db['mysql']['port']);

                
                $this->con->setAttribute($this->db['mysql']['flags'][0],false);
                $this->con->setAttribute($this->db['mysql']['flags'][1],\PDO::ERRMODE_EXCEPTION);
                $this->con->setAttribute($this->db['mysql']['flags'][3],\PDO::FETCH_ASSOC);
                $this->con->setAttribute($this->db['mysql']['flags'][4],'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');
                $this->con->setAttribute($this->db['mysql']['flags'][2],true);
                

            }catch (\PDOException $e){
                echo $e;
            }

            return $this->con;
        }
    }
?>