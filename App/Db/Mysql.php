<?php


namespace Database;

/**
 * Class Mysql
 * @package Database
 */
include('Dbconfig.php');
class Mysql extends Dbconfig
{
    public $connection_String;

    function __construct(){
        parent::__construct();

        $this->connection_String = NULL;
    }

    /**
     * Used to create a database Connection.
     * @link
     */
     function db_Connect(){
        try {
            $this->connection_String = new \PDO("mysql:host=$this->server_Name;dbname=$this->db_Name", $this->username, $this->password);
            $this->connection_String->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->connection_String;
        } catch (\PDOException $error) {
            return NULL;
            //TODO Log error.
        }
    }

    /**
     * Used to close a database connection.
     * @link
     */
     function db_Disconnect(){
        $this->connection_String = NULL;
    }

    /**
     * @param $table_Name
     * @return mixed
     */
     function select_All($table_Name){
        $sql_Query = $this->connection_String->prepare("Select * from $table_Name");
        $sql_Query->execute();
        $sql_Query->setFetchMode(\PDO::FETCH_ASSOC);
        return $sql_Query;
    }

    /**
     * @param $table_Name
     * @param $id_Name
     * @param $id_Value
     * @return mixed
     */
     function find_By_Id($table_Name ,$id_Name, $id_Value){
        $sql_Query = $this->connection_String->prepare("Select * from $table_Name where $id_Name = :id_value");
        $sql_Query->execute([
            ':id_value' => $id_Value
        ]);
        $sql_Query->setFetchMode(\PDO::FETCH_ASSOC);
        return $sql_Query;
    }

    /**
     * @param $table_Name
     * @param $keyword
     * @param $keyword_Value
     * @return mixed
     */
    function find_By_Keyword($table_Name, $keyword, $keyword_Value){
        $sql_Query = $this->connection_String->prepare("Select * from $table_Name where $keyword = :keyword_value");
        $sql_Query->execute([
            ':keyword_value' => $keyword_Value
        ]);
        $sql_Query->setFetchMode(\PDO::FETCH_ASSOC);
        return $sql_Query;
    }

}