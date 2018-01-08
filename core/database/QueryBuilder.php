<?php
class QueryBuilder{

    protected $pdo;
    

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

   
    public function selectAll($table){
        $statement = $this->pdo->prepare("select * from $table");
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function checkLogin ($table, $value) {
        $statement = $this->pdo->prepare("select * from $table where user_name = '$value'");
        
        $statement->execute();
        
        //$resultSet = $statement->fetchAll(PDO::FETCH_COLUMN,5);
        $resultSet = $statement->fetch(PDO::FETCH_ASSOC);
        return $resultSet;

        
    }

    public function sendMess ($table, $to_uid) {
        $statement = $this->pdo->prepare("select * from $table where to_uid = '$to_uid'");     
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_CLASS);
        return $resultSet;

    }

    public function returnID ($table, $value) {
        $statement = $this->pdo->prepare("select user_id from $table where user_uid = '$value'");
        
        $statement->execute();
        
        $resultSet = $statement->fetch(PDO::FETCH_ASSOC);
        return $resultSet;
        
    }

    public function checkUsers ($table, $value) {
        $statement = $this->pdo->prepare("select * from $table where user_uid = '$value'");
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);

        
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

        }catch(Exception $e){

            die('Something went wrong.');

        }
    }

}


?>