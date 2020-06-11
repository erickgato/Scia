<?php
require_once 'Connect.php';
final class DATABASE{
    protected $conection;
    static function Singleton(){
        $database = new Self();
        $database->conection = SCHEMA::UP();
        return $database->conection;
    }
    static function INSERT(string $TBname, array $VALUES){
        $Conn = DATABASE::Singleton();
        // This method return the params in string sql format
        $params = (count($VALUES) > 1) ? implode("','",$VALUES) : implode("",$VALUES);
        //Creates a sql query
        $sql = "INSERT INTO {$TBname} VALUES('$params')";
        //Put the query in connection
        $insertedQuery = $Conn->query($sql); 
        //Verify if the query returns error 
        if(!$insertedQuery)
                DEBUG::print("ERROR: {$Conn->error}, sql is {$sql}");

        else{ DEBUG::print("{$sql} INSERTED SUCESS !"); }
        $Conn->close();
    }
    static function SELECT
    //Params
    (
        string $tablename, string $condiction = null, bool $isprocredure = false,
        $limit = null, bool $rtnNmRows = false 
    ){
        $Conn = DATABASE::Singleton();
        $sql = '';
        $limitQuery = ($limit == null) ? "" : "LIMIT {$limit}";
        if(!$isprocredure){
            if($condiction == null)
                $sql = "SELECT * FROM {$tablename} {$limit} ";
            else
             $sql = "SELECT * FROM {$tablename} {$condiction} {$limit}";
        }
        $result = $Conn->query($sql);
        $log = (!$result) ? $Conn->error : 'QUERY INSERTED WHITH RESULT SUCESS';
        DEBUG::log($log);
        $Conn->close();
        if(!$rtnNmRows)
            return DATABASE::SelectAssoc($result);
        else 
            return DATABASE::SelectNumRows($result);
    }
    //You need to put the query into database and use this method
    public static function SelectNumRows($resultquery){
        $nmrows = mysqli_num_rows($resultquery);
        return $nmrows;
    }
    public static function SelectAssoc($resultquery){
        $assocresult = [];
        $index = 0;
        while($line = $resultquery->fetch_assoc()){
            $assocresult[$index] = $line;
            $index++;
        }
        return $assocresult;
    }
}