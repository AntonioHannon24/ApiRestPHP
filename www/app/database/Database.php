<?php

    namespace app\Database;
    use \PDO;
    use \PDOEXECEPTION;

    class Database{
      

        const HOST = '172.17.0.1';
        const NAME = 'biblioteca';
        const USER = 'root';
        const PASS = 'root';

        private $table;
        private $connection;


        public function __construct($table=null){
          
            $this->table = $table;
            $this->setConnection();
        }

        private function setConnection(){
            try{// tenta conectar ao banco de dados, caso consiga ele cai aqui
                $this->connection = new PDO('mysql:host='.self::HOST.';port=63002;dbname='.self::NAME,self::USER,self::PASS); 
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // caso de errado, ele para o programa
    
            }catch(PDOException $e){ // caso n consiga, exibe mensagem de erro
                die('ERROR:'. $e->getMessage());
            }    
        }
        public function execute($query,$params = []){
            try{
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;
            }catch(PDOEXCEPTION $e){// caso n consiga se conectar, ele exibira a mensagem de erro
                // como estamos em produção, é interressante demonstrar qualquer tipo de erro que de no sistema
                die('ERROR: '.$e->getMessage());
            }
        }
        public function insert($values){
            
            $fields = array_keys($values); // 
            $binds = array_pad([],count($fields),'?'); // conta o numero de fields para criar os inputs

            //query INSERT INTO TABLE VALUES 
            $query = "INSERT INTO " .$this->table."(".implode(",", $fields).") VALUES (".implode(',',$binds).")";
            
            return $this->execute($query, array_values($values));
            //return $query;
        }
        public  function select($fields = [],$where = null, $order = null,$limit = null){
            // caso tenha valor dentro das variaveis recebidas, ele inclementa a query
            $fields = $fields;

           
            $where = strlen($where) ? "WHERE ".$where : '';
            $order = strlen($order) ? "ORDER ".$where : '';
            $limit = strlen($limit) ? "LIMIT ".$where : ''; 


            //Query padrao
            //$query = "SELECT * FROM WHERE ORDER BY LIMIT";
            $query ="SELECT ". implode(',',$fields)." FROM ".$this->table." ". $where. " "
            .$order." ".$limit; 
            return $this->execute($query);
            
        }
        public function delete($id){
            
            //DELETE from TABLE WHERE id > 1;

            $query = 'DELETE FROM '. $this->table. "WHERE ID = ".$id;

            return $this->execute($query);


        }

        //ainda nao testado
        public function join($fields = [],$tables = null,$opt = null,$opt2 = null  ,$where = null){
            echo "teste";
            // precisa modificar para incluir mais de um join
            $fields = $fields;
            $tab = strlen($tables) ? "INNER JOIN ". $tables : '';
            $where = strlen($where) ? "WHERE ".$where : '';

            $query ="SELECT ".implode(',',$fields)." FROM ".$this->table. " ". $tab.
                                        " on ". $opt . " =  " . $opt2 ." ". $where;
            return $this->execute($query);

        }
    }